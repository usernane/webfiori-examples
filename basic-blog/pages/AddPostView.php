<?php
use webfiori\entity\Page;
use phpStructs\html\Input;
use phpStructs\html\Label;
use phpStructs\html\HTMLNode;
/**
 * Description of AddPostView
 *
 * @author Ibrahim
 */
class AddPostView {
    public function __construct() {
        Page::title('New Blog Post');
        Page::description('A page for creating new blog posts.');
        $form = new HTMLNode('form');
        Page::document()->addChild($form);
        $canonicalLabel = new Label('Canonical URL:');
        $form->addChild($canonicalLabel);
        $canonicalInput = new Input();
        $form->addChild($canonicalInput);
        
        $titleLabel = new Label('Post Title:');
        $form->addChild($titleLabel);
        $titleInput = new Input();
        $form->addChild($titleInput);
        
        $descriptionLabel = new Label('Description:');
        $form->addChild($descriptionLabel);
        $descInput = new Input('textarea');
        $form->addChild($descInput);
        
        $postBodyLabel = new Label('Post Body:');
        $form->addChild($postBodyLabel);
        $postBodyInput = new Input('textarea');
        $form->addChild($postBodyInput);
        Page::render();
    }
}
new AddPostView();