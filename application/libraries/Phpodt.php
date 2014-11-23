<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . "/phpodt-0.3.3/phpodt.php"; 
 
class Phpodt extends PHPODT { 
    public function __construct() { 
        parent::__construct(); 
    } 
}