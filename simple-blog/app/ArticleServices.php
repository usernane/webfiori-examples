<?php

namespace webfiori\simpleBlog;

use webfiori\entity\ExtendedWebServices;
use restEasy\WebService;
use webfiori\simpleBlog\ArticleController;

/**
 * A class that contains a set of web services.
 * This class contains the following web APIs:
 * <ul>
 * <li><b>add-article</b>: This service has the following parameters:
 * <ul>
 * <li><b>title</b>: Data type: string.
 * <li><b>description</b>: Data type: string.
 * <li><b>content</b>: Data type: string.
 * </ul>
 * </li>
 * </ul>
 */
class ArticleServices extends ExtendedWebServices {
    /**
     * Creates new instance of the class.
     */
    public function __construct(){
        parent::__construct('1.0.0');
        $this->addService(WebService::createService([
            'name' => 'add-article',
            'request-methods' => [
                'POST',
            ],
            'parameters' => [
                [
                    'name' => 'title',
                    'type' => 'string',
                ],
                [
                    'name' => 'description',
                    'type' => 'string',
                ],
                [
                    'name' => 'content',
                    'type' => 'string',
                ],
            ],
        ]), false);
    }
    /**
     * Checks if the client is authorized to call a service or not.
     * @return boolean If the client is authorized, the method will return true.
     */
    public function isAuthorized() {
        $calledServiceName = $this->getCalledServiceName();
        return false;
    }
    /**
     * Process the request.
     */
    public function processRequest() {
        $calledServiceName = $this->getCalledServiceName();
        if ($calledServiceName == 'add-article') {
            $article = new Article();
            $inputs = $this->getInputs();
            $article->setTitle($inputs['title']);
            $article->setDescription($inputs['description']);
            $article->setBody($inputs['content']);
            $result = ArticleController::get()->add($article);
            if ($result === true) {
                $this->sendResponse('Added.');
            } else {
                $dbErrDetails = ArticleController::get()->getDBErrDetails();
                $this->databaseErr($dbErrDetails['error-message']);
            }
        }
    }
}
return __NAMESPACE__;
