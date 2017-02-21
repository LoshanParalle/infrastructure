
<?php
/*This line prevents anyone from accessing stuff via the URL and directly accessing the model, library, whatever. It's a security measure.*/
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends CI_Controller {
 
function __construct()
{
        parent::__construct();
 
$this->load->database();
 
}
 
public function index()
{
echo "<h1>I am connected!!!!!!</h1>";
//Just an example to ensure that we get into the function
die();
}
}
 
/* End of file Main.php */
/* Location: ./application/controllers/Main.php */
 