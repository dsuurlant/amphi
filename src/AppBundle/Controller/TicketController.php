<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Movie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class TicketController extends FOSRestController
{
    /**
     * @Rest\Get("/tickets/showing/{id}/")
     */
    public function getTicketsForShowingAction($id)
    {
        $em      = $this->getDoctrine()->getManager();
        $showing = $em->find('AppBundle:Showing', $id);

        if (empty($showing)) {
            return new View('No showing found with specified identifier.', Response::HTTP_NOT_FOUND);
        }

        $tickets = $showing->getTickets();
        if (empty($tickets)) {
            return new View('No tickets available for selected showing', Response::HTTP_OK);
        }

        return new View($tickets);
    }

    /**
     * @Rest\Put("/ticket/reserve/")
     */
    public function reserveAction(Request $request)
    {
        try {
            $id = $request->get('id');

            $em     = $this->getDoctrine()->getManager();
            $ticket = $em->find('AppBundle:Ticket', $id);
            $ticket->setIsReserved(true);
            $em->persist($ticket);
            $em->flush();

            return new View('Ticket reserved.', Response::HTTP_OK);
        } catch (\Exception $e) {
            return new View('Unable to process reservation.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @Rest\Put("/ticket/buy/")
     */
    public function buyAction(Request $request)
    {
        try {
            $id = $request->get('id');

            $em     = $this->getDoctrine()->getManager();
            $ticket = $em->find('AppBundle:Ticket', $id);
            if ($ticket->isPaid()) {
                return new View('Ticket has already been bought.', Response::HTTP_GONE);
            }
            $ticket->setIsReserved(true); // @TODO user session to confirm ticket claim
            $ticket->setIsPaid(true); // @TODO ... actual payment ;)
            $em->persist($ticket);
            $em->flush();

            $movie    = $ticket->getShowing()->getMovie()->getName();
            $showTime = $ticket->getShowing()->getShowDateTime()->format('g:ia \o\n l jS F Y');

            return new View(
                $ticket, Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return new View('Unable to process payment.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
