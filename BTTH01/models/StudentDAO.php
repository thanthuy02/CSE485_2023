<?php
require_once 'Student.php';
class StudentDAO {
    public array $students;

    public function __construct(){
        $this -> students = array();
    }

    // create a student
    public function create(Student $student){
        $this->students[] = $student;
    }

     //display student list on table
    public function getAll() {
        return $this->students;
    }

    //search a student with id
    public function read($id) {
        foreach ($this->students as $student) {
            if ($student->getId() == $id) {
                return $student;
            }
        }
        return null;
    }


    public function update($id, Student $newStudent) {
        foreach ($this->students as &$student) {
            if ($student->getId() == $id) {
                $student = $newStudent;
            }
        }
    }

    public function delete($id) {
        foreach ($this->students as $key => $student) {
            if ($student->getId() == $id) {
                unset($this->students[$key]);
            }
        }
    }

}

?>