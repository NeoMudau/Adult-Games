<?php

namespace App\Game;

interface GameBundleInterface
{
    public static function getGameMetadata(): array;

    public static function getAdminMenuItems(): array;
}