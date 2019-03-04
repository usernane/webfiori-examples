<?php
//import needed classes
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;

//set the title of the page
Page::title('Welcome to My WebSite');
//set the name of the website
Page::siteName('My Personal Blog');

//add text node to the body of the page
$textNode = HTMLNode::createTextNode('Welcome. This is my home page.');
Page::insert($textNode);

//display the view
Page::render();