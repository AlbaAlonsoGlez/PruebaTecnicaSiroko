<?php

require_once __DIR__ ."/Application/Command/AddProductToShoppingCartUseCase.php";  
require_once __DIR__ ."/Application/Command/ModifyQuantityUseCase.php";
require_once __DIR__ . '/Infrastructure/InMemoryProductRepository.php';
require_once __DIR__ . '/Infrastructure/InMemoryCustomerRepository.php';
require_once __DIR__ . '/Infrastructure/InMemoryShoppingCartRepository.php';
require_once __DIR__ . '/Domain/Customer.php';
require_once __DIR__ . '/Domain/CustomerAddress.php';
require __DIR__ . '/Domain/ShoppingCart.php';
require __DIR__ . '/Domain/ShoppingCartLine.php';


use Infrastructure\InMemoryProductRepository;
use Infrastructure\InMemoryCustomerRepository;
use Infrastructure\InMemoryShoppingCartRepository;
use Application\AddProductToShoppingCartUseCase;
use Application\ModifyQuantityUseCase;

$InMemoryCustomerRepository = new InMemoryCustomerRepository();
$customer = $InMemoryCustomerRepository->findById('80580845T');

$InMemoryShoppingCartRepository = new InMemoryShoppingCartRepository();


$InMemoryProductRepository = new InMemoryProductRepository();
$product = $InMemoryProductRepository->findByProductId('A-120');

//__________________________________________________________
//- - - - - - - - - - Creamos el Carrito - - - - - - - - - -
//__________________________________________________________
$addToCartUseCase = new AddProductToShoppingCartUseCase($InMemoryProductRepository, $InMemoryCustomerRepository, $InMemoryShoppingCartRepository);
$addToCartUseCase->execute($customer->getId(), $product->getId(), 1);

$allCarts=$InMemoryShoppingCartRepository->getAllShoppingCarts();
$shoppingCart = $InMemoryShoppingCartRepository->findByShoppingCartId('1');

echo "- - - - - - - - - - Creación carrito - - - - - - - - - -\n";
echo " ";
var_dump($shoppingCart);

