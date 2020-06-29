<?php

namespace webfiori\simpleBlog;

use phMysql\MySQLQuery;
use webfiori\simpleBlog\Article;

/**
 * A query class which represents the database table 'articles'.
 * The table which is associated with this class will have the following columns:
 * <ul>
 * <li><b>id</b>: Name in database: 'id'. Data type: 'int'.</li>
 * <li><b>created-on</b>: Name in database: 'created_on'. Data type: 'timestamp'.</li>
 * <li><b>last-updated</b>: Name in database: 'last_updated'. Data type: 'datetime'.</li>
 * <li><b>title</b>: Name in database: 'title'. Data type: 'varchar'.</li>
 * <li><b>description</b>: Name in database: 'description'. Data type: 'varchar'.</li>
 * <li><b>body</b>: Name in database: 'body'. Data type: 'mediumtext'.</li>
 * </ul>
 */
class ArticleQuery extends MySQLQuery {
    /**
     * Creates new instance of the class.
     */
    public function __construct(){
        parent::__construct('articles');
        $this->getTable()->setComment('This table will store all published articles.');
        $this->getTable()->addDefaultCols([
            'id' => [],
            'created-on' => [],
            'last-updated' => [],
        ]);
        $this->getTable()->addColumns([
            'title' => [
                'type' => 'varchar',
                'size' => '150',
                'is-unique' => true,
                'comment' => 'The title of the article. Each article must have a unique title.',
            ],
            'description' => [
                'type' => 'varchar',
                'size' => '500',
                'comment' => 'Search description of the article.',
            ],
            'body' => [
                'type' => 'mediumtext',
                'comment' => 'The content of the article.',
            ],
        ]);
    }
    /**
     * Constructs a query that can be used to add new record to the table.
     * @param Article $entity An instance of the class "Article" that contains record information.
     */
    public function add($entity) {
        $this->insertRecord([
            'title' => $entity->getTitle(),
            'description' => $entity->getDescription(),
            'body' => $entity->getBody(),
        ]);
    }
    /**
     * Constructs a query that can be used to update a record.
     * @param Article $entity An instance of the class "Article" that contains record information.
     */
    public function update($entity) {
        $this->updateRecord([
            'created-on' => $entity->getCreatedOn(),
            'last-updated' => $entity->getLastUpdated(),
            'title' => $entity->getTitle(),
            'description' => $entity->getDescription(),
            'body' => $entity->getBody(),
        ], [
            'id' => $entity->getId(),
        ]);
    }
    /**
     * Constructs a query that can be used to remove a record.
     * @param Article $entity An instance of the class "Article" that contains record information.
     */
    public function delete($entity) {
        $this->deleteRecord([
            'id' => $entity->getId(),
        ]);
    }
    /**
     * Constructs a query that can be used to get an article given its ID.
     * @param int $articleId The ID of the article.
     */
    public function getArticle($articleId) {
        $this->select([
            'where' => [
                'id' => $articleId
            ],
            'map-result-to' => 'webfiori\simpleBlog\Article',
        ]);
    }
    /**
     * Constructs a query that can be used to select all records from the table.
     * @param int $limit The number of records that will be selected. Default is -1
     * @param int $offset The number of records that will be skipped from the first row. Default is -1.
     */
    public function selectAll($limit = -1, $offset = -1) {
        $this->select([
            'limit' => $limit,
            'offset' => $offset,
            'map-result-to' => 'webfiori\simpleBlog\Article',
        ]);
    }
}
