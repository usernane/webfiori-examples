A basic example which is used to show how variables in URIs can be used in your web page.

In order to pass a variable in a URI, it must be enclosed between braces '{}' when 
creating the route. The method Router::getVarValue() can be used to get the value 
of that variable inside the class that represents the view.

In this example, we created a view which changes its background color based on the 
passed values in the URI. The code for the view can be found in the class 'ColorsView.php'.
The route to this view can be found inside the class 'ViewRoutes.php'.