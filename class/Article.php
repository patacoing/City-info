<?php


class Article
{
    private $title;
    private $content;
    private $link;

    public function __construct($title, $content,$link){
        $this->title = $title;
        $this->content = $content;
        $this->link = $link;
    }

    public function showArticle(){
        $html = '<div class="article">';
            $html .= "\n\t".'<a href="' . $this->link.'">'.$this->title.'</a>';
            $html .= "\n\t".'<p>'.$this->content.'</p>';
        $html .= '</div>';
        return $html;
    }
}