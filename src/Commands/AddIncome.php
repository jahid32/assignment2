<?php

namespace ExpanceTraker\Commands;

use ExpanceTraker\Model\Transaction;
use ExpanceTraker\Service\TransactionService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class AddIncome extends Command
{

    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
        parent::__construct();
    }

    public static function getDefaultName(): ?string
    {
        return 'add-income';
    }

    protected function configure()
    {
        $this
            ->setDescription('Add an income.')
            ->addArgument('amount', InputArgument::REQUIRED, 'Income amount')
            ->addArgument('category', InputArgument::REQUIRED, 'Income category');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $amount = (float)$input->getArgument('amount');
        $category = $input->getArgument('category');

        $transaction = new Transaction($amount, $category);
        $this->transactionService->addTransaction($transaction, 'income');

        $output->writeln('Income added successfully.');
        return Command::SUCCESS;
    }
}
