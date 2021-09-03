<?php

namespace App\DataFixtures;

use App\Entity\Agents;
use App\Entity\Targets;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        // $product = new Product();
        for ($i = 0; $i <= 60; $i++) {
            $targets = new Targets();
            $targets->setLastName($faker->lastName())
                ->setFirstName($faker->firstName())
                ->setCodeName($faker->colorName())
                ->setBirthDate($faker->dateTimeBetween($startDate = '-60 years', $endDate = '- 20 years', null))
                ->setNationality($faker->country())
                ->setMissions(null);
            $manager->persist($targets);
        }
        for ($i = 0; $i <= 35; $i++) {
            $agent = new Agents();
            $agent->setLastName($faker->lastName())
                ->setFirstName($faker->firstName())
                ->setNameCode($faker->colorName())
                ->setBirthDate($faker->dateTimeBetween($startDate = '-60 years', $endDate = '- 20 years', null))
                ->setNationality($faker->country())
                ->setMissions(null);

            $manager->persist($agent);
        }
        $manager->flush();
    }
}