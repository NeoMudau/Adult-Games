<?php

namespace WouldYouRatherBundle\Service;

use App\Entity\GameModule;
use App\Game\GameRegistry;
use Doctrine\ORM\EntityManagerInterface;
use WouldYouRatherBundle\Entity\WouldYou;
use WouldYouRatherBundle\Repository\WouldYouRepository;
use WouldYouRatherBundle\WouldYouRatherBundle;
use WouldYouRatherBundle\DataFixtures\StarterQuestions;

class GameInstaller
{
    public function __construct(
        private readonly GameRegistry $gameRegistry,
        private readonly WouldYouRepository $wouldYouRepository,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    public function install(): GameModule
    {
        $gameModule = $this->gameRegistry->register(
            WouldYouRatherBundle::class
        );

        $this->installStarterQuestions();

        return $gameModule;
    }

    private function installStarterQuestions(): void
    {
        $starterQuestions = StarterQuestions::getQuestions();

        foreach ($starterQuestions as $data) {
            $existing = $this->wouldYouRepository->findOneBy([
                'question' => $data['question'],
            ]);

            if ($existing) {
                continue;
            }

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

            $this->entityManager->persist($question);
        }

        $this->entityManager->flush();
    }
}