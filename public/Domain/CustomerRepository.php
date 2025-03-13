<?php

declare(strict_types=1);

namespace Domain;

interface CustomerRepository
{
    public function getAllCustomer(): array;
    public function findById(string $id): ?Customer;
    
}