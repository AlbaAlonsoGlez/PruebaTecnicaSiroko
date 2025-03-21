<?php

require_once __DIR__ ."/Application/Command/AddProductToShoppingCartUseCase.php"; 
require_once __DIR__ ."/Application/Command/GeneratePurchaseUseCase.php"; 
require_once __DIR__ . '/Infrastructure/InMemoryProductRepository.php';
require_once __DIR__ . '/Infrastructure/InMemoryCustomerRepository.php';
require_once __DIR__ . '/Infrastructure/InMemoryShoppingCartRepository.php';
require_once __DIR__ . "/Infrastructure/InMemoryOrderRepository.php";
require_once __DIR__ . '/Domain/Customer.php';
require_once __DIR__ . '/Domain/CustomerAddress.php';
require_once __DIR__ . "/Domain/Order.php";
require_once __DIR__ . "/Domain/OrderLine.php";
require __DIR__ . '/Domain/ShoppingCart.php';
require __DIR__ . '/Domain/ShoppingCartLine.php';


use Application\AddProductToShoppingCartUseCase;
use Application\GeneratePurchaseUseCase;
use Infrastructure\InMemoryProductRepository;
use Infrastructure\InMemoryCustomerRepository;
use Infrastructure\InMemoryShoppingCartRepository;
use Infrastructure\InMemoryOrderRepository;


$InMemoryCustomerRepository = new InMemoryCustomerRepository();
$customer = $InMemoryCustomerRepository->findById('80580845T');

$InMemoryProductRepository = new InMemoryProductRepository();
$product = $InMemoryProductRepository->findByProductId('A-120');

$InMemoryShoppingCartRepository = new InMemoryShoppingCartRepository();

$InMemoryOrderRepository = new InMemoryOrderRepository();


//__________________________________________________________
//- - - - - - - - - - Creamos el Carrito - - - - - - - - - -
//__________________________________________________________
$addToCartUseCase = new AddProductToShoppingCartUseCase($InMemoryProductRepository, $InMemoryCustomerRepository, $InMemoryShoppingCartRepository);
$addToCartUseCase->execute($customer->getId(), $product->getId(), 1);

$allCarts=$InMemoryShoppingCartRepository->getAllShoppingCarts();
$shoppingCart = $InMemoryShoppingCartRepository->findByShoppingCartId('SC1');

echo "- - - - - - - - - - Creación carrito - - - - - - - - - -<br>\n";
var_dump($shoppingCart);
echo "<br>";

//_________________________________________________________
//- - - - - - - - - - Creamos el Pedido - - - - - - - - - -
//_________________________________________________________
$generatePurchaseUseCase = new GeneratePurchaseUseCase( $InMemoryProductRepository, $InMemoryCustomerRepository, $InMemoryShoppingCartRepository, $InMemoryOrderRepository);
$generatePurchaseUseCase->execute($shoppingCart->getShoppingCartId(), $customer->getId());

$allOrders = $InMemoryOrderRepository->getAllOrders();
$order = $InMemoryOrderRepository->findByOrderId("order1");
echo "<br><br>- - - - - - - - - - Generación de pedido - - - - - - - - - -<br>";
var_dump($order);
die();