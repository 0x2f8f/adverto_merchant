<?php

namespace App\Core\Command;

use App\Core\Service\RedisCacheService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name       : 'app:redis:set',
    description: 'Set value by key from redis'
)]
class RedisSetCommand extends Command
{
    private SymfonyStyle $io;

    public function __construct(
        private RedisCacheService $cache,
    ) {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this
            ->addArgument('key', InputArgument::REQUIRED, 'Key in redis')
            ->addArgument('value', InputArgument::REQUIRED, 'Value')
            ->setHelp(
                <<<'HELP'
                The <info>%command.name%</info> command set value by key in redis

                  <info>php %command.full_name%</info>
                HELP
            );
    }


    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $key   = $input->getArgument('key');
        $value = $input->getArgument('value');

        $result = $this->cache->set($key, $value);

        if ($result) {
            $this->io->success(sprintf('Key "%s" was successfully set in redis', $key));
        } else {
            $this->io->error(sprintf('failed to set value by key "%s"', $key));
        }

        return Command::SUCCESS;
    }

}

