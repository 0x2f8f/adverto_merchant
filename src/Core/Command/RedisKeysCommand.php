<?php

namespace App\Core\Command;

use App\Core\Service\RedisCacheService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name       : 'app:redis:keys',
    description: 'Lists all keys in redis'
)]
class RedisKeysCommand extends Command
{
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
            ->setHelp(
                <<<'HELP'
                The <info>%command.name%</info> command lists all keys in reids:

                  <info>php %command.full_name%</info>
                HELP
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $redisElements = array_map(function ($key) {
            return [
                $key,
                $this->cache->ttl($key)
            ];
        }, $this->cache->keys());

        $bufferedOutput = new BufferedOutput();
        $io             = new SymfonyStyle($input, $bufferedOutput);

        $io->table(['Key', 'TTL'], $redisElements);

        $redisKeysAsATable = $bufferedOutput->fetch();
        $output->write($redisKeysAsATable);

        return Command::SUCCESS;
    }

}

