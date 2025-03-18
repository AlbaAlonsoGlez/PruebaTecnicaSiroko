<?php
declare(strict_types=1);

namespace Infrastructure;

require_once __DIR__ . '/../Domain/CustomerRepository.php';

use Domain\Customer;
use Domain\CustomerRepository;
use Domain\CustomerAddress;


class InMemoryCustomerRepository implements CustomerRepository{

    public function getAllCustomer(): array{

        $Ana = new Customer (
            id: '80580845T',
            name: 'Ana',
            email: 'ana@gmail.com',
            phone: '658111111',
            address: new CustomerAddress('Calle de la piruleta', 'Madrid', 'Spain', '28080'),
        );
        $Juan = new Customer (
            id: '63921307Y',
            name: 'Juan',
            email: 'Juan@gmail.com',
            phone: '652333333',
            address: new CustomerAddress('Calle Ramos', 'Barcelona', 'Spain', '457563'),
        );

        $inMemoryCustomerRepository = [$Ana, $Juan];
        return $inMemoryCustomerRepository;
    }

    public function findById(string $id): ?Customer{

        $Customers = $this->getAllCustomer();
        foreach($Customers as $Customer){
            if($Customer->getId()===$id){
                return $Customer;
            }
        }
        return null;
    }
}