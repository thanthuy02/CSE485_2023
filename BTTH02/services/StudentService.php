<?php
require_once 'DatabaseConnection.php';
require_once '../models/Student.php';

class StudentService{
    public function getInfo(){
        // ket noi csdl
        $dbConnection = new DatabaseConnection();
        $conn = $dbConnection->getConnection();
 
        //truy van du lieu
        try {
         // lấy ra id của instructor
            $sql = "SELECT i.stdID, i.stdName, i.stdEmail, i.stdPhone, i.accID
                    FROM student AS i
                    JOIN account AS a ON i.accID = a.accID 
                    WHERE i.accID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $_SESSION['accID']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $student = new Student();
            $student->setName($row['instName']);
            $instructor->setEmail($row['instEmail']);
            $instructor->setPhone($row['instPhone']);
            return $instructor;
 
         } catch (PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
         }
 
    }
     // danh sach cac lop hoc phan ma hoc vien tham gia 
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
}

?>