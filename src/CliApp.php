<?php
namespace ExpanceTraker;

use ExpanceTraker\Model\Transaction;
use ExpanceTraker\Service\TransactionService;

class CliApp
{
  private const ADD_INCOME = 1;
  private const ADD_EXPANCE = 2;
  private const VIEW_INCOMES = 3;
  private const VIEW_EXPENSES = 4;
  private const VIEW_SAVINGS = 5;
  private const VIEW_CATEGORIES= 6;
  private const EXIT = 7;

  private $options = [
    self::ADD_INCOME => "Add income",
    self::ADD_EXPANCE => "Add expense",
    self::VIEW_INCOMES => "View incomes",
    self::VIEW_EXPENSES => "View expenses",
    self::VIEW_SAVINGS => "View savings",
    self::VIEW_CATEGORIES => "View categories",
    self::EXIT => "EXIT",
  ];

  private $transection = "";
  private $categories = [];

  public function __construct()
  {
    $this->transection = new TransactionService();
    $this->categories = $this->transection->getCategories();
  }

  public function run() : void
  {
    while (true) {
      foreach ($this->options as $option => $lavel) {
        printf('%d : %s', $option, $lavel);
        echo "\n";
      }
      $choise = intval(readline('Enter your choise: '));
      switch ($choise) {
        case self::ADD_INCOME:
        case self::ADD_EXPANCE:
            $amount = trim(readline('Enter amount: '));
            foreach ($this->categories as $key =>  $cat) {
              printf('%d : %s ', $key, $cat['name']);
              echo "\n";
            }
            $key = trim(readline("Choose Category: "));

            $transection = new Transaction($amount, $this->categories[$key]['name']);

            $this->transection->addTransaction($transection, $this->categories[$key]['type']);

        break;
        case self::VIEW_INCOMES:
          $incomes = $this->transection->getTransactions('income');
           echo "\n =========================================\n";
          foreach ($incomes as  $inc) {

              printf('Amount : %.2f ', $inc->getAmount());
              echo "\n";
            }
            echo "=========================================\n";
        break;

        case self::VIEW_EXPENSES:
        $expance = $this->transection->getTransactions('expance');
           echo "\n =========================================\n";
          foreach ($expance as  $exp) {

              printf('Amount : %.2f ', $exp->getAmount());
              echo "\n";
            }
            echo "=========================================\n";
        break;
        case self::VIEW_SAVINGS:
        $savings = $this->transection->getSavings();
        echo "\n ------------------------------------\n";
        printf("Total Savings: %.2f", $savings);
         echo "\n ------------------------------------\n";
        break;
        case self::VIEW_CATEGORIES:
         foreach ($this->categories as $cat) {
          printf('Name : %s Type : %s', $cat['name'], $cat['type']);
           echo "\n";
         }
        break;
        case self::EXIT:
        return;
        break;
        default:
          echo "Invalide Option";
          break;
      }
    }
  }
}
