<?php
namespace examples\views;
use webfiori\entity\Page;
use phpStructs\html\PNode;
class ExamplePage{
    public function __construct() {
        //loading the theme using its name
        Page::theme('Custom Theme');
        //setting page title
        Page::title('Example Page');
        //setting the description of the page
        Page::description('An example page.');
        
        //adding paragraph to main-content-area
        $p = new PNode();
        $p->addText('Main Content Area');
        Page::insert($p);
        
        //adding a paragraph to page-body
        $p2 = new PNode();
        $p2->addText('Page Body');
        Page::insert($p2,'page-body');
        
        Page::render();
    }
}
//initialize the view
new ExamplePage();