<?php
  class db{
      // Propriedades
      private $dbhost = 'mysql552.umbler.com:41890';
      private $dbuser = 'fernando_minerva';
      private $dbpass = 'devianart123';
      private $dbname = 'minervadb';
      private $charset = 'utf8';

      public function connect(){
          $mysql_connect_str = "mysql:host=$this->dbhost; dbname=$this->dbname; charset=$this->charset";
          $dbConnection = new PDO($mysql_connect_str, $this->dbuser , $this->dbpass);
          $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $dbConnection;

      }
  }

?>
