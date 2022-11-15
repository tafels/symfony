<?php

namespace CategoryBundle\DataFixtures\ORM;

use CategoryBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {

        for ($monthnumber = 1; $monthnumber <= 12; $monthnumber++) {
            $category = new Category();
            $category->setName(date("F",mktime(0,0,0,$monthnumber,1,2022)));
            $category->setBody('Category text ' . $category->getName());
            $category->setCreateddate(new \DateTime());
            $manager->persist($category);
        }

        $manager->flush();
    }

}