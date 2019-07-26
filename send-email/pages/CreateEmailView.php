<?php
/* 
 * The MIT License
 *
 * Copyright 2019 Ibrahim, WebFiori Framework.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace examples\views;
use webfiori\WebFiori;
use webfiori\entity\Page;
use phpStructs\html\Label;
use phpStructs\html\PNode;
use phpStructs\html\HTMLNode;
use phpStructs\html\Input;
use phpStructs\html\JsCode;
/**
 * An example that shows how to create a view for creating email messages.
 * It contains the following UI components:
 * <li>
 * 1- Message title input.
 * 2- The one who will get the message.
 * 3- The body of the message.
 * </li>
 */
class CreateEmailView{
    public function __construct() {
        //load UI template components (JS, CSS and others)
        //it is optional. to use a theme but recomended
        Page::theme('WebFiori Theme');
        Page::document()->getHeadNode()->addJs('res/send-email.js');
        Page::document()->getHeadNode()->addCSS('res/send-email.css');
        
        //set onload function of the document
        $jsCode = new JsCode();
        $jsCode->addCode(''
                . 'window.onload = function(){'
                . 'window.SendAPI = \'email-apis/send-email\';'
                . '}'
                . '');
        Page::document()->getHeadNode()->addChild($jsCode);
        
        $this->initLabels();
        
        //creating html form element and adding it to the body of the page.
        $form = new HTMLNode('form');
        Page::document()->getChildByID('main-content-area')->addChild($form);
        $translation = Page::translation();
        
        $titleLabel = new Label($translation->get('send-email/label/message-title'));
        $form->addChild($titleLabel);
        $titleInput = new Input('text');
        $titleInput->setID('title-input');
        $form->addChild($titleInput);
        
        $reciverLabel = new Label($translation->get('send-email/label/reciver-name'));
        $form->addChild($reciverLabel);
        $reciverInput = new Input('text');
        $reciverInput->setID('reciver-name-input');
        $form->addChild($reciverInput);
        
        $reciverAddrLabel = new Label($translation->get('send-email/label/reciver-address'));
        $form->addChild($reciverAddrLabel);
        $reciverAddrInput = new Input('text');
        $reciverAddrInput->setID('reciver-address-input');
        $form->addChild($reciverAddrInput);
        
        $contentLabel = new Label($translation->get('send-email/label/body'));
        $form->addChild($contentLabel);
        $contentInput = new Input('textarea');
        $contentInput->setID('message-content-input');
        $form->addChild($contentInput);
        
        $sendInput = new Input('submit');
        $sendInput->setID('send-button');
        $sendInput->setAttribute('onclick', 'return sendMessage()');
        $sendInput->setAttribute('value', $translation->get('send-email/action/send'));
        
        $statusLabel = new PNode();
        $statusLabel->setID('status-label');
        $form->addChild($statusLabel);
        
        $form->addChild($sendInput);
        
        Page::render();
    }
    /**
     * Initialize page labels based on language.
     */
    function initLabels(){
        $lang = WebFiori::getWebsiteFunctions()->getSessionLang();
        Page::lang($lang);
        $trans = Page::translation();
        if($lang == 'AR'){
            $trans->createAndSet('send-email/label', [
                'message-title'=>'عنوان الرسالة:',
                'reciver-name'=>'إسم المُستلم:',
                'reciver-address'=>'البريد الإلكتروني:',
                'body'=>'محتوى الرسالة'
            ]);
            $trans->createAndSet('send-email/action', [
                'send'=>'إرسال'
            ]);
        }
        else{
            $trans->createAndSet('send-email/label', [
                'message-title'=>'Message Title:',
                'reciver-name'=>'Reciver Name:',
                'reciver-address'=>'Reciver Email Address:',
                'body'=>'Message Content:'
            ]);
            $trans->createAndSet('send-email/action', [
                'send'=>'Send Message'
            ]);
        }
    }
}
new CreateEmailView();