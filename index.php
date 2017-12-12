<?php

include 'pdoUtils.php';
//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);

class Manage {
    public static function autoload($class) {
        //you can put any file name or directory here
        include $class . '.php';
    }
}


//instantiate the program object
$obj = new main();



/*============================================================

All utility functions/classes
==============================================================*/
abstract class page {
    protected $html;

    public function __construct()
    {
        $this->html .= '<html>';
        //$this->html .= '<link rel="stylesheet" href="styles.css">';
        $this->html .= '<body>';
    }
    public function __destruct()
    {
        $this->html .= '</body></html>';
        stringFunctions::printThis($this->html);
    }

    public function get() {
        echo 'default get message';
    }


    public function post() {
        //print_r($_POST);
    }
}



class homepage
{


    //Overwrite the constructor so that we can same the file name
    public function __construct()
    {
       // parent::__construct();

    }


    public function get()
    {

        
        header('Location: login.php');



    }

}



/*This class will be used to deliver csv file content
in table form*/
class htmlTable extends page
{

    private $table;

    public function __construct()
    {
        //call the parent constructor,so that html page will be intialize.
        parent::__construct();


    }





}

/*Class String Function
*/
class stringFunctions{

    //This fution will print HTML page
    public static function printThis($text){
        print($text);
    }

}






/*================================================================================
This is the main class which will handles the request
==================================================================================*/
class main {

    public function __construct()
    {
        //print_r($_REQUEST);
        //set default page request when no parameters are in URL
        $pageRequest = 'homepage';
        //check if there are parameters
        if(isset($_REQUEST['page'])) {
            //load the type of page the request wants into page request
            $pageRequest = $_REQUEST['page'];

        }
        //instantiate the class that is being requested
        $page = new $pageRequest();


        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $page->get();
        } else {
            //When form Submits the request, Object of the uploadform will be dynamically created
            //this object will call post method inside the uploadform class.
            $page->post();
        }

    }

}



?>
