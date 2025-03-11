<?php
declare(strict_types=1);

namespace Domain;

class Customer  {
    public function __construct(
        private string $id,
        private string $name,
        private string $email,
        private int $phone,
   ){}

   public function getId(): string{
       return $this->id;
   }    

   public function getName(): string{
       return $this->name;
   }
   public function getEmail(): string{
       return $this->email;
   }
   public function getPhone(): int{
       return $this->phone;
   }
   public function setId(string $id): void{
       $this->id = $id;
   }
    public function setName(string $name): void{
       $this->name = $name;
    }

    public function setEmail(string $email): void{
         $this->email = $email;
    }

    public function setPhone(int $phone): void{
        $this->phone = $phone;
    }
}