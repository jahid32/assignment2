<?php

namespace ExpanceTraker\Commands;
use App\Service\TransactionService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ViewExpance extends Command
{


    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
        parent::__construct();
    }

    public static function getDefaultName(): ?string
    {
        return 'view-expance';
    }


    protected function configure()
    {
        $this->setDescription('View all expance.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $incomes = $this->transactionService->getTransactions('expense');

        if (empty($incomes)) {
            $output->writeln('No incomes found.');
            return Command::SUCCESS;
        }

        foreach ($incomes as $income) {
            $output->writeln(sprintf(
                'Amount: %s, Category: %s',
                $income->getAmount(),
                $income->getCategory(),
            ));
        }

        return Command::SUCCESS;
    }
}
