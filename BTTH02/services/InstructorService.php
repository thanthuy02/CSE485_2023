<?php
require_once './libs/DatabaseConnection.php';
require_once 'models/Instructor.php';
require_once 'models/Subject.php';
session_start();

class InstructorService {

   public function getInfo(){
       // kết nối DB
       $dbConnection = new DatabaseConnection();
       $conn = $dbConnection->getConnection();

       //truy vấn dl
       try {
        // lấy ra id của instructor
           $sql = "SELECT i.instID, i.instName, i.instEmail, i.instPhone, i.accID
                   FROM instructor AS i
                   JOIN account AS a ON i.accID = a.accID 
                   WHERE i.accID = ?";
           $stmt = $conn->prepare($sql);
           $stmt->bindValue(1, $_SESSION['accID']);
           $stmt->execute();
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
           $instructor = new Instructor();
           $instructor->setInstName($row['instName']);
           $instructor->setInstEmail($row['instEmail']);
           $instructor->setInstPhone($row['instPhone']);
           return $instructor;

        } catch (PDOException $e) {
           echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
        }

   }
    // lấy tất cả lớp học phần của 1 giảng viên
    public function getSubject() {
        // kết nối DB
        $dbConnection = new DatabaseConnection();
        $conn = $dbConnection->getConnection();

        //truy vấn dl
        try {
         // lấy ra id của instructor
            $sql = "SELECT instID FROM instructor
                     JOIN account ON instructor.accID = account.accID 
                     WHERE instructor.accID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $_SESSION['accID']);
            $stmt->execute();
            $id = $stmt->fetch(PDO::FETCH_ASSOC);

            // lấy ra các lớp học phần mà giảng viên đó được phân công
            $sql = "SELECT a.subjID, b.subjName, b.semester, b.period
                    FROM assignment AS a
                    JOIN subject AS b ON a.subjID = b.subjID
                    WHERE instID = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $id['instID']);
            $stmt->execute();

            // trả về dl
            $subjects = [];
            while ($row = $stmt->fetch()){
               $subject = new Subject($row['subjID'], $row['subjName'], $row['semester'], $row['period']);
               $subjects[] = $subject;
            }
            return $subjects;

         } catch (PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
         }
     }

     // lấy danh sách sinh viên của từng lớp học phần mà giảng viên dạy
    public function getStudent() {
      // kết nối DB
      $dbConnection = new DatabaseConnection();
      $conn = $dbConnection->getConnection();

      //truy vấn dl
      try {
         // lấy thông tin của sinh viên
         $sql = "SELECT DISTINCT a.stdID, s.stdName, s.stdClass
                 FROM attendance AS a 
                 JOIN student AS s ON a.stdID = s.stdID";
          $stmt = $conn->prepare($sql);
         
          $stmt->execute();

          // trả về dl
          $students = $stmt->fetchAll();
          return $students;

       } catch (PDOException $e) {
          echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
       }
   }

   // // lấy ngày điểm danh 
   // public function getDateAttend() {
   //    // kết nối DB
   //    $dbConnection = new DatabaseConnection();
   //    $conn = $dbConnection->getConnection();

   //    //truy vấn dl
   //    try {
   //       $sql = "SELECT DISTINCT dateAttend FROM attendance; ";
   //       $stmt = $conn->query($sql);

   //        // trả về dl
   //        $dateAttend = $stmt->fetchAll();
   //        return $dateAttend;

   //     } catch (PDOException $e) {
   //        echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
   //     }
   // }

   // lấy danh sách sinh viên điểm danh theo ngày và lớp học phần
   public function getAttendance(){
      // kết nối DB
      $dbConnection = new DatabaseConnection();
      $conn = $dbConnection->getConnection();
      
      // truy vấn dl
      try {
         $sql = "SELECT a.stdID, s.stdName, s.stdClass, a.state
                 FROM attendance AS a
                 JOIN student AS s ON a.stdID = s.stdID
                 WHERE a.subjID = ? AND a.dateAttend = ?;";
         $stmt->bindValue(1, $GET['subject']);
         $stmt->bindValue(2, $GET['date']);
         
         $stmt->execute();

         // trả về dl
         $attendList = $stmt->fetchAll();
         return $attendList; 

      }catch (PDOException $e){
         echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMassage();
      }
   }

     
}