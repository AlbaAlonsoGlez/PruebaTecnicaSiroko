<?php

require_once __DIR__ ."/Application/Command/AddProductToShoppingCartUseCase.php";  
require_once __DIR__ . '/Infrastructure/InMemoryProductRepository.php';
require_once __DIR__ . '/Infrastructure/InMemoryCustomerRepository.php';
require_once __DIR__ . '/Infrastructure/InMemoryShoppingCartRepository.php';
require_once __DIR__ . '/Domain/Customer.php';
require_once __DIR__ . '/Domain/CustomerAddress.php';
require __DIR__ . '/Domain/ShoppingCart.php';
require __DIR__ . '/Domain/ShoppingCartLine.php';

use Domain\Customer;    
use Infrastructure\InMemoryProductRepository;
use Infrastructure\InMemoryCustomerRepository;
use Infrastructure\InMemoryShoppingCartRepository;
use Application\AddProductToShoppingCartUseCase;

$product= 'BX Resistance';
$productRepository = new InMemoryProductRepository();


$InMemoryCustomerRepository = new InMemoryCustomerRepository();
$customer = $InMemoryCustomerRepository->findById('80580845T');

$InMemoryProductRepository = new InMemoryProductRepository();
$product = $InMemoryProductRepository->findByProductId('A-120');

$InMemoryShoppingCartRepository = new InMemoryShoppingCartRepository();

$customerRepository = new InMemoryCustomerRepository();

$addToCartUseCase = new AddProductToShoppingCartUseCase($productRepository, $customerRepository, $InMemoryShoppingCartRepository);

$addToCartUseCase->execute($customer->getId(), $product->getId(), 1);

$allCarts=$InMemoryShoppingCartRepository->getAllShoppingCarts();
var_dump($allCarts);
die();