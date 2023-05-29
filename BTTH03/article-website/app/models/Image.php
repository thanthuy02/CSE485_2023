<?php
class Image {
    private $id;
    private $file;
    private $alt;
    
    // hàm tạo
    public function __construct(){

    }

    // getter
    public function getID(){
        return $this->id;
    }

    public function getFile(){
        return $this->file;
    }

    public function getAlt(){
        return $this->alt;
    }

    //setter
    public function setID($id){
        $this->id = $id;
    }

    public function setFile($file){
        $this->file = $file;
    }

    public function setAlt($alt){
        $this->alt = $alt;
    }
}