<?php

declare(strict_types=1);

namespace Test\Domain;

require_once __DIR__ ."/../../public/Domain/CustomerAddress.php";

use Domain\CustomerAddress;
use PHPUnit\Framework\TestCase;

class CustomerAddressTest extends TestCase{

    public function testItShouldCreateAddress(){

        $address = new CustomerAddress(
            "Calle Verde",
            "Ciudad Azul",
            "Pais Amarillo",
            "33201",
            "Asturias",
            "Asturias"
        );

        $this->assertEquals("Calle Verde", $address->getStreet());
        $this->assertEquals("Ciudad Azul", $address->getCity());
        $this->assertEquals("Pais Amarillo", $address->getCountry());
        $this->assertEquals("33201", $address->getPostalCode());
        $this->assertEquals("Asturias", $address->getProvince());
        $this->assertEquals("Asturias", $address->getState());
    }
}