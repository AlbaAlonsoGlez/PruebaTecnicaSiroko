<?php
declare(strict_types=1);

namespace Domain;

class OrderLine {
    public function __construct(
        private string $itemId,
        private int $quantity,
    ){}

    public function getItemId(): string{
        return $this->itemId;
    }
    
    public function getQuantity(): int{
        return $this->quantity;
    }

    public function setItemId(string $itemId): void{
        $this->itemId = $itemId;
    }

    public function setQuantity(int $quantity): void{
        $this->quantity = $quantity;
    }
}