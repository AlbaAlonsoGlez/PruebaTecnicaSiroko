<?php
declare(strict_types=1);

namespace Domain;

class ShoppingCart {
    public function __construct(
        private string $shoppingCartId,
        private string $customerId,
        
        private array $shoppingCartLine,
        private int $status,
   ){}
    
    public function getShoppingCartId(): string{
        return $this->shoppingCartId;
    }
    public function getCustomerId(): string{        
        return $this->customerId;
    }
    public function getShoppingCartLine(): array{
        return $this->shoppingCartLine;
    }
    public function getStatus(): int{
        return $this->status;
    }
    public function setShoppingCartId(string $shoppingCartId): void{
        $this->shoppingCartId = $shoppingCartId;
    }
    public function setCustomerId(string $customerId): void{
        $this->customerId = $customerId;
    }
    public function setShoppingCartLine(array $shoppingCartLine): void{
        $this->shoppingCartLine = $shoppingCartLine;
    }
    public function setStatus(int $status): void{
        $this->status = $status;
    }
}