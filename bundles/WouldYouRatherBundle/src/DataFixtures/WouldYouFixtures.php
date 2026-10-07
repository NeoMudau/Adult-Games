<?php

namespace WouldYouRatherBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use WouldYouRatherBundle\Entity\WouldYou;

class WouldYouFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (StarterQuestions::getQuestions() as $data) {
            $question = new WouldYou();

            $question->setQuestion($data['question']);
            $question->setOptionA($data['optionA']);
            $question->setOptionB($data['optionB']);
            $question->setTags($data['tags']);
            $question->setCategory($data['category']);
            $question->setActive(true);

            $now = new \DateTimeImmutable();

            $question->setCreatedAt($now);
            $question->setUpdatedAt($now);

            $manager->persist($question);
        }

        $manager->flush();
    }
}