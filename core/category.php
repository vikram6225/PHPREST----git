<?php  

      class category{
        //dbstuff
        private $conn;
        private $table='categories';
         
        //category properties
        
         public $id;
         public $name;
         public $created_at;
     
        
         //constructor with db connection....

         public function __construct($db){
            $this->conn=$db;
         }
       
         //getting post from our database

         public function read(){
            $query='SELECT 
              * FROM ' .$this->table ;

                  //prepared statement
 
                $stmt=$this->conn->prepare($query);
                 
                   //execute query

                   $stmt->execute();

                   return $stmt;

         }
        }