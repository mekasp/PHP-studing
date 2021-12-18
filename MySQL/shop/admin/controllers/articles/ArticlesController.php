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

    public function EditArticlePage(){

        if (isset($_GET['article_id'])){

            $query = $this->db->query("SELECT * FROM article_description WHERE article_id = " . $_GET['article_id']);
            $article_description = $query['result']->fetch_all(MYSQLI_ASSOC);
        }

        $this->layout->render('articles/articles_edit.html',
            [
                'article_description' => $article_description
            ]
        );

    }

    public function EditArticle(){
        if ($_POST){

            foreach ($_POST['article_description'] as $language_id => $description){
                $query = $this->db->query("UPDATE article_description SET `title` = '" . $description['title'] ."' ,`description` = '" . $description['description'] . "' WHERE `article_id` = '" . $_POST['article_id'] . "' AND `language_id` = '" . $language_id . "';");
            }

        }

        if ($_FILES){
            $path = "images/articles/" . $_FILES['article_image']['name'];
            $loaded = move_uploaded_file($_FILES['article_image']['tmp_name'],"../" . $path);
            if ($loaded){
                $this->db->query("DELETE FROM article_images SET `article_id` = '" . $_POST['article_id'] . "';");
                $this->db->query("INSERT INTO article_images SET `article_id` ='" . $_POST['article_id'] . "', image_path ='" . $path . "';");
            }
        }

        header('Location: http://mysql.local/shop/admin/index.php?route=articles');

    }

    public function DeleteArticle(){
        if (isset($_GET['article_id'])){
            $this->db->query( "DELETE FROM article WHERE `id` = '" . $_GET['article_id'] ."';");
            $this->db->query("DELETE FROM article_description WHERE `article_id` = '" . $_GET['article_id'] ."';");
            $this->db->query("DELETE FROM article_images WHERE `article_id` = '" . $_GET['article_id'] . "';");
        }


        header('Location: http://mysql.local/shop/admin/index.php?route=articles');

    }
}