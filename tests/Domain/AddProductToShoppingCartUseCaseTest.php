<?php

declare(strict_types=1);

namespace Test\Domain;

require_once __DIR__ ."/../../public/Domain/Product.php";
require_once __DIR__ ."/../../public/Domain/ShoppingCart.php";
require_once __DIR__ ."/../../public/Domain/Customer.php";
require_once __DIR__ ."/../../public/Domain/ShoppingCartRepository.php";
require_once __DIR__ ."/../../public/Domain/CustomerRepository.php";
require_once __DIR__ ."/../../public/Domain/ProductRepository.php";
// require_once __DIR__ ."/../../public/Infrastructure/InMemoryShoppingCartRepository";
// require_once __DIR__ ."/../../public/Infrastructure/InMemoryCustomerRepository";
// require_once __DIR__ ."/../../public/Infrastructure/InMemoryShoppingCartRepository";


use Domain\Product;
use Domain\ShoppingCart;
use Domain\Customer;
use Domain\ShoppingCartRepository;
use Domain\ProductRepository;
use Domain\CustomerRepository;
use Infrastructure\InMemoryShoppingCartRepository;
use Infrastructure\InMemoryCustomerRepository;
use PHPUnit\Framework\TestCase;

class AddProductToShoppingCartUseCaseTest extends TestCase
{

    public function testItShouldAddProductToShoppingCart(){
        $InMemoryustomerRepository = new InMemoryCustomerRepository();
        // $customerRepository = new CustomerRepository();
        $shoppingCartRepository = new ShoppingCartRepository();

        //Creamos un producto.
        $product = new Product(
            'A-1',
            "Cami negra",
            "Cami negra manga corta",
            1000,
            5
        );
        //Lo guardamos en su repo.
        $this->producRepository->save($product);

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        //Creamos un carrito
        $shoppingCart = new ShoppingCart(
            "SC1",
            "123456789J",
            ['A-1', 2],
            1,
        );
        //Lo guardamos en su repo.
        $this->shoppingCartRepository->save($shoppingCart);

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
       
        //Creamos un cliente.
        $address = new CustomerAddress(
            "Calle Verde",
            "Ciudad Azul",
            "Pais Amarillo",
            "33201",
            "Asturias",
            "Asturias"
        );
        $customer = new Customer(
            '123456789J',
            "Gabi Gab",
            "Gabi@Gab.com",
            "123456789",
            $address,
            $shoppingCart
        );
        //Lo guardamos en su repo.
        $this->customerRepository->save($customer);

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        //Llamamos a los repos.
        
        //$customer = $InMemoryCustomerRepository->findById('123456789J');
        //$InMemoryProductRepository = new InMemoryProductRepository();
        //$newProduct = $InMemoryProductRepository->findByProductId('A-1');

        //$InMemoryShoppingCartRepository = new InMemoryShoppingCartRepository();

        //Llamamos a la función.
        $addToCartUseCase = new AddProductToShoppingCartUseCase($productRepository, $customerRepository, $shoppingCartRepository);
        $addToCartUseCase->execute($newCustomer->getId(), $newProduct->getId(), 2);
        $allCarts=$shoppingCartRepository->getAllShoppingCarts();

        //Comprobamos los retornos.
        $cart = $newCustomer->getShoppingCart();
        $this->assertNotNull($cart, 'El carrito no debería ser null');
        $this->assertEquals(['A-1', 4], $cart->getShoppingCartLine());


    }




}



