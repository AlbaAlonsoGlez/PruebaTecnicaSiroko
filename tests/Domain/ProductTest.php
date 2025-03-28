<?php

declare(strict_types=1);

namespace Test\Domain;

require_once __DIR__ ."/../../public/Domain/Product.php";

use Domain\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase{

    public function testItShouldCreateProduct(){

        $product = new Product(
            'A-1',
            "Cami negra",
            "Cami negra manga corta",
            1000,
            5
        );

        $this->assertEquals('A-1', $product->getId());
        $this->assertEquals("Cami negra", $product->getName());
        $this->assertEquals("Cami negra manga corta", $product->getDescription());
        $this->assertEquals(1000, $product->getPrice());
        $this->assertEquals(5, $product->getStock());
    }
}