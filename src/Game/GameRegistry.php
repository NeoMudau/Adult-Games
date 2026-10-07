<?php

namespace App\Game;

use App\Entity\GameModule;
use App\Repository\GameModuleRepository;
use Doctrine\ORM\EntityManagerInterface;

class GameRegistry
{
    public function __construct(
        private readonly GameModuleRepository $gameModuleRepository,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    public function register(string $bundleClass): GameModule
    {
        if (!is_subclass_of($bundleClass, GameBundleInterface::class)) {
            throw new \InvalidArgumentException(
                sprintf('%s is not a valid game bundle.', $bundleClass)
            );
        }

        $metadata = $bundleClass::getGameMetadata();

        $gameModule = $this->gameModuleRepository->findOneBy([
            'slug' => $metadata['slug'],
        ]);

        if (!$gameModule) {
            $gameModule = new GameModule();

            $gameModule->setSlug($metadata['slug']);
            $gameModule->setBundleClass($bundleClass);
        }

        $gameModule->setName($metadata['name']);
        $gameModule->setVersion($metadata['version']);
        $gameModule->setDescription($metadata['description'] ?? null);
        $gameModule->setIcon($metadata['icon'] ?? null);
        $gameModule->setCoverImage($metadata['coverImage'] ?? null);
        $gameModule->setMinimumAge($metadata['minimumAge'] ?? null);
        $gameModule->setSupportsGuests($metadata['supportsGuests'] ?? false);
        $gameModule->setSupportsMultiplayer($metadata['supportsMultiplayer'] ?? false);
        $gameModule->setMinPlayers($metadata['minPlayers'] ?? 1);
        $gameModule->setMaxPlayers($metadata['maxPlayers'] ?? null);
        $gameModule->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($gameModule);
        $this->entityManager->flush();

        return $gameModule;
    }
}