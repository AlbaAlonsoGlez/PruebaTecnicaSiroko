<?php

declare(strict_types=1);

namespace Domain;

interface ProductRepository
{
    public function getAll(): array;
    public function byId(string $productId): ?Product;
}