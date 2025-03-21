<?php
declare(strict_types=1);

namespace Domain;

use DateTimeImmutable;

class Order {
    
    public const STATUS_DRAFT = 0;
    public const STATUS_ORDERED = 1;
    public const STATUS_INDELIVERY = 2;
    public const STATUS_DELIVERED = 3;

    public const AVAILABALE_STATUSES = [
        self::STATUS_DRAFT,
        self::STATUS_ORDERED,
        self::STATUS_INDELIVERY,
        self::STATUS_DELIVERED
    ];

    public function __construct(
        private string $orderId,
        private string $customerId,
        private string $shoppingCartId,
        private DateTimeImmutable $date,
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
    public function getDate(): DateTimeImmutable{
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
    
    public function setOrderLines(array $orderLine): void{
        $this->orderLine = $orderLine;
    }
    public function setAddress(CustomerAddress $address): void{
        $this->address = $address;
    }
    public function setStatus(int $status): void{
        $this->status = $status;
    }

    public function generatePurchase(ShoppingCart $shoppingCart, Customer $customer): void{

        $this->address = $customer->getAddress();
        $this->status = self::STATUS_ORDERED;

        foreach($shoppingCart->getShoppingCartLine() as $line){
            $itemId = $line->getItemId();
            $quantity = $line->getQuantity();
            $this->orderLine[] = new OrderLine($itemId, $quantity);
        }
    }
}