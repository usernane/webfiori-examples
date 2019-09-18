<?php
namespace webfiori\examples\simpleBlog;
use webfiori\entity\ExtendedWebAPI;
use jsonx\JsonX;
use phMysql\MySQLQuery;
use restEasy\APIAction;
use restEasy\RequestParameter;
use webfiori\examples\simpleBlog\BlogPostController;
use webfiori\examples\simpleBlog\BlogPost;
/**
 * Description of PostAPIs
 *
 * @author Ibrahim
 */
class PostAPIs extends ExtendedWebAPI{
    private $blogPostController;
    public function __construct() {
        parent::__construct();
        $this->blogPostController = new BlogPostController();
        $a00 = new APIAction('add-blog-post');
        $a00->addParameter(new RequestParameter('canonical'));
        $a00->addParameter(new RequestParameter('title'));
        $a00->addParameter(new RequestParameter('description'));
        $a00->addParameter(new RequestParameter('body'));
        $a00->addRequestMethod('post');
        $this->addAction($a00);
        
        $a01 = new APIAction('update-blog-post');
        $a01->addParameter(new RequestParameter('canonical'));
        $a01->addParameter(new RequestParameter('title'));
        $a01->addParameter(new RequestParameter('description'));
        $a01->addParameter(new RequestParameter('body'));
        $a01->addRequestMethod('post');
        $this->addAction($a01);
        
        $a02 = new APIAction('remove-blog-post');
        $a02->addParameter(new RequestParameter('canonical'));
        $a02->addRequestMethod('delete');
        $this->addAction($a02);
    }
    public function isAuthorized() {
        return true;
    }

    public function processRequest() {
        $action = $this->getAction();
        if($action == 'add-blog-post'){
            $this->addPost();
        }
        else if($action == 'update-blog-post'){
            $this->updatePost();
        }
        else if($action == 'remove-blog-post'){
            $this->removePost();
        }
    }
    private function addPost(){
        $inputs = $this->getInputs();
        $post = new BlogPost();
        $post->setCanonical($inputs['canonical']);
        $post->setTitle($inputs['title']);
        $post->setDescription($inputs['description']);
        $post->setBody($inputs['body']);
        $result = $this->blogPostController->addPost($post);
        if($result == MySQLQuery::QUERY_ERR){
            $errDetails = $this->blogPostController->getDBErrDetails();
            $j = new JsonX();
            $j->add('error-details', $errDetails);
            $this->send('application/json', $j);
        }
        else{
            $this->sendResponse('Blog Post Successfully Added.');
        }
    }
    private function updatePost(){
        $inputs = $this->getInputs();
        $post = new BlogPost();
        $post->setCanonical($inputs['canonical']);
        $post->setTitle($inputs['title']);
        $post->setDescription($inputs['description']);
        $post->setBody($inputs['body']);
        $result = $this->blogPostController->updatePost($post);
        if($result == MySQLQuery::QUERY_ERR){
            $errDetails = $this->blogPostController->getDBErrDetails();
            $j = new JsonX();
            $j->add('error-details', $errDetails);
            $this->send('application/json', $j);
        }
        else{
            $this->sendResponse('Blog Post Successfully Updated.');
        }
    }
    private function removePost(){
        
    }
}
