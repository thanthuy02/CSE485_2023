<?php
<<<<<<< HEAD
    class Subject {
        private $subjId;
        private $subjName;
        private $semester;
        private $period;
        
        public function __construct($subjId, $subjName, $semester, $period) {
            $this->subjId = $subjId;
            $this->subjName = $subjName;
            $this->semester = $semester;
            $this->period = $period;
        }
        
        public function getSubjId() {
            return $this->subjId;
        }
        
        public function setSubjId($subjId) {
            $this->subjId = $subjId;
        }
        
        public function getSubjName() {
            return $this->subjName;
        }
        
        public function setSubjName($subjName) {
            $this->subjName = $subjName;
        }
        
        public function getSemester() {
            return $this->semester;
        }
        
        public function setSemester($semester) {
            $this->semester = $semester;
        }
        
        public function getPeriod() {
            return $this->period;
        }
        
        public function setPeriod($period) {
            $this->period = $period;
        }
    }


?>
=======

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
>>>>>>> 14af6b0841c4499e625b4efdd8fb4143d10c812a
