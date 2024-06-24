<?php

namespace ExpanceTraker\Commands;
use App\Service\TransactionService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ViewSavings extends Command
{


    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
        parent::__construct();
    }

    public static function getDefaultName(): ?string
    {
        return 'view-savings';
    }


    protected function configure()
    {
        $this->setDescription('View total savings.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $savings = $this->transactionService.getSavings();
        $output->writeln('Total Savings: ' . $savings);
        return Command::SUCCESS;
    }
}
