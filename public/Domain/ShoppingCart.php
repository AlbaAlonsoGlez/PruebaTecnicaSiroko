<?php
declare(strict_types=1);

namespace Domain;

class ShoppingCart {
    public function __construct(
        private string $shoppingCartId,
        private string $customerId,
        private \dateTime $date,
        private array $productList,
   ){}

    public function getShoppingCartId(): string{
        return $this->shoppingCartId;
    }
    public function getCustomerId(): string{
        return $this->customerId;
    }

    public function getProductList(): array{
        return $this->productList;
    }

    public function getDate(): \dateTime{
        return $this->date;
    }

    public function setShoppingCartId(string $shoppingCartId): void{
        $this->shoppingCartId = $shoppingCartId;
    }

    public function setCustomerId(string $customerId): void{
        $this->customerId = $customerId;
    }   

    public function setProductList(array $productList): void{
        $this->productList = $productList;
    }

    public function setDate(\dateTime $date): void{
        $this->date = $date;
    }
}