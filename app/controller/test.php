#!/bin/php
<?php
namespace Alice {
class Greetings
{
    static function hello()
    {
        return 'Hello, I am Alice!';
    }
    static function bye()
    {
        return 'Good bye, I am Alice!';
    }
}
}
 
namespace Bob {
class Greetings
{
    static function hello()
    {
        return 'Hello, I am Bob!';
    }
    static function bye()
    {
        return 'Good bye, I am Bob!';
    }
}
}
 
namespace {
echo Alice\Greetings::hello() . PHP_EOL;
echo Bob\Greetings::hello() . PHP_EOL;
echo Alice\Greetings::bye() . PHP_EOL;
echo Bob\Greetings::bye() . PHP_EOL;
}