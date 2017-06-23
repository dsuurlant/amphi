<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Movie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class MovieController extends FOSRestController
{
    /**
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

            return new View("Movie registered successfully", Response::HTTP_OK);
        } catch (\Exception $e) {
            return new View("Movie could not be registered.", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
