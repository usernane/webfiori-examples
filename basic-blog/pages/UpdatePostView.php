<?php
use webfiori\WebFiori;
use webfiori\entity\Page;
use phpStructs\html\Input;
use phpStructs\html\Label;
use webfiori\examples\simpleBlog\BlogPostController;
use webfiori\examples\simpleBlog\BlogPost;
/**
 * Description of UpdatePostView
 *
 * @author Ibrahim
 */
class UpdatePostView {
    public function __construct() {
        $postCanonical = $_GET['post-canonical'];
        $blogPostController = new BlogPostController();
        $blogPost = $blogPostController->getPost($postCanonical);
        if($blogPost instanceof BlogPost){
            Page::title('Update Blog Post');
            Page::description('A page for updating blog posts.');
            Page::document()->getHeadNode()->setBase(Router::getBase());
            Page::document()->getHeadNode()->addJs(Router::getBase().'/system-files/post.js');

            $form = new HTMLNode('form');
            Page::document()->addChild($form);

            $canonicalLabel = new Label('Canonical URL:');
            $form->addChild($canonicalLabel);
            $form->addChild(new Br());
            $canonicalInput = new Input();
            $canonicalInput->setID('canonical-input');
            $canonicalInput->setValue($blogPost->getCanonical());
            $canonicalInput->setAttribute('disabled', '');
            $form->addChild($canonicalInput);
            $form->addChild(new Br());

            $titleLabel = new Label('Post Title:');
            $form->addChild($titleLabel);
            $form->addChild(new Br());
            $titleInput = new Input();
            $titleInput->setID('title-input');
            $titleInput->setValue($blogPost->getTitle());
            $form->addChild($titleInput);
            $form->addChild(new Br());

            $descriptionLabel = new Label('Description:');
            $form->addChild($descriptionLabel);
            $form->addChild(new Br());
            $descInput = new Input('textarea');
            $descInput->setID('desc-input');
            $descInput->setValue($blogPost->getDescription());
            $form->addChild($descInput);
            $form->addChild(new Br());

            $postBodyLabel = new Label('Post Body:');
            $form->addChild($postBodyLabel);
            $postBodyInput = new Input('textarea');
            $postBodyInput->setID('content-input');
            $postBodyInput->setValue($blogPost->getBody());
            $form->addChild(new Br());
            $form->addChild($postBodyInput);
            $form->addChild(new Br());

            $addButton = new Input('submit');
            $addButton->setAttribute('onclick', 'addOrUpdatePost(this,true);return false;');
            $addButton->setAttribute('value', 'Update Post');
            $form->addChild($addButton);
            Page::render();
        }
        else{
            header('location: '.WebFiori::getSiteConfig()->getBaseURL());
        }
    }
}
new UpdatePostView();