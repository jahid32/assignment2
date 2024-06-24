<?php

namespace ExpanceTraker\Model;

class Transaction
{
    private $amount;
    private $category;

    public function __construct(float $amount, string $category)
    {
        $this->amount = $amount;
        $this->category = $category;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCategory(): string
    {
        return $this->category;
    }


    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'category' => $this->category,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['amount'],
            $data['category']
        );
    }
}
