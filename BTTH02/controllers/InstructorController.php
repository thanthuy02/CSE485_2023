<?php

require 'services/InstructorService.php';

class InstructorController {
    public function index(){
        // làm việc với service
        $instructorService = new InstructorService();
        $subjects = $instructorService->getSubject();
        $instructor = $instructorService->getInfo();
        // làm việc với view
        include('views/instructor/index.php');
    }

    public function getStudent(){
         // làm việc với service
         $instructorService = new InstructorService();
         $subjects = $instructorService->getSubject();
         $instructor = $instructorService->getInfo();
         $students = $instructorService->getStudent();
         // làm việc với view
         include('views/instructor/list.php');
    }
}