

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site_security extends MX_Controller {

    function __construct() {
        parent::__construct();
    }
    
    function generate_random_string($length){
        $characters='23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ';
        $randomString='';
        for($i=0;$i<$length;$i++){
            $randomString=$characters[rand(0, strlen($characters)-1)];
        }
        return $randomString;
    }

    function test(){
        $name='Chameera';
        $hashed_name=  $this->_hash_string($name);
        echo "You are $name<br />";
        echo $hashed_name;
        
        echo '<hr>';
        $submitted_name='Chameera';
        $result=  $this->_verify_hash($submitted_name, $hashed_name);
        if($result==TRUE){
            echo 'Well done!';
        }else{
            echo 'Fail';
        }
    }
    
    function _hash_string($str){
        $hashed_string=  password_hash($str, PASSWORD_BCRYPT,array(
            'cost'=>11
        ));
        return $hashed_string;
    }
    
    
    function _verify_hash($plain_txt_str,$hashed_string){
        $result=  password_verify($plain_txt_str, $hashed_string);
        return $result;
    }
    
    function _make_sure_is_admin(){
        $is_admin=TRUE;
        if($is_admin!=TRUE){
            redirect('site_security/not_allowed');
        }
    }
    function  not_allowed(){
        echo 'You are not allowed to be here';
    }
}
