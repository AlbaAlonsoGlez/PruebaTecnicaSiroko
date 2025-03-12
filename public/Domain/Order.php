<?php
declare(strict_types=1);

namespace Domain;

class Order {
    
    private function __construct(
        private string $orderId,
        private string $customerId,
        private \dateTime $date,
        private array $orderLine,
        private string $address,
        private int $status,
    ) {}

    public function getOrderId(): string{
        return $this->orderId;
    }
    public function getCustomerId(): string{
        return $this->customerId;
    }
    public function getDate(): \dateTime{
        return $this->date;
    }
    public function getOrderLines(): array{
        return $this->orderLine;
    }
    public function getAddress(): string{
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
    public function setDate(\dateTime $date): void{
        $this->date = $date;
    }
    public function setOrderLines(array $orderLine): void{
        $this->orderLine = $orderLine;
    }
    public function setAddress(string $address): void{
        $this->address = $address;
    }
    public function setStatus(int $status): void{
        $this->status = $status;
    }
}