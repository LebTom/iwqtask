<?php
    /*                            */
    /* connection with DB - begin */
    /*                            */

    //connect to database - create class
    class Database{
        private $dbHostname = DB_DATA_HOST;
        private $dbName = DB_DATA_DBNAME;
        private $dbUsername = DB_DATA_USER;
        private $dbPasswd = DB_DATA_PASSWD;

        //function connect
        public function connect(){
            $initConnectionData = "mysql:host=$this->dbHostname;dbname=$this->dbName";
            $connection = new PDO($initConnectionData, $this -> dbUsername, $this -> dbPasswd);
            $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        }
    }

    /*                          */
    /* connection with DB - end */
    /*                          */

?>