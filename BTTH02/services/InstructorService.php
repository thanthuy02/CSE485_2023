<?php
require_once 'models/Instructor.php';
class InstructorService {
    // lấy tất cả lớp học phần của 1 giảng viên
    public function getSubjectByInstructor($instID) {
        // kết nối DB
        try {
            $conn = new PDO('mysql:host=localhost;dbname=attendance-management;port=3306','root','0210');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        //truy vấn dl
        try {
           $sql = "SELECT * FROM assignment WHERE instID = ?";
           $stmt = $conn->prepare($sql);
           $stmt->bindValue(1,$instID, PDO::PARAM_INT);
           $stmt->execute();

           // trả về dl
           $subjects = $stmt->fetchAll();
           return $subjects;
        } catch (PDOException $e) {
           echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
        }
     }
     
}