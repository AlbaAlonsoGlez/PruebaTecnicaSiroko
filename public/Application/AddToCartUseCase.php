<?php

declare(strict_types=1);

namespace Application;

use Domain\Order;
use Domain\ShoppingCart;
use Exceptions\ItemNotAvailableException;
use Exceptions\NoStockAvailableException;

final readonly class AddToCartUseCase
{
    private $productList = [];
    public function addProduct($order) {
        foreach ($this->productList as &$existingOrder) {
            if ($existingOrder->getProductId() === $order->getProductId()) {
                $existingOrder->setQuantity($existingOrder->getQuantity() + $order->getQuantity());
                return;
            }
        }
        $this->productList[] = $order;
    }

    private $shoppingCartRepository;
    private $productRepository;
    private $product;
    
    public function __construct($shoppingCartRepository, $productRepository) {
        $this->shoppingCartRepository = $shoppingCartRepository;
        $this->productRepository = $productRepository;
    }

    public function execute($customerId, $productId, $quantity) {
        $shoppingCart = $this->shoppingCartRepository->findByCustomerId($customerId);

        if (!$shoppingCart) {
            $shoppingCart = new ShoppingCart($customerId);
            $this->shoppingCartRepository->save($shoppingCart);
        }

        $product = $this->productRepository->findById($productId);

        if (!$product) {
            throw new ItemNotAvailableException();
        }

        if ($product->getStock() < $quantity) {
            throw new NoStockAvailableException();
        }

        $order = new Order($productId, $quantity);

        $shoppingCart->addProduct($order);

        $this->shoppingCartRepository->save($shoppingCart);
        
        return $shoppingCart;
    }
    
}  
