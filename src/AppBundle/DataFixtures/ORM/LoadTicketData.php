<?php


namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Price;
use AppBundle\Entity\Showing;
use AppBundle\Entity\Ticket;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTicketData implements FixtureInterface
{
    /**
     * Removes all existing open tickets and creates new ones for seats and showings available in the future.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $manager->getRepository('AppBundle:Ticket')->flushTickets();
        $showings  = $manager->getRepository('AppBundle:Showing')->getFutureShowings();
        $priceRepo = $manager->getRepository('AppBundle:Price');

        /* @var $showing Showing */
        foreach ($showings as $showing) {
            $showingPrice = 0.00;
            $showHour     = (int)$showing->getShowDateTime()->format('G');
            if ($showHour < 12) {
                $showingPrice += $priceRepo->getPriceFor('Morning');
            } else if ($showHour >= 12 && $showHour < 18) {
                $showingPrice += $priceRepo->getPriceFor('Matinee');
            } else if ($showHour >= 18 && $showHour < 24) {
                $showingPrice += $priceRepo->getPriceFor('Evening');
            }

            $showType     = $showing->getTheater()->getTheaterType()->getFilmFormat()->getName();
            $showingPrice += $priceRepo->getPriceFor($showType);

            $seats = $showing->getTheater()->getSeats();
            /* @var $seat \AppBundle\Entity\Seat */
            foreach ($seats as $seat) {
                $seatType  = $seat->getSeatType();
                $seatPrice = $priceRepo->getPriceFor($seatType);

                $ticket = new Ticket();
                $ticket->setSeat($seat);
                $ticket->setPrice($showingPrice + $seatPrice);
                $ticket->setShowing($showing);
                $ticket->setIsPaid(false);
                $ticket->setIsReserved(false);
                $manager->persist($ticket);
            }
            $manager->flush();
        }
    }

}