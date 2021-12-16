<?php

Class ArticlesController extends Controller {

    public function index(){
        if (isset($_GET['route']) && $_GET['route'] == 'articles'){
            $result = $this->db->query("SELECT a.id,ad.title FROM article a LEFT JOIN article_description ad ON a.id = ad.article_id WHERE ad.language_id = 2;");

            $articles = $result['result']->fetch_all(MYSQLI_ASSOC);
            $this->layout->render('articles/articles.html',
                [
                   'articles' => $articles
                ]
            );

        }
    }

    public function CreateArticlePage(){
        $result = $this->db->query("SELECT a.id,ad.title FROM article a LEFT JOIN article_description ad ON a.id = ad.article_id WHERE ad.language_id = 2;");

        $articles = $result['result']->fetch_all(MYSQLI_ASSOC);
        $this->layout->render('articles/articles_create.html',
            [
                'articles' => $articles
            ]
        );

    }

    public function CreateArticle(){

        $this->db->query('INSERT INTO article SET status = 1;');

        $query = $this->db->query("SELECT max(id) AS id FROM article");
        $result = $query['result']->fetch_assoc();
        $article_id = $result['id'];


        foreach ($_POST['article_description'] as $language_id => $description){
            $this->db->query("INSERT INTO article_description SET `article_id` ='" . $article_id . "',`language_id` = '" . $language_id . "', `title` = '" . $description['title'] . "', `description` = '" . $description['description'] . "';");
        }

        if ($_FILES){
            $path = "images/articles/" . $_FILES['article_image']['name'];
            $loaded = move_uploaded_file($_FILES['article_image']['tmp_name'],"../" . $path);
            if ($loaded){
                $this->db->query("INSERT INTO article_images SET `article_id` ='" . $article_id . "', image_path ='" . $path . "';");
            }
        }

        header("location: http://mysql.local/shop/admin/index.php?route=articles");
    }
}