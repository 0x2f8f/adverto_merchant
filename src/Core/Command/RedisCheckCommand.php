<?php

namespace App\Core\Command;

use App\Companies\DataProvider\CompanyDataProvider;
use App\Companies\DataProvider\LegalDataProvider;
use App\Core\DataProvider\GeoDataProvider;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Stopwatch\Stopwatch;

#[AsCommand(
    name       : 'app:redis:check',
    description: 'Get value by key from redis'
)]
class RedisCheckCommand extends Command
{
    private SymfonyStyle $io;

    private Stopwatch $stopwatch;

    public function __construct(
        private GeoDataProvider     $geoDataProvider,
        private LegalDataProvider   $legalDataProvider,
        private CompanyDataProvider $companyDataProvider,
    ) {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this
            ->addOption('without-cache', null, InputOption::VALUE_OPTIONAL, 'Without redis cache', false)
            ->setHelp(
                <<<'HELP'
                The <info>%command.name%</info> command check functional with redis

                  <info>php %command.full_name%</info>
                HELP
            );
    }


    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io        = new SymfonyStyle($input, $output);
        $this->stopwatch = new Stopwatch();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $fromCache = !$input->getOption('without-cache');

        $this->io->title('geoDataProvider');

        $this->start('getCountryById');
        $countryId = 643; //Russia
        $country   = $this->geoDataProvider->getCountryById($countryId, fromCache: $fromCache);
        $output->writeln(sprintf('Country id: %s', $country->getIso()));
        $this->stop('getCountryById');

        $this->start('getCitiesByCountry');
        $cities = $this->geoDataProvider->getCitiesByCountry($country, $fromCache);
        $output->writeln(sprintf('Count cities: %s', count($cities)));
        $this->stop('getCitiesByCountry');

        $this->start('getCountries');
        $countries = $this->geoDataProvider->getCountries(fromCache: $fromCache);
        $output->writeln(sprintf('Count countries: %s', count($countries)));
        $this->stop('getCountries');

        $this->start('getCityById');
        $cityId = 48482; //Yaroslavl
        $city   = $this->geoDataProvider->getCityById($cityId, fromCache: $fromCache);
        $output->writeln(sprintf('City id: %s', $city->getId()));
        $this->stop('getCityById');

        $this->io->title('LegalDataProvider');

        $this->start('getLegalOrganisationTypes');
        $types = $this->legalDataProvider->getLegalOrganisationTypes($fromCache);
        $output->writeln(sprintf('Count organization types: %s', count($types)));
        $this->stop('getLegalOrganisationTypes');

        $this->start('getLegalTemplatesForCountry');
        $templates = $this->legalDataProvider->getLegalTemplatesForCountry($countryId, $fromCache);
        $output->writeln(sprintf('Count templates: %s', count($templates)));
        $this->stop('getLegalTemplatesForCountry');

        $this->start('getLegalOrganizationTypeById');
        $typeId = 2;
        $type   = $this->legalDataProvider->getLegalOrganizationTypeById($typeId, $fromCache);
        $output->writeln(sprintf('Type id: %s', $type->getId()));
        $this->stop('getLegalOrganizationTypeById');

        $this->start('findLegalProperties');
        $ids        = [1, 2, 3, 4, 5];
        $properties = $this->legalDataProvider->findLegalProperties($ids, $fromCache);
        $output->writeln(sprintf('Count properties: %s', count($properties)));
        $this->stop('findLegalProperties');

        $this->io->title('CompanyDataProvider');

        $this->start('getUserCompany');
        $userId  = 147077;
        $company = $this->companyDataProvider->getUserCompany($userId, $fromCache);
        $output->writeln(
            $company
                ? sprintf('Company id: %s', $company->getId())
                : sprintf('Company by user_id %s not found', $userId)
        );
        $this->stop('getUserCompany');

        $this->start('getCompanyById');
        $companyId = 10;
        $company   = $this->companyDataProvider->getCompanyById($companyId, $fromCache);
        $output->writeln(
            $company
                ? sprintf('Company id: %s', $company->getId())
                : sprintf('Company %s not found', $companyId)
        );
        $this->stop('getCompanyById');

        return Command::SUCCESS;
    }

    private function start(string $eventName): void
    {
        $this->io->section($eventName);
        $this->stopwatch->start($eventName);
    }

    private function stop(string $eventName): void
    {
        $event = $this->stopwatch->stop($eventName);
        $this->io->writeln(sprintf('Duration: %s milliseconds', $event->getDuration()));

        $this->io->writeln(
            sprintf(
                'Memory: %s Mb (%s Kb)',
                round($event->getMemory() / 1048576, 1),
                $event->getMemory() / 1024
            )
        );
    }

}