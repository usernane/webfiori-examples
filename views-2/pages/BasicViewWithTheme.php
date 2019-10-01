<?php
namespace webfiori\examples\views;
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;
/**
 * The code in this file is the same as the code in the file 
 * 'BasicPage.php'. The only difference is that it uses a theme to 
 * make the UI looks good. 
 *
 * @author Ibrahim
 */
class BasicViewWithTheme {
    public function __construct() {
        
        //Themes must be loaded before doing anything to the DOM of the page
        //as the theme might override some elements of the page.
        //To load a theme, we have to supply the name of the theme to the 
        //method 'Page::theme()'
        Page::theme('WebFiori Theme');
        
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
new BasicViewWithTheme();