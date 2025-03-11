<?php

require_once __DIR__ . '/Infrastructure/InMemoryProductRepository.php';

use Infrastructure\InMemoryProductRepository;


$product= 'BX Resistance';
$productRepository = new InMemoryProductRepository();