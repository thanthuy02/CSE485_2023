<?php
require 'models/Instructor.php';
require 'services/InstructorService.php';

class InstructorController {
    public function index(){
        // làm việc với service
        $instructorService = new InstructorService();
        $subjects = $instructorService->getSubject();
        // làm việc với view
        include('views/instructor/index.php');
    }

    public function getStudent(){
         // làm việc với service
         $instructorService = new InstructorService();
         $students = $instructorService->getStudent();
         // làm việc với view
         include('views/instructor/list.php');
    }
}