<?php
/**
 * A basic example which is used to show how variables in URIs can be used in your 
 * web page.
 */
namespace webfiori\examples\views;
use webfiori\entity\router\Router;
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;

class ColorsView {
    public function __construct() {
        Page::title('Change My Color');
        Page::siteName('Colors Website');
        
        $red = Router::getVarValue('red');
        $blue = Router::getVarValue('blue');
        $green = Router::getVarValue('green');
        $errStr = '';
        if($red < 0 || $red > 255){
            $errStr .= 'Red has invalid value: '.$red.'<br/>';
        }
        if($blue < 0 || $blue > 255){
            $errStr .= 'Blue has invalid value: '.$red.'<br/>';
        }
        if($green < 0 || $green > 255){
            $errStr .= 'Green has invalid value: '.$red.'<br/>';
        }
        if(strlen($errStr) == 0){
            Page::document()->getBody()->setStyle([
                'background-color'=>'rgb('.$red.','.$green.','.$blue.')'
            ]);
            Page::insert(HTMLNode::createTextNode('Red: '.$red.' Blue: '.$blue.' Green '.$green));
        }
        else{
            Page::insert(HTMLNode::createTextNode($errStr, false));
        }
        Page::render();
    }
}
return __NAMESPACE__;