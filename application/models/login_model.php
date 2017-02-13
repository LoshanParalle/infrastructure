<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//This is my login model where i will write to 

class login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor, this just basically initiates itself... As far as i can tell.
          parent::__construct();
     }

     //get the username & password from users/staff
     function get_user($usr, $pwd)
     {
          $sql = "select * from opscomp.users where username = '" . $usr . "' and password = '" . $pwd . "'";
          $query = $this->db->query($sql);
          return $query->num_rows();
     }
}?>