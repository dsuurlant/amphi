<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Movie;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class MovieController extends FOSRestController
{
    /**
     * @ApiDoc(
     *     resource=true,
     *     description="Register a new movie.",
     *     parameters={
     *      {"name"="name", "dataType"="string", "required"=true, "description"="name of the movie"}
     *  }
     * )
     * @Rest\Post("/movie/")
     */
    public function postAction(Request $request)
    {
        $movie = new Movie();
        $name  = $request->get('name');
        if (empty($name)) {
            return new View("Movie name not specified", Response::HTTP_NOT_ACCEPTABLE);
        }

        try {
            $movie->setName($name);
            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();

            return new View($movie, Response::HTTP_OK);
        } catch (\Exception $e) {
            return new View("Movie could not be registered.", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
