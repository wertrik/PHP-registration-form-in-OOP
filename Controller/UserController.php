<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\Presenter;
use App\Validator\Validator;
use App\DTO\RegistrationDTO;
use App\Service\FileHandler\FileHandlerInterface;

class UserController {

    public function registration(Presenter $presenter, FileHandlerInterface $fileHandler) {

        $response = $this->handleForm();
        
        if (is_object($response)) {
            
            if ($this->saveUser($response, $fileHandler)) {
                
                $_SESSION["user"] = serialize($response->toArray());
            
                header("Location: /registrace-uspesna");
                exit();
            }
            
            $response = ["Nepodařilo se data uložit"];
            
        }

        $presenter->render('UserRegistrationForm', is_array($response) ? $response : []);
        
    }
    
    public function registrationSuccessful(Presenter $presenter) {
        
        if (isset($_SESSION["user"])) {
        
            $user = unserialize($_SESSION["user"]);

            $presenter->render('UserRegistrationSuccess', $user);
            
        } else {
            
            header("Location: /registrace");
            exit();
            
        }
        
    }
    
    private function handleForm() {
        
        if ('POST' == $_SERVER['REQUEST_METHOD']) {

            $dto = new RegistrationDTO();

            $dto->setName($_REQUEST['name']);
            $dto->setSurname(trim($_REQUEST['surname']));
            $dto->setPass($_REQUEST['pass']);
            $dto->setPassForValidation($_REQUEST['pass2']);
            $dto->setResponse($_REQUEST['response']);
            
            $validator = new Validator();
            $validator->validate($dto);
            $violations = $validator->getViolationsList();

            if (empty($violations)) {    
                return new User($dto);                
            } else {
                return (array) $violations[RegistrationDTO::class]['messages'];                
            }            
            
        }
        
    }
    
    private function saveUser(User $user, FileHandlerInterface $fileHandler) {        

        $fileHandler->setFile('access.txt');
        return $fileHandler->writeNewRecord($user->toArray()); 
        
    }
    
}
