<?php
namespace webfiori\examples\simpleBlog;
use phMysql\MySQLQuery;
use phMysql\MySQLTable;
use phMysql\Column;
use webfiori\examples\simpleBlog\BlogPost;
/**
 * Description of BlogPostQuery
 *
 * @author Ibrahim
 */
class BlogPostQuery extends MySQLQuery{
    /**
     *
     * @var MySQLTable 
     */
    private $table;
    public function __construct() {
        parent::__construct();
        $this->table = new MySQLTable('posts');
        $this->table->addColumn('post-canonical', new Column('p_canonical', 'varchar', 500));
        $this->table->getCol('post-canonical')->setIsPrimary(true);
        $this->table->addColumn('post-title', new Column('p_title', 'varchar', 150));
        $this->table->addColumn('post-description', new Column('p_description', 'varchar', 250));
        $this->table->addColumn('post-body', new Column('p_body', 'varchar', 5000));
    }
    /**
     * 
     * @return MySQLTable
     */
    public function getStructure() {
        return $this->table;
    }
    /**
     * Constructs a query that can be used to get a blog post.
     * @param type $canonical
     */
    public function getPost($canonical) {
        $this->select([
            'where'=>[
                'post-canonical'=>$canonical
            ]
        ]);
    }
    /**
     * Constructs a query that can be used to get all posts.
     */
    public function getPosts() {
        $this->select();
    }
    /**
     * Constructs a query that can be used to add new blog post.
     * @param BlogPost $post
     */
    public function addPost($post) {
        if($post instanceof BlogPost){
            $this->insertRecord([
                'post-canonical'=>$post->getCanonical(),
                'post-title'=>$post->getTitle(),
                'post-description'=>$post->getDescription(),
                'post-body'=>$post->getBody()
            ]);
        }
    }
    /**
     * Constructs a query that can be used to update blog post.
     * @param BlogPost $post
     */
    public function updatePost($post) {
        if($post instanceof BlogPost){
            $this->updateRecord([
                'post-canonical'=>$post->getCanonical(),
                'post-title'=>$post->getTitle(),
                'post-description'=>$post->getDescription(),
                'post-body'=>$post->getBody()
            ],[
                'post-canonical'=>$post->getCanonical()
            ],['=']);
        }
    }
}
