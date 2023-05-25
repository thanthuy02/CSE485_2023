<?php
class Instructor {
    private $instID;
    private $instName;
    private $instEmail;
    private $instPhone;
    private $accID;

    // hàm tạo
    public function __construct(){

    }

    // Hàm getter và setter
    public function getInstID(){
        return $this->instID;
    }

    public function getInstName(){
        return $this->instName;
    }

    public function setInstName($instName){
        $this->instName = $instName;
    }

    public function getInstEmail(){
        return $this->instEmail;
    }

    public function setInstEmail($instEmail){
        $this->instEmail = $instEmail;
    }

    public function getInstPhone(){
        return $this->instPhone;
    }

    public function setInstPhone($instPhone){
        $this->instPhone = $instPhone;
    }

    public function getAccID(){
        return $this->accID;
    }
}