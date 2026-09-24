<?php 
 $db = parse_ini_file("config.ini");
                $user = $db['user'];
                $pass = $db['pass'];
                $name = $db['name'];
                $host = $db['host'];

                $mysqli = new mysqli($host, $user, $pass, $name); 
                $mysqli->select_db($name) or die("Unable to select database".$name);
?>