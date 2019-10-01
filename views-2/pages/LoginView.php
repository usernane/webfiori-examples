<?php
namespace webfiori\examples\views;
use webfiori\entity\Page;
use phpStructs\html\HTMLNode;
use phpStructs\html\Label;
use phpStructs\html\Br;
use phpStructs\html\Input;
/**
 * This is the same version as the one which exist in the example 'views-1'. 
 * The difference is that this one is using OOP approach and it uses a theme 
 * in addition to the class 'Page'.
 *
 * @author Ibrahim
 */
class LoginView {
    public function __construct() {
        //Themes must be loaded before doing anything to the DOM of the page
        //as the theme might override some elements of the page.
        //To load a theme, we have to supply the name of the theme to the 
        //method 'Page::theme()'
        Page::theme('WebFiori Theme');
        
        //Set The title of the page
        Page::title('Login');
        //Set page description
        Page::description('Login to the system to enjoy its features.');
        //Set website name
        Page::siteName('My System');
        
        //Create new HTML form node.
        $form = new HTMLNode('form');

        //Add the form to the element with ID = 'main-content-area'.
        Page::insert($form);

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
        
        //Rendrer the view
        Page::render();
    }
}
new LoginView();