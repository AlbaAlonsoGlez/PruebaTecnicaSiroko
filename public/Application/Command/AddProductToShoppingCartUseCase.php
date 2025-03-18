<?php
declare(strict_types=1);
namespace Application;

use Domain\Product;
use Domain\ShoppingCart;
use Domain\Customer;
use Domain\ShoppingCartRepository;
use Domain\ProductRepository;
use Domain\CustomerRepository;
use Exceptions\ItemNotAvailableException;
use Exceptions\NoStockAvailableException;
use Exceptions\CustomerNotFoundException;
use Infrastructure\InMemoryShoppingCartRepository;

class AddProductToShoppingCartUseCase
{
    public function __construct(
        private ProductRepository $productRepository,
        private CustomerRepository $customerRepository,
        private ShoppingCartRepository $shoppingCartRepository
    ) {}
    
    /**
     * Adds a product to the customer's shopping cart
     * 
     * @param string $customerId
     * @param string $productId
     * @param int $quantity
     * @return ShoppingCart
     * @throws ItemNotAvailableException
     * @throws NoStockAvailableException
     * @throws CustomerNotFoundException
     */
    
    public function execute(string $customerId, string $productId, int $quantity): void
    {
        
        // Validate customer exists
       $customer = $this->customerRepository->findById($customerId);
         if (!$customer) {
             throw new CustomerNotFoundException();
         }
        

        // Validate product exists
        $product = $this->productRepository->findByProductId($productId);
        if (!$product) {
            throw new ItemNotAvailableException();
        }
        

        // Validate stock availability
        if ($product->getStock() < $quantity) {
            throw new NoStockAvailableException();
        }

        // Get or create shopping cart
        $cart = $customer->getShoppingCart();
        if (!$cart) {
            $cart = new ShoppingCart('1', $customer->getId(), [], ShoppingCart::STATUS_ACTIVE);
            $customer->setShoppingCart($cart);
        }

        // Add product to cart
        $cart->addProduct($product, $quantity);
        $this->shoppingCartRepository->save($cart);
    }
}