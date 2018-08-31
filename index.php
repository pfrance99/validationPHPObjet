<?php
spl_autoload_register(function($classname){
  $directory = '';
  if (strpos($classname, 'Helper')) {
    $directory = 'helpers';
  }
  else if (strpos($classname, 'Model')) {
    $directory = 'models';
  }
  else if (strpos($classname, 'Controller')) {
    $directory = 'controllers';
  }
  else {
    throw new \Exception("Error including class. Check your code", 1);
  }
  include $directory . '/' . $classname . '.php';
});
session_start();
RouteHelper::getRoute();
