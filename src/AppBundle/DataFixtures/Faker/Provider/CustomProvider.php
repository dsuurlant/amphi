<?php


namespace AppBundle\DataFixtures\Faker\Provider;

/**
 * Class CustomProvider
 * Custom functions for Faker / Alice fixtures
 *
 * @package AppBundle\DataFixtures\Faker\Provider
 */
class CustomProvider
{
    public static function getFutureDate($days, $hour, $minutes, $seconds)
    {
        $date = new \DateTime('now');
        $date->modify("+".$days." days");
        $date->setTime($hour, $minutes, $seconds);

        return $date;
    }
}