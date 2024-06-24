<?php

namespace ExpanceTraker\Service;

use ExpanceTraker\Model\Transaction;


class TransactionService
{
    private $incomeFile = __DIR__ . '/../../resources/Incomes.json';
    private $expenseFile = __DIR__ . '/../../resources/Expenses.json';
    private $categoryFile = __DIR__ . '/../../resources/Categories.json';

    public function addTransaction(Transaction $transaction, string $type): void
    {
        $file = $type === 'income' ? $this->incomeFile : $this->expenseFile;
        $transactions = $this->readTransactions($file);
        $transactions[] = $transaction->toArray();
        $s = file_put_contents($file, json_encode($transactions, JSON_PRETTY_PRINT));
        
        if(!$s){
           throw new \Exception("Unable to write file: " . $file);
        }
    }

    public function getTransactions(string $type): array
    {
        $file = $type === 'income' ? $this->incomeFile : $this->expenseFile;
        return array_map([Transaction::class, 'fromArray'], $this->readTransactions($file));
    }


    public function getCategories(): array
    {

        return  $this->readTransactions($this->categoryFile);
    }

    public function getSavings(): float
    {
        $incomes = $this->getTransactions('income');
        $expenses = $this->getTransactions('expense');
        $totalIncome = array_reduce($incomes, fn($carry, $item) => $carry + $item->getAmount(), 0);
        $totalExpense = array_reduce($expenses, fn($carry, $item) => $carry + $item->getAmount(), 0);
        return $totalIncome - $totalExpense;
    }

    private function readTransactions(string $file): array
    {
        if (!file_exists($file)) {
            throw new \Exception("File not found: " . $file);
        }
        echo $file;
        $data = json_decode(file_get_contents($file), true);

        return $data ?? [];
    }
}
