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

    // save student's data into text file
    public function saveStudent($student, $filename) {
        // Convert the student object to a comma-separated string
        $data = implode(',', array($student->id, $student->name, $student->age, $student->grade));

        // Open the file for writing and append the student data to it
        $file = fopen($filename, 'a');
        fwrite($file, $data . "\n");
        fclose($file);
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