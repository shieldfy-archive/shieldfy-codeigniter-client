<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return [

    /*
    |--------------------------------------------------------------------------
    | Shieldfy Configurations
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials and configurations for Shieldfy.
    | You can get your credentials from https://shieldfy.io.
    | Please refere to the documentations on https://shieldfy.io for further info.
    |
    */

    /*
     |--------------------------------------------------------------------------
     | Main App Credentials
     |--------------------------------------------------------------------------
     */
    'app_key'    => '',
    'app_secret' => '',
    /*
     |--------------------------------------------------------------------------
     | Shieldfy debug whether or not expose debug and errors ( True , False )
     |--------------------------------------------------------------------------
     */
    'debug' => false,

    /*
     |--------------------------------------------------------------------------
     | Shieldfy default action for detecting threat ( block , listen )
     |--------------------------------------------------------------------------
     */
    'action' => 'block',

    /*
     |--------------------------------------------------------------------------
     | List of headers exposed to shieldfy to overwrite
     | format
     | key => value
     | example
     | ['X-Frame-Options'=>'DENY']
     | you can specify false to disable the header
     | example
     | ['X-Frame-Options'=>false]
     |--------------------------------------------------------------------------
     */
    'headers' => [],

    /*
     |--------------------------------------------------------------------------
     | list of monitors you want to disable
     |--------------------------------------------------------------------------
     */
    'disable' => []

];
