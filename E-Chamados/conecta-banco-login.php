<?php
   $database = 'u641666397_chama';
   $host = 'localhost';
   $user = 'u641666397_jose';
   $pass = '99963225';
   $dbh = new PDO("mysql:dbname={$database};host={$host};port={3306}", $user, $pass);
   if(!$dbh){
      echo "unable to connect to database";
   }
?>