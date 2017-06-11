<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShieldfyDBProxy
{
    protected $db = null;
    protected $guard = null;

    public function __construct($db,$guard)
    {
        $this->db = $db;
        $this->guard = $guard;
    }
    public function __call($name, $parameters)
    {

        if(count($parameters) > 0){
            $query = new stdClass;        
            $query->sql = $parameters[0];
            $query->bindings = (isset($parameters[1]))? $parameters[1] : [];
            $this->guard->attachQuery($query);
        }
        
        
        return $this->db->{$name}(...$parameters);
    }
}

function ShieldfyCodeIgniterBridge()
{
    //autoload if not exists
    if(!class_exists(Shieldfy\Guard::class)){
        require_once(__DIR__.'/vendor/autoload.php');
    }
    
    //load configurations
    $config = require_once(__DIR__.'/config.php');

    //init guard
    $guard = \Shieldfy\Guard::init([
            'app_key'        => $config['app_key'],
            'app_secret'     => $config['app_secret'],
            'debug'          => $config['debug'],
            'action'         => $config['action'],
            'headers'        => $config['headers'],
            'disable'        => $config['disable'],
    ]);

    //attach database
    $CI =& get_instance();
    if(property_exists($CI,'db')){
        $db = $CI->db;
        $CI->db = new ShieldfyDBProxy($db,$guard);
    }
}
