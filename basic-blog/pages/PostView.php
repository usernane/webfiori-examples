<?php
use webfiori\entity\Page;
use webfiori\examples\simpleBlog\BlogPostController;
use webfiori\examples\simpleBlog\BlogPost;
/**
 * Description of PostView
 *
 * @author Ibrahim
 */
class PostView {
    public function __construct() {
        $postCanonical = $_GET['canonical'];
        echo $postCanonical;
        $postController = new BlogPostController();
        $blogPost = $postController->getPost($postCanonical);
        if($blogPost instanceof BlogPost){
            
        }
        else{
            http_response_code(404);
            echo 'Blog post Not found.';
        }
    }
}
new PostView();