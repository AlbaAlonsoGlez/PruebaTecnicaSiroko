<?php

declare(strict_types=1);

namespace Domain;

interface ShoppingCartRepository
{
    public function getAll(): array;
    public function byOrderId(string $orderId): ?ShoppingCart;
}