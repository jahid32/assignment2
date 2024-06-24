<?php

namespace ExpanceTraker\Commands;
use App\Service\TransactionService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ViewCategories extends Command
{


    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
        parent::__construct();
    }

    public static function getDefaultName(): ?string
    {
        return 'view-categories';
    }


    protected function configure()
    {
        $this->setDescription('View all categories.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $categories = $this->transactionService->getCategories();

        if (empty($categories)) {
            $output->writeln('No categories found.');
            return Command::SUCCESS;
        }

        foreach ($categories as $category) {
            $output->writeln($category->getName());
        }
        return Command::SUCCESS;
    }
}
