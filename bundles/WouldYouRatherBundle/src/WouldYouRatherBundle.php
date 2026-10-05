<?php

namespace WouldYouRatherBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use App\Game\GameBundleInterface;

class WouldYouRatherBundle extends AbstractBundle implements GameBundleInterface
{
    public function getGameMetadata(): array
    {
        return [
            'name' => 'Would You Rather',
            'slug' => 'would-you-rather',
            'version' => '1.0.0',
            'description' => 'Choose between two different options.',
            'minimumAge' => null,
            'supportsGuests' => true,
            'supportsMultiplayer' => true,
            'minPlayers' => 1,
            'maxPlayers' => null,
        ];
    }
    
    public function loadExtension(
        array $config,
        ContainerConfigurator $container,
        ContainerBuilder $builder
    ): void {
        $container->import('../config/services.yaml');
    }
}