<?php

namespace App\DataFixtures;

use App\Entity\Skills;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        // $product = new Product();
        for ($i = 0; $i <= 5; $i++) {
            $skills = new Skills();
            $skills->setName('specialitée')
                ->setAgents(null);
            $manager->persist($skills);
        }


        $manager->flush();
    }
}