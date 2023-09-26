<?php

namespace App\Entity;

use App\DTO\DtoInterface;

class User {

    private string $name;
    
    private string $surname;

    private string $passHash;
    
    public function __construct(DtoInterface $dto) {
        
        $this->name = $dto->getName();
        $this->surname = $dto->getSurname();
        $this->hashPass($dto->getPass());
        
    }
    
    public function getName(): string {
        return $this->name;
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function getPassHash(): string {
        return $this->passHash;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setSurname(string $surname): void {
        $this->surname = $surname;
    }

    public function hashPass($pass) {
        $this->passHash = password_hash($pass, PASSWORD_DEFAULT);
    }
    
    public function toArray() {
        return get_object_vars($this);
    }
 
}
