<?php

class ArticlesController extends Controller {
    public function index(){
        $result = $this->db->query("SELECT a.id,ad.title,ad.description,ai.image_path FROM article a LEFT JOIN article_description ad ON a.id = ad.article_id LEFT JOIN article_images ai ON a.id = ai.article_id WHERE ad.language_id = 2;");

        $articles = $result['result']->fetch_all(MYSQLI_ASSOC);

        $this->layout->render('catalog/articles.html',
            [
                'articles' => $articles
            ]
        );

    }

    public function getArticle() {

        $result = $this->db->query("SELECT a.id,ad.title,ad.description,ai.image_path FROM article a LEFT JOIN article_description ad ON a.id = ad.article_id LEFT JOIN article_images ai ON a.id = ai.article_id WHERE a.id = '" . $_GET['article_id'] . "' AND ad.language_id = 2;");
        $article = $result['result']->fetch_assoc();
        $this->layout->render('catalog/article.html',
            [
                'article' => $article
            ]
        );
    }
}