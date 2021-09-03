<?php

namespace App\DataFixtures;

use App\Entity\Agents;
use App\Entity\Contacts;
use App\Entity\Planques;
use App\Entity\Skills;
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
        for ($i = 0; $i <= 50; $i++) {
            $contact = new Contacts();
            $contact->setLastName($faker->lastName())
                ->setFirstName($faker->firstName())
                ->setCodeName($faker->colorName())
                ->setBirthDate($faker->dateTimeBetween($startDate = ' - 65 yars', $endDate = ' -25 years', $timezone = null))
                ->setNationality($faker->country())
                ->setMissions(null);

            $manager->persist($contact);
        }

        for ($i = 0; $i <= 5; $i++) {
            $skill = new Skills();
            $skill
                ->setName('skill');

            $manager->persist($skill);
        }
        for ($i = 0; $i <= 80; $i++) {
            $planques = new Planques();
            $planques->setAdress($faker->address())
                ->setCodeName($faker->colorName())
                ->setCountry($faker->country())
                ->setType('unknown');

            $manager->persist($planques);
        }


        $manager->flush();
    }
}