<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('coca');

        $manager->persist($category);
        $manager->flush();

        $product = new Product();
        $product->setName('coca');
        $product->setQuantity('2');
        $product->setPrice('2.5');
        $product->setShortDescription('this is a soda');
        $product->setDescription('soda');

        $manager->persist($product);
        $manager->flush();
    }
}
