<?php

class Article {
    public $title;
    public $text;
    public function view()
    {
        echo $this->title;
    }
}

$a = new Article;
$a->title = 'TITLE news';
$a->view();

$b = new Article;
$b->title = 'Another one';
$b->view();
?>