<?php
namespace webfiori\examples\views;
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;
/**
 * This is a very simple example which shows how to use the class 'Page' 
 * in building the DOM of a web page.
 * It is always a good practice to put your code inside classes. Also, 
 * it is good practice to add the suffix 'View' to your view class name.
 * @author Ibrahim
 */
class BasicView {
    public function __construct() {
        //Set The title of the page
        Page::title('Hello World Page');
        //Set page description
        Page::description('This is a test page.');
        //Set website name
        Page::siteName('Code Samples Website');
        
        //Add nodes to diffrent page sections
        Page::insert(HTMLNode::createTextNode('This is header section of the page.'), 'page-header');
        Page::insert(HTMLNode::createTextNode('This is main area of the page.'), 'main-content-area');
        Page::insert(HTMLNode::createTextNode('This is footer section of the page.'), 'page-footer');
        
        //Rendrer the view
        Page::render();
    }
}
//Create an instance of the class
new BasicView();