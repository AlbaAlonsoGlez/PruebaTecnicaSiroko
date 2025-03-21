<?php
declare(strict_types= 1);

namespace Infrastructure;

require_once __DIR__ ."/../Domain/OrderRepository.php";

use DateTimeImmutable;
use Domain\Order;
use Domain\OrderLine;
use Domain\OrderRepository;
use Domain\CustomerAddress;

class InMemoryOrderRepository implements OrderRepository{

    private array $orders = [];
    public function getAllOrders(): array{

        $order1 = new Order(
            orderId:"order1",
            customerId:"80580845T",
            shoppingCartId:"SC1",
            date: new DateTimeImmutable(date("Y-m-d H:i:s")),
            orderLine:['A-110', 2],
            address: new CustomerAddress('Calle de la piruleta', 'Madrid', 'Spain', '28080'),
            status:Order::STATUS_DRAFT,
        );

        $inMemoryOrderRepository = [$order1];
        return $inMemoryOrderRepository;
    }

    public function findByOrderId(string $orderId): ?Order{
        $orders = $this->getAllOrders();
        foreach($orders as $order){
            if($order->getOrderId() === $orderId){
                return $order;
            }
        }
        return null;
    }

    public function save(Order $order): void{
        $this->orders[$order->getOrderId()]= $order;
    }
}



