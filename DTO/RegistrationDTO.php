<?php

namespace App\DTO;

use App\Validator\Asserts\NotEmpty;
use App\Validator\Asserts\IsTrue;
use App\Validator\Asserts\EqualTo;


class RegistrationDTO implements DtoInterface {

    #[NotEmpty(message: 'Jméno musí být vyplněno')]
    private string $name;
    
    #[NotEmpty(message: 'Příjmení musí být vyplněno')]
    private string $surname;

    #[NotEmpty(message: 'Heslo musí být vyplněno')]
    private string $pass;

    private string $passForValidation;

    #[EqualTo(toCompare: '0', message: 'Kontrolní otázka je špatně')]
    private $response;
    
    public function getName(): string {
        return $this->name;
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function getPass(): string {
        return $this->pass;
    }

    public function setName(string $name): void {
        $this->name = trim(str_replace(array(":", "\n", "\r"), "", htmlspecialchars($name)));
    }

    public function setSurname(string $surname): void {
        $this->surname = trim(str_replace(array(":", "\n", "\r"), "", htmlspecialchars($surname)));
    }

    public function setPass(string $pass): void {
        $this->pass = $pass;
    }

    public function setPassForValidation(string $passForValidation): void {
        $this->passForValidation = $passForValidation;
    }

    public function setResponse($response): void {
        $this->response = $response;
    }
        
    #[IsTrue(message: 'Hesla se neshodují')]
    public function PassAreEquals() {
        return $this->pass == $this->passForValidation;
    }
    
}
