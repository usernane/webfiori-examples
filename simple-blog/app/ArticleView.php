<?php

namespace webfiori\simpleBlog;
use webfiori\simpleBlog\ArticleController;
use webfiori\entity\Page;
use webfiori\entity\router\Router;
use webfiori\simpleBlog\Article;
use phpStructs\html\HTMLNode;

class ArticleView {
    public function __construct() {
        $article = ArticleController::get()->getArticle(Router::getVarValue('article-id'));
        Page::theme('Vuetify Theme');
        if ($article instanceof Article) {
            Page::title($article->getTitle());
            Page::description($article->getDescription());
            $hNode = new HTMLNode('h1');
            Page::insert($hNode);
            $hNode->addTextNode($article->getTitle());
            Page::insert(HTMLNode::createTextNode($article->getBody(), false));
        } else {
            Page::insert(HTMLNode::createTextNode($article));
        }
        Page::render();
    }
}
return __NAMESPACE__;
