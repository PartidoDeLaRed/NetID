<?php

namespace PdR\NetIdBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PdR\NetIdBundle\Entity\Client;
use PdR\NetIdBundle\Entity\Verb;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class Verbs implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $democracyOS = $manager->getRepository('PdRNetIdBundle:Client')->findOneByApplication(Client::APPLICATION_DEMOCRACY_OS);

        $vote = new Verb();
        $vote->setApplication($democracyOS);
        $vote->setName('vote');
        
        $comment = new Verb();
        $comment->setApplication($democracyOS);
        $comment->setName('comment');

        $manager->persist($vote);
        $manager->persist($comment);
        $manager->flush();
    }

    public function getOrder()
    {
        return 80;
    }
}