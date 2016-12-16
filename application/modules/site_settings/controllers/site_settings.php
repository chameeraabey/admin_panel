

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site_settings extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function _get_item_segments() {
        //Return the segments for the store_item pages
        $segments = "cloth/classic/";
        return $segments;
    }

    function _get_items_segments() {
        //Return the segments for the category pages
        $segments = "cloth/classics/";
        return $segments;
    }
    
    function _get_page_not_found_msg(){
        $msg="<h1>It's a webpage Jim but not as we know it!</h1>";
        $msg.="<p>Please,check your vibe and try again!</p>";
        return $msg;
    }

}
