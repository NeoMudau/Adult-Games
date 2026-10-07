<?php

namespace WouldYouRatherBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use App\Game\GameBundleInterface;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class WouldYouRatherBundle extends AbstractBundle implements GameBundleInterface
{
    public static function getGameMetadata(): array
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

    public static function getAdminMenuItems(): array
    {
        return [
            [
                'label' => 'Questions',
                'icon' => 'fas fa-question-circle',
                'controller' => Controller\Admin\WouldYouCrudController::class,
            ],
        ];
    }

    public function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import('../config/routes.yaml');
    }
    
    public function loadExtension(
        array $config,
        ContainerConfigurator $container,
        ContainerBuilder $builder
    ): void {
        $container->import('../config/services.yaml');
    }

    public function prependExtension(
        ContainerConfigurator $container,
        ContainerBuilder $builder
    ): void {
        $builder->prependExtensionConfig('doctrine', [
            'orm' => [
                'mappings' => [
                    'WouldYouRatherBundle' => [
                        'type' => 'attribute',
                        'is_bundle' => false,
                        'dir' => __DIR__.'/Entity',
                        'prefix' => 'WouldYouRatherBundle\Entity',
                        'alias' => 'WouldYouRatherBundle',
                    ],
                ],
            ],
        ]);

        $builder->prependExtensionConfig('doctrine_migrations', [
            'migrations_paths' => [
                'WouldYouRatherBundle\Migrations' => dirname(__DIR__).'/migrations',
            ],
        ]);
    }
}