<?php
require_once APP_ROOT.'/app/models/Member.php';

class MemberService{

    // lấy tất cả thông tin của tác giả
    public function getAllMember(){
        try {
            // kết nối db
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();

            // truy vấn 
            $sql = "SELECT * FROM member";
            $stmt = $conn->query($sql);

            $members = [];
            while($row = $stmt->fetch()){
                $member = new Member();

                $member->setID($row['id']);
                $member->setForename($row['forename']);
                $member->setSurname($row['surname']);
                $member->setEmail($row['email']);
                $member->setPassword($row['password']);
                $member->setJoined($row['joined']);
                $member->setPicture($row['picture']);

                $members[] = $member;
             }

            // trả về kq
            return $members;
        } catch (PDOException $e){
            return $members=[];
        }
        
    }
}