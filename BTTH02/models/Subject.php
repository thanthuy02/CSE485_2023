<?php

class Subject {
    private $subjID;
    private $subjName;
    private $semester;
    private $period;

    public function __construct($subjID, $subjName, $semester, $period){
        $this->subjID = $subjID;
        $this->subjName = $subjName;
        $this->semester = $semester;
        $this->period = $period;
    }

    public function getSubjID(){
        return $this->subjID;
    }

    public function getSubjName(){
        return $this->subjName;
    }

    public function setSubjName($subjName){
        $this->subjName = $subjName;
    }

    public function getSemester(){
        return $this->semester;
    }

    public function setSemester($semester){
        $this->semester = $semester;
    }

    public function getPeriod(){
        return $this->period;
    }

    public function setPeriod($period){
        $this->period = $period;
    }


}