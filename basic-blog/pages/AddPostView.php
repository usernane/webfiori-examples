<?php
use webfiori\entity\Page;
use phpStructs\html\Input;
use phpStructs\html\Label;
use phpStructs\html\HTMLNode;
use phpStructs\html\Br;
use webfiori\entity\router\Router;
/**
 * Description of AddPostView
 *
 * @author Ibrahim
 */
class AddPostView {
    public function __construct() {
        Page::title('New Blog Post');
        Page::description('A page for creating new blog posts.');
        Page::document()->getHeadNode()->setBase(Router::getBase());
        Page::document()->getHeadNode()->addJs(Router::getBase().'/system-files/post.js');
        
        $form = new HTMLNode('form');
        Page::document()->addChild($form);
        
        $canonicalLabel = new Label('Canonical URL:');
        $form->addChild($canonicalLabel);
        $form->addChild(new Br());
        $canonicalInput = new Input();
        $canonicalInput->setID('canonical-input');
        $form->addChild($canonicalInput);
        $form->addChild(new Br());
        
        $titleLabel = new Label('Post Title:');
        $form->addChild($titleLabel);
        $form->addChild(new Br());
        $titleInput = new Input();
        $titleInput->setID('title-input');
        $form->addChild($titleInput);
        $form->addChild(new Br());
        
        $descriptionLabel = new Label('Description:');
        $form->addChild($descriptionLabel);
        $form->addChild(new Br());
        $descInput = new Input('textarea');
        $descInput->setID('desc-input');
        $form->addChild($descInput);
        $form->addChild(new Br());
        
        $postBodyLabel = new Label('Post Body:');
        $form->addChild($postBodyLabel);
        $postBodyInput = new Input('textarea');
        $postBodyInput->setID('content-input');
        $form->addChild(new Br());
        $form->addChild($postBodyInput);
        $form->addChild(new Br());
        
        $addButton = new Input('submit');
        $addButton->setAttribute('onclick', 'addOrUpdatePost(this);return false;');
        $addButton->setAttribute('value', 'Add Post');
        $form->addChild($addButton);
        Page::render();
    }
}
new AddPostView();