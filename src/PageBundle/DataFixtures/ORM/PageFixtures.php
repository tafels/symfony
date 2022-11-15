<?php

namespace PageBundle\DataFixtures\ORM;

use CategoryBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use PageBundle\Entity\Page;

class PageFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {

        $categoryRepository = $manager->getRepository(Category::class);
        for ($monthnumber = 1; $monthnumber <= 12; $monthnumber++) {
            $page = new Page();
            $page->setTitle('CategoryPage');
            $page->setBody('Page text');
            $page->setCreateddate(new \DateTime());
            $category = $categoryRepository->findOneById($monthnumber);
            if ($category) {
                $page->setCategory($category);
                $manager->persist($page);
            }
        }

        $manager->flush();

    }
}