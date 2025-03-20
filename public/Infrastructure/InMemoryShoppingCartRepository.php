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
    public function getShoppingCarts(): array{

        $SC1 = new ShoppingCart (
           shoppingCartId: 'SC1',
           customerId: '80580845T',
           shoppingCartLine: ['A-110', 2], 
           status: ShoppingCart::STATUS_ACTIVE,
        );
    
        $inMemoryShoppingCartRepository = [$SC1];
        return $inMemoryShoppingCartRepository;
    }

    public function findByShoppingCartId(string $id): ?ShoppingCart{
        $shoppingCarts = $this->getAllShoppingCarts();
        foreach($shoppingCarts as $shoppingCart){
            if($shoppingCart->getShoppingCartId()===$id){
                return $shoppingCart;
            }
        }
        return null;
    }

    
    public function getAllShoppingCarts(): array{

        return array_values($this->shoppingCarts);
    }
    public function save(ShoppingCart $shoppingCart): void{
        $this->shoppingCarts[$shoppingCart->getShoppingCartId()] = $shoppingCart;
    }
}