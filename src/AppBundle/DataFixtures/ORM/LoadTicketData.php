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
        $showings = $manager->getRepository('AppBundle:Showing')->getFutureShowings();

        /* @var $showing Showing */
        foreach ($showings as $showing) {
            $manager->getRepository('AppBundle:Showing')->generateTicketsForShowing($showing);
        }
        $manager->flush();

    }

}