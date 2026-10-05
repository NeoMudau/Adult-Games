<?php

namespace WouldYouRatherBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use WouldYouRatherBundle\Entity\WouldYou;

class WouldYouFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $question = new WouldYou();

        $question->setQuestion('Would you rather be able to fly or be invisible?');
        $question->setOptionA('Be able to fly');
        $question->setOptionB('Be invisible');
        $question->setTags(['fun']);
        $question->setCategory(['general']);
        $question->setActive(true);
        $question->setCreatedAt(new \DateTimeImmutable());
        $question->setUpdatedAt(new \DateTimeImmutable());

        $manager->persist($question);
        $manager->flush();
    }
}