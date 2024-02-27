<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Tag;
use App\Entity\Meme;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       $tag1 = new Tag();
       $tag1->setName("opera");

       $tag2 = new Tag();
       $tag2->setName("gx");

       $meme = new Meme();
       $meme->setUrl("https://x.com/operagxofficial/status/1748385902965981281?s=20");
       $meme->setUseTime(0);

       $meme->addTag($tag1);
       $meme->addTag($tag2);

       $manager->persist($tag1);
       $manager->persist($tag2);
       $manager->persist($meme);


        $manager->flush();
    }
}
