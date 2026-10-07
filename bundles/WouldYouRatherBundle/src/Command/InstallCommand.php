<?php

namespace WouldYouRatherBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WouldYouRatherBundle\Service\GameInstaller;

#[AsCommand(
    name: 'would-you-rather:install',
    description: 'Installs and configures the Would You Rather game.',
)]
class InstallCommand extends Command
{
    public function __construct(
        private readonly GameInstaller $installer,
    ) {
        parent::__construct();
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $output->writeln('<info>Installing Would You Rather...</info>');

        $gameModule = $this->installer->install();

        $output->writeln(
            sprintf(
                '<info>%s v%s installed successfully.</info>',
                $gameModule->getName(),
                $gameModule->getVersion()
            )
        );

        return Command::SUCCESS;
    }
}