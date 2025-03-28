<?php

declare(strict_types=1);

namespace Test\Domain;

require_once __DIR__ ."/../../public/Domain/Customer.php";
require_once __DIR__ ."/../../public/Domain/CustomerAddress.php";

use Domain\Customer;
use Domain\CustomerAddress;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase{

    public function testItShouldCreateCustomer(){

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
            null
        );

        $this->assertEquals('123456789J', $customer->getId());
        $this->assertEquals("Gabi Gab", $customer->getName());
        $this->assertEquals("Gabi@Gab.com", $customer->getEmail());
        $this->assertEquals(123456789, $customer->getPhone());
        $this->assertEquals($address, $customer->getAddress());
        $this->assertEquals(null, $customer->getShoppingCart());
    }
}