<?php
declare(strict_types=1);

namespace Domain;

class Order {
    
    public const STATUS_ORDERED = 1;
    public const STATUS_INDELIVERY = 2;
    public const STATUS_DELIVERED = 3;

    public const AVAILBALE_STATUSES = [
        self::STATUS_ORDERED,
        self::STATUS_INDELIVERY,
        self::STATUS_DELIVERED
    ];

    private function __construct(
        private string $orderId,
        private string $customerId,
        private string $date,
        private array $orderLine,
        private CustomerAddress $address,
        private int $status,
    ) {}

    public function getOrderId(): string{
        return $this->orderId;
    }
    public function getCustomerId(): string{
        return $this->customerId;
    }
    public function getDate(): string{
        return $this->date;
    }
    public function getOrderLines(): array{
        return $this->orderLine;
    }
    public function getAddress(): CustomerAddress{
        return $this->address;
    }
    public function getStatus(): int{
        return $this->status;
    }
    public function setOrderId(string $orderId): void{
        $this->orderId = $orderId;
    }
    public function setCustomerId(string $customerId): void{
        $this->customerId = $customerId;
    }
    public function setDate(string $date): void{
        $this->date = $date;
    }
    public function setOrderLines(array $orderLine): void{
        $this->orderLine = $orderLine;
    }
    public function setAddress(CustomerAddress $address): void{
        $this->address = $address;
    }
    public function setStatus(int $status): void{
        $this->status = $status;
    }

    public function generatePurchase(ShoppingCart $shoppingCart, Customer $customer){
        $this->orderId = $shoppingCart->getShoppingCartId();
        $this->customerId = $customer->getId();
        $this->date = $shoppingCart->getDate();
    }
}