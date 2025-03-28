<?php

declare(strict_types=1);

namespace Test\Domain;

require_once __DIR__ ."/../../public/Domain/Order.php";
require_once __DIR__ ."/../../public/Domain/ShoppingCart.php";

use Domain\CustomerAddress;
use Domain\Order;
use Domain\ShoppingCart;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testItShouldCreateOrder(){

        $date = new DateTimeImmutable(date("Y-m-d H:i:s"));

        $customer = new CustomerAddress(
            'Calle de la piruleta',
            'Madrid',
            'Spain', 
            '28080'
        );

        $shoppingCart = new ShoppingCart(
            'SC1',
            '80580845T',
            ['A-110', 2],
            1
        );

        $order = new Order(
            "order1",
            "80580845T",
            $ShoppingCartId = $shoppingCart->getShoppingCartId(),
            new DateTimeImmutable(date("Y-m-d H:i:s")),
            ['A-110', 2],
            new CustomerAddress('Calle de la piruleta', 'Madrid', 'Spain', '28080'),
            1,
        );
        
        $this->assertEquals('order1', $order->getOrderId());
        $this->assertEquals('80580845T', $order->getCustomerId());
        $this->assertEquals($ShoppingCartId, $order->getShoppingCartId());
        $this->assertEquals($date, $order->getDate());
        $this->assertEquals(['A-110', 2], $order->getOrderLines());
        $this->assertEquals($customer, $order->getAddress());
        $this->assertEquals(1, $order->getStatus());
    }
}