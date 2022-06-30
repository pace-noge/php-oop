<?php

class HtmlElement
{
    private $attributes = [];
    private $tag;

    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function html($innerHTML = '')
    {
        $html = "<{$this->tag}";
        foreach ($this->attributes as $key => $value) {
            $html .= ' ' . $key . '="' . $value . '"';
        }
        $html .= '>';
        $html .= $innerHTML;
        $html .= "</$this->tag>";

        return $html;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }
    }
}

$div = new HtmlElement('div');
$div->id = 'page';
$div->class = 'light';

echo $div->html("Hello");


$article = new HtmlElement('article');

$article->id = "main";
$article->class = "light";

echo $article->html("this is new article");

echo $article->class;
echo $article->id;

?>