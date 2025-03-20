<?php

declare(strict_types=1);

namespace Application;

use Domain\ShoppingCart;
use Domain\ShoppingCartRepository;
use Domain\ProductRepository;
use Exceptions\ItemNotAvailableException;
use Exceptions\ProductNotFoundException;
use Exceptions\ShoppingCartNotFoundException;
use Exceptions\CustomerNotFoundException;

class ModifyQuantityUseCase {

    public function __construct(
        private ProductRepository $productRepository,
        private ShoppingCartRepository $shoppingCartRepository,
        private int $newQuantity
    ) {}
    
    /**
     * Modify Quantity of a product from the customer's shopping cart
     * 
     * @param string $customerId
     * @param string $productId
     * @param int $quantity
     * @return ShoppingCart
     * @throws ItemNotAvailableException
     * @throws CustomerNotFoundException
     */
    
    public function execute(string $shoppingCartId, string $productId, int $newQuantity): void
    {
        $cart = $this->shoppingCartRepository->findByShoppingCartId($shoppingCartId);
            if (!$cart) {
                throw new ShoppingCartNotFoundException();
            }

        $product = $this->productRepository->findByProductId($productId);
            if (!$product) {
                throw new ProductNotFoundException();
            }

        $cart->modifyProductQuantity($product, $newQuantity);
        $this->shoppingCartRepository->save($cart);
    }
}