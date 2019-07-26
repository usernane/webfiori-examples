<?php
namespace examples\webApis;
use webfiori\entity\ExtendedWebAPI;
use restEasy\APIAction;
use restEasy\RequestParameter;
use webfiori\entity\mail\EmailMessage;
/**
 * Description of SendAPI
 *
 * @author Ibrahim
 */
class SendEmailAPI extends ExtendedWebAPI{
    public function __construct() {
        parent::__construct();
        
        $a00 = new APIAction('send-email');
        $a00->addRequestMethod('post');
        $a00->addParameter(new RequestParameter('title', 'string'));
        $a00->addParameter(new RequestParameter('reciver-name', 'string'));
        $a00->addParameter(new RequestParameter('reciver-address', 'string'));
        $a00->addParameter(new RequestParameter('body', 'string'));
        $this->addAction($a00, true);
        
        //must be called at the end.
        $this->process();
    }

    public function isAuthorized() {
        return true;
    }

    public function processRequest() {
        $a = $this->getAction();
        if($a == 'send-email'){
            EmailMessage::createInstance('test-account');
            $inputs = $this->getInputs();
            EmailMessage::subject($inputs['title']);
            EmailMessage::addReciver($inputs['reciver-name'], $inputs['reciver-address']);
            EmailMessage::write($inputs['body']);
            EmailMessage::send();
            $this->sendResponse('Email Sent');
        }
    }
}
$service = new SendEmailAPI();
