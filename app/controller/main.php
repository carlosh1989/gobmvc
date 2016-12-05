<?php
require 'Alice.php';
require 'Bob.php';
 
echo Alice\Greetings::hello() . PHP_EOL;
echo Bob\Greetings::hello() . PHP_EOL;
echo Alice\Greetings::bye() . PHP_EOL;
echo Bob\Greetings::bye() . PHP_EOL;