<?php   

declare(strict_types=1);
namespace Domain;

require_once __DIR__ .'/../Exceptions/InvalidLengthException.php';


use Exceptions\EmptyArgumentException;
use Exceptions\InvalidArgumentException;
use Exceptions\InvalidLengthException;

class CustomerAddress
{
    public function __construct(
        private string $street,
        private string $city,
        private string $country,
        private string $postalCode,
        private ?string $province = null,
        private ?string $state = null,
    ) {
        
        if (empty($this->street)) {
            throw new EmptyArgumentException();
        }
        if (empty($this->city)) {
            throw new EmptyArgumentException();
        }
        if (empty($this->country)) {
            throw new EmptyArgumentException();
        }
        if (empty($this->postalCode)) {
            throw new EmptyArgumentException();
        }
        if (strpos($this->postalCode, '-') === 0) {
            throw new InvalidArgumentException();
        }
        if(strlen($this->postalCode) < 5 || strlen($this->postalCode) > 6) {
            throw new InvalidLengthException();
        }
    
    }

    //GETTERS
    public function getStreet(): string
    {
        return $this->street;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function getProvince(): ?string
    {
        return $this->province;
    }
    public function getState(): ?string
    {
        return $this->state;
    }
    public function getCountry(): string
    {
        return $this->country;
    }
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    //SETTERS
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }
    public function setCity(string $city): void
    {
        $this->city = $city;
    }
    public function setProvince(string $province): void
    {
        $this->province = $province;
    }
    public function setState(string $state): void
    {
        $this->state = $state;
    }
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }


}



