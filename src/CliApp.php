<?php
namespace ExpanceTraker;

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

  public function __construct()
  {
    $this->transection = new TransactionService()
  }

  public  function run() : void
  {
    while (true) {
      foreach ($this->options as $option => $lavel) {
        printf('%d : %s', $option, $lavel);
        echo "\n";
      }
      $choise = intval(readline('Enter your choise: '));
      switch ($choise) {
        case self::ADD_INCOME:
            $amount = trim(readline('Enter amount: '));
            $category = trim(readline("Enter category: "));

          break;
        case self::ADD_EXPANCE:
        # code...
        break;
        case self::VIEW_INCOMES:
        # code...
        break;

        case self::VIEW_EXPENSES:
        # code...
        break;
        case self::VIEW_SAVINGS:
        # code...
        break;
        case self::VIEW_CATEGORIES:
         $categories =  $this->transection->getCategories();
         print_r($categories);
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
