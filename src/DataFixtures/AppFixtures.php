<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Agents;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        // $product = new Product();
        for ($i = 0; $i <= 10; $i++) {
            $agent = new Agents();
            $agent->setLastName($faker->lastName())
                ->setFirstName($faker->firstName())
                ->setBirthDate($faker->dateTimeBetween($startDate = '-40 years', $endDate = '-25 years', null))
                ->setMissions(null)
                ->setNameCode($faker->colorName())
                ->setNationality($faker->country());
            $manager->persist($agent);
        }


        $manager->flush();
    }
}