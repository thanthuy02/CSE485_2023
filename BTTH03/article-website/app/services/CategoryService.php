<?php
require_once APP_ROOT.'/app/models/Category.php';

class CategoryService{

    // lấy tất cả thông tin của danh mục
    public function getAllCategory(){
        try {
            // kết nối db
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();

            // truy vấn 
            $sql = "SELECT * FROM category";
            $stmt = $conn->query($sql);

            $categories = [];
            while($row = $stmt->fetch()){
                $category = new Category();

                $category->setID($row['id']);
                $category->setName($row['name']);
                $category->setDescription($row['description']);
                $category->setNavigation($row['navigation']);

                $categories[] = $category;
             }

            // trả về kq
            return $categories;
        } catch (PDOException $e){
            return $categories=[];
        }
        
    }
}