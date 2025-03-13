<?php
declare(strict_types=1);
namespace Application;

use Domain\Product;
use Domain\ShoppingCart;
use Domain\Customer;
use Domain\ProductRepository;
use Domain\CustomerRepository;
use Exceptions\ItemNotAvailableException;
use Exceptions\NoStockAvailableException;
use Exceptions\CustomerNotFoundException;

class AddToCartUseCase
{
    private ProductRepository $productRepository;
    private CustomerRepository $customerRepository;
    
    public function __construct(
        ProductRepository $productRepository,
        CustomerRepository $customerRepository
    ) {
        $this->productRepository = $productRepository;
        $this->customerRepository = $customerRepository;
    }
    
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
    
    public function execute(string $customerId, string $productId, int $quantity): ShoppingCart
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
            $cart = new ShoppingCart($customerId, $customer->getAddress()->getCity());
            $customer->setShoppingCart($cart);
        }
      
        $cart = new ShoppingCart();

        // Add product to cart
        $cart->addProduct($product, $quantity);
        
        return $cart;
    }
}