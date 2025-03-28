<?php

declare(strict_types=1);

namespace Test\Domain;

require_once __DIR__ ."/../../public/Domain/ShoppingCart.php";

use Domain\ShoppingCart;
use PHPUnit\Framework\TestCase;

class ShoppingCartTest extends TestCase
{
    public function testItShouldCreateShoppingCart()
	{
        $shoppingCart = new ShoppingCart(
            "1",
            "80580845T",
            ['A-110', 2],
            1,
        );

        $this->assertEquals("1", $shoppingCart->getShoppingCartId());
        $this->assertEquals("80580845T", $shoppingCart->getCustomerId());
        $this->assertEquals(['A-110', 2], $shoppingCart->getShoppingCartLine());
        $this->assertEquals(1, $shoppingCart->getStatus());
    }
}