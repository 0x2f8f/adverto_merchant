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
    name       : 'app:redis:get',
    description: 'Get value by key from redis'
)]
class RedisGetCommand extends Command
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
                The <info>%command.name%</info> command print value by key from redis

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

        $value = $this->cache->get($key);
        if (is_array($value)) {
            $value = json_encode($value);
        }

        $this->io->writeln($value);

        return Command::SUCCESS;
    }

}

