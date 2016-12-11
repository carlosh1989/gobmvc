<?php
require_once ('View.php');
$view = new Template();
$view->title = "hello, world";
$view->links = array("one", "two", "three");
$view->body = "Hi, sup";
$view->content = $view->render('content.php');
echo $view->render('main.php');
