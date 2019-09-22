<?php
/**
 * This sample code shows how to create a very basic login form using the very 
 * basic elements that a view should consist of. 
 * 
 * The route to this view can be found inside the file 
 * "/entity/router/ViewRoutes.php". 
 * Navigate to "{server-base}/views-examples/example-1" to display the result.
 * 
 * Note: This example is not good one to use in real world code. 
 * It is not recommended to use procedural PHP in creating views. It is 
 * always a good practice to wrap your code inside a class within a 
 * namespace. In addition, its better to use the class "Page" to create 
 * views.
 */

//First, import all classes which will be used to build the view.
use phpStructs\html\HTMLDoc;
use phpStructs\html\HTMLNode;
use phpStructs\html\Input;
use phpStructs\html\Label;
use phpStructs\html\Br;

//Create new instance of "HTMLDoc".
$doc = new HTMLDoc();

//Create new HTML form node.
$form = new HTMLNode('form');

//Add the form to the body of the document.
$doc->addChild($form);

//Create input elements.
$usernameLbl = new Label('Username:');
$usernameInput = new Input('text');
$passwordLbl = new Label('Password:');
$passwordInput = new Input('password');
$submit = new Input('submit');
$submit->setAttribute('onclick', 'alert(\'Form Submit\');return false;');

//Add input elements to the form.
$form->addChild($usernameLbl);
$form->addChild(new Br());
$form->addChild($usernameInput);
$form->addChild(new Br());
$form->addChild($passwordLbl);
$form->addChild(new Br());
$form->addChild($passwordInput);
$form->addChild(new Br());
$form->addChild($submit);

//display the view.
echo $doc;
