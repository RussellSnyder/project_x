# Project X

## start

Use the built-in webserver of php to serve the projet's website.
If you don't have php already installed try [php.net](http://php.net/downloads.php) or the [XAMPP project](https://www.apachefriends.org/de/index.html).

Start the webserver:
````
$ php -S localhost:8080 index.php
````

visit http://localhost:8080/list.html in your browser

## assignment

### specific assignment

On every task keep in mind that the most important features are correctness and security. 
Your solution should not expose any security holes and every input a user does shall be sanitized.

* Add the order sum to the order list
-added as a footer on list page

* Add a `details` button to the order list which links to a detail page showing all order positions
* Add the possibility to add more order positions on the order detail page
* Make the list and the positions page look beautiful
* Make sure that when calling the '/' route the list is shown
* Do you have some ideas on how clientside scripting (JavaScript) could be incorporated to improve the user's experience?
 
#### advanced specific assignment

* If the list has more than X entries it gets somewhat confusing, add the possibility to page through the list.
* Add the possibility to specify a sorting order in the orders list

### general assignment

* Enhance the project X Framework so that plain strings can be returned by a arbitrary route
* Enhance the project X Framework to also accept htm files as routing directives
* Enhance the project X Framework to be able to show only the route's content without a base template