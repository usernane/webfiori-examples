<?php

namespace webfiori\simpleBlog;
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;
use phpStructs\html\Br;
use phpStructs\html\Label;

class AddArticleView {
    public function __construct() {
        Page::theme('WebFiori V108');
        Page::title('Add New Article');
        $form = new HTMLNode('form');
        Page::insert($form);
        $form->setAttributes([
            'method' => 'post',
            'action' => 'ArticleAPIs/add-article'
        ]);
        $form->addChild(new Label('Article Title:'))
                ->addChild(new Br())
                ->addChild(new HTMLNode('input'))
                ->addChild(new Br())
                ->addChild(new Label('Search Description:'))
                ->addChild(new Br())
                ->addChild(new HTMLNode('textarea'))
                ->addChild(new Br())
                ->addChild(new Label('Article Content:'))
                ->addChild(new Br())
                ->addChild(new HTMLNode('textarea'))
                ->addChild(new Br())
                ->addChild(new HTMLNode('input'));
        $form->getChild(2)->setAttributes([
            'name' => 'title',
            'type' => 'text'
        ]);
        $form->getChild(6)->setAttribute('name', 'description');
        $form->getChild(10)->setAttribute('name', 'content');
        $form->getChild(12)->setAttributes([
            'value' => 'Create Article',
            'type' => 'submit'
        ]);
        Page::render();
    }
}
return __NAMESPACE__;