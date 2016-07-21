<?php

use Kimeria\TicTacToeService as TicTacToeService;

// DIC configuration
$container = $app->getContainer();

#
# Configure the TicTacToe Service
#

$container['TicTacToeService'] = function($c){
	return new Kimeria\TicTacToeService;
};



// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};
