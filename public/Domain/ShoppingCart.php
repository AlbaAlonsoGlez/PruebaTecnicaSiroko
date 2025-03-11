<?php
declare(strict_types=1);

namespace Domain;

class ShoppingCart {
    public function __construct(
        private string $orderId,
        private string $customerId,
        private \dateTime $date,
        private array $productList,
   ){}

    public function getOrderId(): string{
        return $this->orderId;
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

    public function setOrderId(string $orderId): void{
        $this->orderId = $orderId;
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