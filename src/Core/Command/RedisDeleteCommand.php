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
    name       : 'app:redis:delete',
    description: 'Delete value by key from redis'
)]
class RedisDeleteCommand extends Command
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
            ->setHelp(
                <<<'HELP'
                The <info>%command.name%</info> command delete value by key from redis

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
        $key = $input->getArgument('key');
        if (!$this->cache->exists($key)) {
            $this->io->warning(sprintf('Key "%s" does not exist', $key));

            return Command::INVALID;
        }

        try {
            $this->cache->delete($key);
        } catch (\Exception $e) {
            $this->io->error(sprintf('Failed. Error %s', $e->getMessage()));

            return Command::FAILURE;
        }

        $this->io->success('Success');

        return Command::SUCCESS;
    }

}