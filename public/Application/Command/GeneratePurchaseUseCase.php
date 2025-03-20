<?php

declare(strict_types=1);

namespace Application;

use DateTime;
use Domain\Product;
use Domain\ShoppingCart;
use Domain\Customer;
use Domain\Order;
use Domain\ShoppingCartRepository;
use Domain\ProductRepository;
use Domain\CustomerRepository;
use Domain\OrderRepository;
use Exceptions\ItemNotAvailableException;
use Exceptions\ProductNotFoundException;
use Exceptions\ShoppingCartNotFoundException;
use Exceptions\CustomerNotFoundException;
use Infrastructure\InMemoryShoppingCartRepository;

class generatePurchaseUseCase {

    public function __construct(
        private ProductRepository $productRepository,
        private CustomerRepository $customerRepository,
        private ShoppingCartRepository $shoppingCartRepository,
        private OrderRepository $orderRepository
    ) {}
    
    /**
     * Generates an order from the customer's shopping cart
     * 
     * @param string $customerId
     * @param string $productId
     * @param int $quantity
     * @return ShoppingCart
     * @throws ItemNotAvailableException
     * @throws CustomerNotFoundException
     */
    
    public function execute(string $shoppingCartId, string $customerId, string $orderId): void{

        // Validamos el Carrito
        $cart = $this->shoppingCartRepository->findByShoppingCartId($shoppingCartId);
        if (!$cart) {
            throw new ShoppingCartNotFoundException();
        }
        
        //Validamos el cliente
        $customer = $this->customerRepository->findById($customerId);
        if (!$customer) {
            throw new CustomerNotFoundException();
        }

        $order = new Order($cart->getShoppingCartId(), $customer->getId(), Date("Y-m-d H:i:s"),$cart->getShoppingCartLine(), $customer->getAddress(), Order::STATUS_ORDERED);

        $order->generatePurchase($cart, $customer);
        $this->orderRepository->save($order);
    }
}