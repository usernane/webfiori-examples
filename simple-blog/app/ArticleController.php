<?php

namespace webfiori\simpleBlog;

use webfiori\logic\Controller;
use webfiori\simpleBlog\ArticleQuery;
use webfiori\simpleBlog\Article;

/**
 * An auto-generated controller.
 */
class ArticleController extends Controller {
    /**
     * An instance of the class.
     * @var ArticleController
     */
    private static $instance;
    /**
     * Creates and returns an instance of the class.
     * This method will return a single instance of the class on every call.
     * @return ArticleController An instance of the class.
     */
    public static function get(){ 
        if (self::$instance === null) {
            self::$instance = new ArticleController();
        }
        return self::$instance;
    }
    public function __construct(){ 
        parent::__construct();
        $this->setQueryObject(new ArticleQuery());
        $this->setConnection('main');
    }
    /**
     * Adds new record to the database.
     * @param object $entity An object that holds record information.
     */
    public function add($entity){ 
        $this->getQueryObject()->add($entity);
        if ($this->excQ()) {
            return true;
        }
        return ArticleQuery::QUERY_ERR;
    }
    /**
     * Updates existing database record based on values taken from an object.
     * @param object $entity An object that holds record information.
     */
    public function update($entity){ 
        //TODO: Implement update record.
    }
    /**
     * Returns an array that contains a set of database records.
     * @param int $limit The number of records that will be fetched.
     * @param int $offset An offset starting from the first record of the table.
     * @return array Returns an array that contains all fetched records.
     */
    public function getData($limit = -1, $offset = -1){ 
        $returnValue = [];
        //TODO: Implement get records.
        return $returnValue;
    }
    /**
     * 
     * @param type $articleId
     * @return Article|null
     */
    public function getArticle($articleId) {
        $this->getQueryObject()->getArticle($articleId);
        if ($this->excQ()) {
            return $this->getRow();
        }
        return ArticleQuery::QUERY_ERR;
    }
    /**
     * Removes a record from the database.
     * @param object $entity An object that holds record information.
     */
    public function delete($entity){ 
        //TODO: Implement remove record.
    }
    /**
     * Returns the linked query object which is used to create MySQL quires.
     * @return ArticleQuery If the query object is set, the method will 
     * return an object of type 'ArticleQuery'. If not set, the method will return
     * null.
     */
    public function getQueryObject() {
        return parent::getQueryObject();
    }
}
