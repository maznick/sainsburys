##Dependencies
* PHP7
* simple_html_dom
* phpunit version 5.6

##Execution
Run the root file index.php. This loads the bootstrap and executes the method getProductsJson of Parse class of the Model.
This class contains all the specific methods in order to return the json products response.
It has been used an Abstract class that gives some global methods and the abstract methods set() and get().

##Tests
There have been created some PHPUNIT tests.
All tests use the cached html files in order to be flexible when tester is on line or offline.
ProductsTest tests the whole flow from the Parser and it uses mock in order to get the simple_html_dom object from
the cached file.
All other tests set the cached simple_html_doc_object and test the get method.
In the home.html cached file I have replaced the products live urls with my local ones
(eg http://localhost/sainsburys/cache/sainsburys-apricot-ripe---ready-320g.html)
