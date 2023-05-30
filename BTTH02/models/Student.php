<?php
class Student{
    private $stdID;
    private $stdName;
    private $stdClass;
    private $stdEmail;
    private $stdPhone;
    private $accID;

    public function __constructor($stdID, $stdName, $stdClass, $stdEmail, $stdPhone){
        $this->stdID = $stdID;
        $this->stdName = $stdName;
        $this->stdClass = $stdClass;
        $this->stdEmail = $stdEmail;
        $this->stdPhone = $stdPhone;
    }

    public function getID(){
        return $this->stdID;
    }

    public function getName(){
        return $this->stdName;
    }
    
    public function getClass(){
        return $this->stdClass;
    }
    
    public function getEmail(){
        return $this->stdEmail;
    }

    public function getPhone(){
        return $this->stdPhone;
    }

    public function getAccID(){
        return $this->accID;
    }

    public function setName($stdName){
        $this->stdName = $stdName;
    }

    public function setClass($stdClass){
        $this->stdClass = $stdClass;
    }

    public function setEmail($stdEmail){
        $this->stdEmail = $stdEmail;
    }

    public function setPhone($stdPhone){
        $this->stdPhone = $stdPhone;
    }

    public function setAccID($accID){
        $this->accID = $accID;
    }


}


?>