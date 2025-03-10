<?php
declare(strict_types=1);

namespace Domain;

class Product{

    public function __construct(
        private string $id,
        private string $name,
        private string $description,
        private float $price,
        private int $stock
    ){}

    public function getId(): string{
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getDescription(): string{

        return $this->description;

    }

    public function getPrice(): float{

        return $this->price;

    }

    public function getStock(): int{

        return $this->stock;

    }

    public function setName(string $name): void{

        $this->name = $name;

    }

    public function setDescription(string $description): void{

        $this->description = $description;

    }

    public function setPrice(float $price): void{

        $this->price = $price;

    }

    public function setStock(int $stock): void{

        $this->stock = $stock;

    }
}