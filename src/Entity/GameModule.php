<?php

namespace App\Entity;

use App\Repository\GameModuleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameModuleRepository::class)]
class GameModule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $bundleClass = null;

    #[ORM\Column(length: 30)]
    private ?string $version = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $icon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coverImage = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $minimumAge = null;

    #[ORM\Column]
    private ?bool $enabled = true;

    #[ORM\Column]
    private ?bool $maintenanceMode = false;

    #[ORM\Column]
    private ?bool $featured = false;

    #[ORM\Column]
    private ?int $sortOrder = 0;

    #[ORM\Column]
    private ?bool $supportsGuests = true;

    #[ORM\Column]
    private ?bool $supportsMultiplayer = false;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $minPlayers = 1;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $maxPlayers = null;

    #[ORM\Column(nullable: true)]
    private ?array $metadata = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $installedAt;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $lastEnabledAt = null;

    public function __construct()
    {
        $now = new \DateTimeImmutable();

        $this->installedAt = $now;
        $this->updatedAt = $now;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getBundleClass(): ?string
    {
        return $this->bundleClass;
    }

    public function setBundleClass(string $bundleClass): static
    {
        $this->bundleClass = $bundleClass;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(?string $coverImage): static
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    public function getMinimumAge(): ?int
    {
        return $this->minimumAge;
    }

    public function setMinimumAge(?int $minimumAge): static
    {
        $this->minimumAge = $minimumAge;

        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): static
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function isMaintenanceMode(): ?bool
    {
        return $this->maintenanceMode;
    }

    public function setMaintenanceMode(bool $maintenanceMode): static
    {
        $this->maintenanceMode = $maintenanceMode;

        return $this;
    }

    public function isFeatured(): ?bool
    {
        return $this->featured;
    }

    public function setFeatured(bool $featured): static
    {
        $this->featured = $featured;

        return $this;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    public function isSupportsGuests(): ?bool
    {
        return $this->supportsGuests;
    }

    public function setSupportsGuests(bool $supportsGuests): static
    {
        $this->supportsGuests = $supportsGuests;

        return $this;
    }

    public function isSupportsMultiplayer(): ?bool
    {
        return $this->supportsMultiplayer;
    }

    public function setSupportsMultiplayer(bool $supportsMultiplayer): static
    {
        $this->supportsMultiplayer = $supportsMultiplayer;

        return $this;
    }

    public function getMinPlayers(): ?int
    {
        return $this->minPlayers;
    }

    public function setMinPlayers(int $minPlayers): static
    {
        $this->minPlayers = $minPlayers;

        return $this;
    }

    public function getMaxPlayers(): ?int
    {
        return $this->maxPlayers;
    }

    public function setMaxPlayers(?int $maxPlayers): static
    {
        $this->maxPlayers = $maxPlayers;

        return $this;
    }

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function setMetadata(?array $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function getInstalledAt(): ?\DateTimeImmutable
    {
        return $this->installedAt;
    }

    public function setInstalledAt(\DateTimeImmutable $installedAt): static
    {
        $this->installedAt = $installedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getLastEnabledAt(): ?\DateTimeImmutable
    {
        return $this->lastEnabledAt;
    }

    public function setLastEnabledAt(?\DateTimeImmutable $lastEnabledAt): static
    {
        $this->lastEnabledAt = $lastEnabledAt;

        return $this;
    }
}
