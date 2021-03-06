<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Showing;
use JMS\Serializer\Serializer;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;


class ShowingController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Create a new showing.",
     *  parameters={
     *      {"name"="show_date_time", "dataType"="string", "required"=true, "description"="valid datetime string"},
     *      {"name"="theater_id", "dataType"="int", "required"=true, "description"="theater id"},
     *      {"name"="movie_id", "dataType"="int", "required"=true, "description"="movie id"}
     *  }
     * )
     * @Rest\Post("/showing/")
     */
    public function postAction(Request $request)
    {
        $showing         = new Showing();
        $showDateTimeStr = $request->get('show_date_time');
        $theaterId       = $request->get('theater_id');
        $movieId         = $request->get('movie_id');
        $showDate        = null;
        $em              = $this->getDoctrine()->getManager();

        if (empty($showDateTimeStr) || empty($theaterId) || empty($movieId)) {
            return new View("Missing one or more arguments", Response::HTTP_NOT_ACCEPTABLE);
        }

        try {
            $showDate = new \DateTime($showDateTimeStr);
        } catch (\Exception $e) {
            return new View("Incorrectly formatted date time.", Response::HTTP_NOT_ACCEPTABLE);
        }

        $theater = $em->find('AppBundle:Theater', $theaterId);
        if (empty($theater)) {
            return new View("Incorrect identifier for theater.", Response::HTTP_NOT_ACCEPTABLE);
        }
        $movie = $em->find('AppBundle:Movie', $movieId);
        if (empty($movie)) {
            return new View("Incorrect identifier for movie.", Response::HTTP_NOT_ACCEPTABLE);
        }

        try {
            $showing->setMovie($movie);
            $showing->setShowDateTime($showDate); // @TODO date must be in the future, etc
            $showing->setTheater($theater); // @TODO check availability of theater at specified time
            $showing->setTickets(array());

            $em->persist($showing);
            $em->flush();

            $em->getRepository('AppBundle:Showing')->generateTicketsForShowing($showing);
            $em->flush();

            return new View($showing, Response::HTTP_OK);
        } catch (\Exception $e) {
            return new View("Showing could not be registered.", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @ApiDoc(
     *  description="List showings between specified dates.",
     *  parameters={
     *      {"name"="start_date_time", "dataType"="string", "required"=true, "description"="start date as a valid datetime string"},
     *      {"name"="end_date_time", "dataType"="string", "required"=true, "description"="end date as a valid datetime string"}
     *  }
     * )
     * @Rest\Get("/showing/from/{start_date_time}/to/{end_date_time}/")
     */
    public function listBetweenAction($start_date_time, $end_date_time)
    {
        $startDate = null;
        $endDate   = null;
        try {
            $startDate = new \DateTime($start_date_time);
            $endDate   = new \DateTime($end_date_time);
        } catch (\Exception $e) {
            return new View("Incorrectly formatted date and time.", Response::HTTP_NOT_ACCEPTABLE);
        }

        try {
            $em       = $this->getDoctrine()->getManager();
            $showings = $em->getRepository('AppBundle:Showing')->getShowingsBetween($startDate, $endDate);
            if (empty($showings)) {
                return new View("No showings found for specified timeframe.", Response::HTTP_OK);
            }

            return new View($showings, Response::HTTP_OK);
        } catch (\Exception $e) {
            return new View("Unable to search for showings.", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @ApiDoc(
     *  description="Get details of specified showing.",
     *  parameters={
     *      {"name"="id", "dataType"="integer", "required"=true, "description"="showing id"}
     *  }
     * )
     * @Rest\Get("/showing/{id}/")
     */
    public function getAction($id)
    {
        $em      = $this->getDoctrine()->getManager();
        $showing = $em->find('AppBundle:Showing', $id);

        if (empty($showing)) {
            return new View('No showing found with specified identifier.', Response::HTTP_NOT_FOUND);
        }

        return new View($showing);
    }

}