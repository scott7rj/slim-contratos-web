<?php
namespace app\controller;

use GuzzleHttp\Client;
//require_once __DIR__."../../env.php";

abstract class AppController {
	protected $client;
    public function __construct() {
    	$this->client = new Client([
		    'base_uri' => 'http://localhost/slim-contratos/',
		    'timeout'  => 2.0,
		]);
    }

}