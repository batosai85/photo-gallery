<?php  
       require("./vendor/autoload.php");
       use Gallery\Database\Database;
       use Gallery\Session\Session;

       $config = require "config.php";
       $database = new Database($config);
       $session = new Session();

      

