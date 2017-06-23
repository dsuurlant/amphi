<?php


namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Seat;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSeatData implements FixtureInterface
{
    /**
     * Generates seats based on available theaters if they have not been generated yet.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $theaters = $manager->getRepository('AppBundle:Theater')->findAll();

        foreach ($theaters as $theater) {
            $seats       = $theater->getSeats();
            $totalSeats  = $theater->getTheaterType()->getTotalSeats();
            $seatsPerRow = $theater->getTheaterType()->getSeatsPerRow();
            $seatType    = $manager->getRepository('AppBundle:SeatType')->findOneBy(array('name' => 'Normal Seat'));

            if (count($seats) <> $totalSeats) {
                // Remove erroneous seats and their tickets.
                $seatIds = array();
                foreach ($seats as $seat) {
                    $seatIds[] = $seat->getId();
                }
                $manager->getRepository('AppBundle:Ticket')->removeTicketsFromSeats($seatIds);
                foreach ($seats as $seat) {
                    $manager->remove($seat);
                }
                $manager->flush();
            } else {
                // existing number of seats matches, so move to next theater.
                continue;
            }

            // Insert new seats.
            $row   = 1;
            $chair = 1;
            for ($i = 1; $i <= $totalSeats; $i++) {
                $seat = new Seat();
                $seat->setTheater($theater);
                $seat->setChair($chair);
                $seat->setRow($row);
                $seat->setSeatType($seatType);
                $manager->persist($seat);
                $manager->flush();

                if ($chair == $seatsPerRow) {
                    $row++;
                    $chair = 1;
                } else {
                    $chair++;
                }
            }


        }
    }

}