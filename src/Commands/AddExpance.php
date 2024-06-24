<?php

namespace ExpanceTraker\Commands;

use ExpanceTraker\Model\Transaction;
use ExpanceTraker\Service\TransactionService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class AddExpance extends Command
{

    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
        parent::__construct();
    }
    public static function getDefaultName(): ?string
    {

        return 'add-expens';
    }

    protected function configure()
    {
        $this
            ->setDescription('Add an expance.')
            ->addArgument('amount', InputArgument::REQUIRED, 'Expance amount')
            ->addArgument('category', InputArgument::REQUIRED, 'Expance category');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $amount = (float)$input->getArgument('amount');
        $category = $input->getArgument('category');

        $transaction = new Transaction($amount, $category);
        $this->transactionService->addTransaction($transaction, 'income');

        $output->writeln('Expance added successfully.');
        return Command::SUCCESS;
    }
}
