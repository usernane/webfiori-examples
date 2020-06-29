<?php
namespace webfiori\simpleBlog;

use jsonx\JsonX;
use jsonx\JsonI;

/**
 * An auto-generated entity class which maps to a record in the
 * table 'articles'
 **/
class Article implements JsonI {
    /**
     * The attribute which is mapped to the column 'id'.
     * @var int
     **/
    private $id;
    /**
     * The attribute which is mapped to the column 'created_on'.
     * @var string
     **/
    private $createdOn;
    /**
     * The attribute which is mapped to the column 'last_updated'.
     * @var string|null
     **/
    private $lastUpdated;
    /**
     * The attribute which is mapped to the column 'title'.
     * @var string
     **/
    private $title;
    /**
     * The attribute which is mapped to the column 'description'.
     * @var string
     **/
    private $description;
    /**
     * The attribute which is mapped to the column 'body'.
     * @var string
     **/
    private $body;
    /**
     * Sets the value of the attribute 'id'.
     * The value of the attribute is mapped to the column which has
     * the name 'id'.
     * @param $id int The new value of the attribute.
     **/
    public function setId($id) {
        $this->id = $id;
    }
    /**
     * Returns the value of the attribute 'id'.
     * The value of the attribute is mapped to the column which has
     * the name 'id'.
     * @return int The value of the attribute.
     **/
    public function getId() {
        return $this->id;
    }
    /**
     * Sets the value of the attribute 'createdOn'.
     * The value of the attribute is mapped to the column which has
     * the name 'created_on'.
     * @param $createdOn string The new value of the attribute.
     **/
    public function setCreatedOn($createdOn) {
        $this->createdOn = $createdOn;
    }
    /**
     * Returns the value of the attribute 'createdOn'.
     * The value of the attribute is mapped to the column which has
     * the name 'created_on'.
     * @return string The value of the attribute.
     **/
    public function getCreatedOn() {
        return $this->createdOn;
    }
    /**
     * Sets the value of the attribute 'lastUpdated'.
     * The value of the attribute is mapped to the column which has
     * the name 'last_updated'.
     * @param $lastUpdated string|null The new value of the attribute.
     **/
    public function setLastUpdated($lastUpdated) {
        $this->lastUpdated = $lastUpdated;
    }
    /**
     * Returns the value of the attribute 'lastUpdated'.
     * The value of the attribute is mapped to the column which has
     * the name 'last_updated'.
     * @return string|null The value of the attribute.
     **/
    public function getLastUpdated() {
        return $this->lastUpdated;
    }
    /**
     * Sets the value of the attribute 'title'.
     * The value of the attribute is mapped to the column which has
     * the name 'title'.
     * @param $title string The new value of the attribute.
     **/
    public function setTitle($title) {
        $this->title = $title;
    }
    /**
     * Returns the value of the attribute 'title'.
     * The value of the attribute is mapped to the column which has
     * the name 'title'.
     * @return string The value of the attribute.
     **/
    public function getTitle() {
        return $this->title;
    }
    /**
     * Sets the value of the attribute 'description'.
     * The value of the attribute is mapped to the column which has
     * the name 'description'.
     * @param $description string The new value of the attribute.
     **/
    public function setDescription($description) {
        $this->description = $description;
    }
    /**
     * Returns the value of the attribute 'description'.
     * The value of the attribute is mapped to the column which has
     * the name 'description'.
     * @return string The value of the attribute.
     **/
    public function getDescription() {
        return $this->description;
    }
    /**
     * Sets the value of the attribute 'body'.
     * The value of the attribute is mapped to the column which has
     * the name 'body'.
     * @param $body string The new value of the attribute.
     **/
    public function setBody($body) {
        $this->body = $body;
    }
    /**
     * Returns the value of the attribute 'body'.
     * The value of the attribute is mapped to the column which has
     * the name 'body'.
     * @return string The value of the attribute.
     **/
    public function getBody() {
        return $this->body;
    }
    /**
     * Returns an object of type 'JsonX' that contains object information.
     * The returned object will have the following attributes:
     * <ul>
     * <li>id</li>
     * <li>createdOn</li>
     * <li>lastUpdated</li>
     * <li>title</li>
     * <li>description</li>
     * <li>body</li>
     * </ul>
     * @return JsonX An object of type 'JsonX'.
     */
    public function toJSON() {
        $jsonx = new JsonX([
            'id' => $this->getId(),
            'createdOn' => $this->getCreatedOn(),
            'lastUpdated' => $this->getLastUpdated(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'body' => $this->getBody()
        ]);
        return $jsonx;
    }
}
