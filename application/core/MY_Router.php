<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH."third_party/MX/Router.php";

class MY_Router extends MX_Router {
    function _set_request($seg = array()) {
        parent::_set_request(str_replace('-', '_', $seg));
    }
}