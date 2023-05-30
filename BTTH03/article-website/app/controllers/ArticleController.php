<?php
require_once APP_ROOT.'/app/services/ArticleService.php';
require_once APP_ROOT.'/app/services/MemberService.php';
require_once APP_ROOT.'/app/services/CategoryService.php';

class ArticleController {

    public function index(){
        // lấy dl các bài viết từ ArticleService
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticle();

        // hiển thị lên trang index.php trong views/article 
        include APP_ROOT.'/app/views/article/index.php';
    }

    public function create(){
        // lấy dữ liệu từ MemberService và CategoryService để đổ vào form tạo bài viết
        $memberService = new MemberService();
        $members = $memberService->getAllMember();

        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategory();

        // hiển thị trong trang create.php
        include APP_ROOT.'/app/views/article/create.php';

    }

    public function store(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // lấy các gtri từ form create bằng phương thức post
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $created = date('Y-m-d H:i:s');
            $category_id = $_POST['category_id'];
            $member_id = $_POST['member_id'];

            // lấy được tên ảnh rồi thêm vào bảng image trong csdl
            $file = isset($_FILES['file']) ? $_FILES['file'] : null;
            $published = $_POST['published'];

            // tạo đối tg bài viết mới
            $article = new Article();
            $article->setTitle($title);
            $article->setSummary($summary);
            $article->setContent($content);
            $article->setCreated($created);
            $article->setCategory_id($category_id);
            $article->setMember_id($member_id);
            $article->setImage_id($file);
            $article->setPublished($published);

            $articleService = new ArticleService();
            $articleService->createArticle($article);
        }

        $articles = $articleService->getAllArticle();
        include APP_ROOT.'/app/views/article/index.php';
    }

    public function show()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $term = $_POST['term'];

            $articleService = new ArticleService();
            $articles = $articleService->showArticle($term);
    
            // Truyền kết quả cho view
            extract(compact('term', 'articles'));
        }
    
        include APP_ROOT . '/app/views/article/show.php';
    }
    public function delete() {
        // Lấy ID bài viết từ tham số truyền vào
        $id = $_GET['id'];

        // Gọi phương thức xóa bài viết từ service
        $articleService = new ArticleService();
        $result = $articleService->deleteArticle($id);

        // Kiểm tra kết quả xóa và thực hiện chuyển hướng hoặc thông báo lỗi
        if ($result) {
            // Nếu xóa thành công, chuyển hướng đến trang danh sách bài viết
            header('Location: /CSE485_2023/BTTH03/article-website/public/index.php');
        } else {
            // Nếu xóa thất bại, hiển thị thông báo lỗi
            echo "Failed to delete the article.";
        }
    }
    
}