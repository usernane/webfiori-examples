<?php
namespace webfiori\examples\simpleBlog;
use webfiori\functions\Functions;
use webfiori\examples\simpleBlog\BlogPost;
use webfiori\examples\simpleBlog\BlogPostQuery;
use webfiori\conf\Config;
use webfiori\functions\SystemFunctions;
/**
 * Description of BlogPostController
 *
 * @author Ibrahim
 */
class BlogPostController extends Functions{
    public function __construct() {
        parent::__construct();
        $query = new BlogPostQuery();
        $this->setQueryObject($query);
    }
    /**
     * Adds new blog post.
     * @param BlogPost $post The post that will be added.
     * @return boolean|string If the post was added, the method will return true. 
     * If a database error happens, the method will return MySQLQuery::QUERY_ERR. 
     * Other than that, the method will return false.
     */
    public function addPost($post) {
        if($post instanceof BlogPost){
            $this->getQueryObject()->addPost($post);
            if($this->excQ()){
                return true;
            }
            return BlogPostQuery::QUERY_ERR;
        }
        return false;
    }
    /**
     * Updates an existing blog post.
     * @param BlogPost $post The post that will be updated.
     * @return boolean|string If the post was updated, the method will return true. 
     * If a database error happens, the method will return MySQLQuery::QUERY_ERR. 
     * Other than that, the method will return false.
     */
    public function updatePost($post) {
        if($post instanceof BlogPost){
            $this->getQueryObject()->updatePost($post);
            if($this->excQ()){
                return true;
            }
            return BlogPostQuery::QUERY_ERR;
        }
        return false;
    }
    /**
     * Returns a post given its canonical URL.
     * @param string $canonical The canonical URL of the page.
     * @return boolean|BlogPost If a blog post which has the given canonical 
     * URL was found, the method will return an object of type 'BlogPost' 
     * that represent it. Other than that, the method will return false.
     */
    public function getPost($canonical) {
        $this->getQueryObject()->getPost($canonical);
        if($this->excQ()){
            if($this->rows() == 1){
                return $this->_createBlogPostObj($this->getRow());
            }
        }
        return false;
    }
    /**
     * Returns an array that contains all canonical URLs.
     * @return array|string If the data is fetched, the method will return 
     * an array. If a database error happens, the method will return MySQLQuery::QUERY_ERR. 
     */
    public function getCanonicalURls() {
        $this->getQueryObject()->getPosts();
        if($this->excQ()){
            $retVal = [];
            while ($row = $this->nextRow()){
                $retVal[] = $row[$this->getQueryObject()->getColName('post-canonical')];
            }
            return $retVal;
        }
        return BlogPostQuery::QUERY_ERR;
    }
    /**
     * 
     * @param array $row
     * @return BlogPost
     */
    private function _createBlogPostObj($row) {
        $post = new BlogPost();
        $post->setTitle($row[$this->getQueryObject()->getColName('post-title')]);
        $post->setDescription($row[$this->getQueryObject()->getColName('post-description')]);
        $post->setCanonical($row[$this->getQueryObject()->getColName('post-canonical')]);
        $post->setBody($row[$this->getQueryObject()->getColName('post-body')]);
        return $post;
    }
    /**
     * Returns an array of all created posts.
     * @return array|string If all posts has been fetched, the method will 
     * return an array that contains all posts as objects of type 'BlogPost'. 
     * If query error happens, the method will return MySQLQuery::QUERY_ERR
     */
    public function getPosts() {
        $this->getQueryObject()->getPosts();
        if($this->excQ()){
            $retVal = [];
            while ($row = $this->nextRow()){
                $retVal[] = $this->_createBlogPostObj($row);
            }
            return $retVal;
        }
        return BlogPostQuery::QUERY_ERR;
    }
    /**
     * This method is used to create the table that will contain blog posts.
     * @return boolean|string If the table was created, the method will return 
     * true. If a database error happens while creating the table, the 
     * method will return MySQLQuery::QUERY_ERR. If the table was just created, 
     * the execution of the program will stop inside the method. Then the 
     * user must refresh the page to access the system.
     */
    public function firstRun() {
        if(Config::isConfig() === false){
            $this->getQueryObject()->createStructure();
            if($this->excQ()){
                SystemFunctions::get()->configured(true);
                die();
            }
            return BlogPostQuery::QUERY_ERR;
        }
        return true;
    }
}
