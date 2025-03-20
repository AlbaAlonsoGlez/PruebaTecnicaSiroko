<?php

declare(strict_types=1);

namespace Domain;

interface OrderRepository
{
    public function findByOrderId(string $orderId): ?Order;
    public function getAllOrders(): array;

    public function save(Order $order): void;
}