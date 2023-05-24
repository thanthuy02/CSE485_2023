<?php
require_once 'DatabaseConnection.php';
session_start();

class InstructorService {
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
            $sql = "SELECT assignment.subjID, subject.subjName, 
                          CONCAT(assignment.startDate, ' / ', assignment.endDate) AS date
                    FROM assignment JOIN subject ON assignment.subjID = subject.subjID
                    WHERE instID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $id['instID']);
            $stmt->execute();

            // trả về dl
            $subjects = $stmt->fetchAll();
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
         $sql = "SELECT DISTINCT attendance.stdID, student.stdName, student.stdClass
                 FROM attendance JOIN student ON attendance.stdID = student.stdID";
          $stmt = $conn->prepare($sql);
         
          $stmt->execute();

          // trả về dl
          $students = $stmt->fetchAll();
          return $students;

       } catch (PDOException $e) {
          echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
       }
   }
     
}