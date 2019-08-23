<?php
namespace examples\views;
use webfiori\entity\Page;
use phpStructs\html\JsCode;
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
        Page::document()->getHeadNode()->addJs('themes/vue/js/hello-world.js');
        
        //Get the body of the page to add content.
        $body = &Page::document()->getChildByID('main-content-area');
        $body->addTextNode('<p>{{ message }}</p>', false);
        Page::render();
    }
}
new VuePage();
