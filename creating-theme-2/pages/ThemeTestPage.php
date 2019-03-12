<?php
namespace examples\views;
use webfiori\entity\Page;
class ExamplePage{
    public function __construct() {
        //loading the theme using its name
        Page::theme('Custom Theme');
        //setting page title
        Page::title('Example Page');
        //setting the description of the page
        Page::description('An example page.');
        
        //create table using the theme
        $table1 = Page::theme()->createHTMLNode(array(
            'type'=>'table',
            'data'=>array(
                array('Fruit','Pet','City'),
                array('Orange','Dog','Dammam'),
                array('Apple','Cat','Al Ahsa'),
            )
        ));
        //add border to show the table
        $table1->setAttribute('border','1');
        Page::insert($table1);
        Page::render();
    }
}
//initialize the view
new ExamplePage();