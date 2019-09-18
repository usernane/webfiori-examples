<?php
namespace webfiori\examples\simpleBlog;

/**
 * Description of BlogPost
 *
 * @author Ibrahim
 */
class BlogPost {
    private $canonical;
    private $title;
    private $desc;
    private $body;
    public function getCanonical() {
        return $this->canonical;
    }
    public function setCanonical($canonical) {
        $this->canonical = $canonical;
    }
    public function getDescription() {
        return $this->desc;
    }
    public function setDescription($desc) {
        $this->desc = $desc;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getBody() {
        return $this->body;
    }
    public function setBody($body) {
        $this->body = $body;
    }
}
