<?php

declare(strict_types=1);

namespace Domain;

interface ShoppingCartRepository
{
    public function findByShoppingCartId(string $shoppingCartId): ?ShoppingCart;
    public function getAllShoppingCarts(): array;

    public function save(ShoppingCart $shoppingCart): void;
}