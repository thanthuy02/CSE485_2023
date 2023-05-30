<?php
require_once APP_ROOT . '/app/models/Article.php';

class ArticleService
{

    // lấy tất cả bài viết
    public function getAllArticle()
    {
        try {
            // kết nối db
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();

            // truy vấn 
            $sql = "SELECT a.id, a.title, a.summary, a.created, 
                    a.member_id, CONCAT(m.forename, ' ', m.surname) AS author,
                    a.image_id, i.file as image_file, 
                    a.category_id, c.name AS category
                    FROM article AS a
                    JOIN member AS m ON a.member_id = m.id
                    JOIN category AS c ON c.id = a.category_id
                    LEFT JOIN image AS i ON a.image_id = i.id
                    WHERE a.published = 1 ORDER BY created DESC";

            $stmt = $conn->query($sql);
            $articles = $stmt->fetchAll();

            // trả về kq
            return $articles;
        } catch (PDOException $e) {
            return $articles = [];
        }
    }

    // thêm mới 1 bài viết
    public function createArticle(Article $article)
    {
        try {
            // kết nối db
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();

            // truy vấn 
            $sql = "INSERT INTO article (title, summary, content, created, category_id, member_id, image_id, published) VALUES (?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $article->getTitle(), PDO::PARAM_STR);
            $stmt->bindValue(2, $article->getSummary(), PDO::PARAM_STR);
            $stmt->bindValue(3, $article->getContent(), PDO::PARAM_STR);
            $stmt->bindValue(4, $article->getCreated(), PDO::PARAM_STR);
            $stmt->bindValue(5, $article->getCategory_id(), PDO::PARAM_STR);
            $stmt->bindValue(6, $article->getMember_id(), PDO::PARAM_INT);
            $stmt->bindValue(7, $article->getImage_id(), PDO::PARAM_INT);
            $stmt->bindValue(8, $article->getPublished(), PDO::PARAM_INT);

            // trả về kq
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function showArticle($term)
    {
        try {
            // kết nối db
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();
            $articles = [];                                           // Set articles to empty array



            $sql = "SELECT a.id, a.title, a.summary, a.created, 
                    a.member_id, CONCAT(m.forename, ' ', m.surname) AS author,
                    a.image_id, i.file as image_file, 
                    a.category_id, c.name AS category
                    FROM article AS a
                    JOIN member AS m ON a.member_id = m.id
                    JOIN category AS c ON c.id = a.category_id
                    LEFT JOIN image AS i ON a.image_id = i.id
                    WHERE a.title LIKE '%" . $term . "%' ORDER BY created DESC";

            $stmt = $conn->query($sql);
            $articles = $stmt->fetchAll();

            // trả về kq
            return $articles;


            // Trả về kết quả
        } catch (PDOException $e) {
            return $articles = [];
        }
    }

    public function deleteArticle($id)
    {
        try {
            // Kết nối db và thực hiện truy vấn xóa
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();

            $sql = "DELETE FROM article WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            // Trả về kết quả của câu truy vấn
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}
