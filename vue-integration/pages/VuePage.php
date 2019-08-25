<?php
namespace examples\views;
use webfiori\entity\Page;
use phpStructs\html\JsCode;
use phpStructs\html\HTMLNode;
/**
 * A sample page that uses Vue.js for displaying content.
 *
 * @author Ibrahim
 */
class VuePage {
    public function __construct() {
        Page::theme('Vue Theme');
        //Create a JavaScript code fragment to call the function
        // 'initApp()' to initialize Vue app.
        $onLoadJs = new JsCode();
        $onLoadJs->addCode('window.onload = function(){'
                . 'initApp();'
                . '};');
        Page::document()->getHeadNode()->addChild($onLoadJs);
        
        //Load JS file that contains the function 'initApp()'.
        //It is possible to include all JS files in the body of the 
        //method Theme::getHeadNode()
        Page::document()->getHeadNode()->addJs('themes/vue/js/hello-world.js');
        Page::document()->getHeadNode()->addJs('themes/vue/js/vue-component.js');
        
        //Get the body of the page to add content.
        $body = &Page::document()->getChildByID('main-content-area');
        $body->addTextNode('<p>{{ message }}</p>', false);
        
        //create new vue component
        $button = new HTMLNode('button-counter');
        $body->addChild($button);
        
        Page::render();
    }
}
new VuePage();
