<?php

declare(strict_types=1);

namespace Infrastructure;

require_once __DIR__ ."/../Domain/ShoppingCartRepository.php";

use Domain\Product;
use Domain\ShoppingCart;
use Domain\ShoppingCartLine;
use Domain\ShoppingCartRepository;


class InMemoryShoppingCartRepository implements ShoppingCartRepository
{
    private array $shoppingCarts = [];
    public function getAllShoppingCarts(): array{

        return array_values($this->shoppingCarts);
    }
    public function save(ShoppingCart $shoppingCart): void{
        $this->shoppingCarts[$shoppingCart->getShoppingCartId()] = $shoppingCart;
    }
}