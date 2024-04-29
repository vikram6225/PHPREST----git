<?php  

      class post{
        //dbstuff
        private $conn;
        private $table='posts';
         
        //post properties
        
         public $id;
         public $category_name;
         public $category_id;
         public $title;
         public $body;
         public $author;
         public $create_at;
        
         //constructor with db connection

         public function __construct($db){
            $this->conn=$db;
         }
       
         //getting post from our database

         public function read(){
            $query='SELECT 
               c.name as category_name,
               p.id,
               p.category_id,
               p.title,
               p.body,
               p.author,
               p.created_at FROM ' .$this->table .' p LEFT JOIN
                  categories c ON p.category_id=c.id
                  ORDER BY p.created_at DESC';

                  //prepared statement
 
                $stmt=$this->conn->prepare($query);
                 
                   //execute query

                   $stmt->execute();

                   return $stmt;

         }
         public function read_single(){
            $query='SELECT 
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at FROM ' .$this->table .' p LEFT JOIN
               categories c ON p.category_id=c.id
               WHERE p.id=? LIMIT 1';

               
                  //prepared statement
 
            $stmt=$this->conn->prepare($query);
            //binding param
            $stmt->bindparam(1,$this->id);
            //execute the query
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            //set the properties
              $this->title=$row['title'];
              $this->body=$row['body'];
              $this->author=$row['author'];
              $this->category_id=$row['category_id'];
              $this->category_name=$row['category_name'];
         }
          
         public function create(){
           //create query
            $query='INSERT INTO '. $this->table .' SET title = :title, body = :body, author = :author, category_id = :category_id';
            //prepare statement

            $stmt=$this->conn->prepare($query);

            //clean data

            $this->title=htmlspecialchars(strip_tags($this->title));
            $this->body=htmlspecialchars(strip_tags($this->body));
            $this->author=htmlspecialchars(strip_tags($this->author));
            $this->category_id=htmlspecialchars(strip_tags($this->category_id));

              //binding param
              $stmt->bindparam(':title',$this->title);
              $stmt->bindparam(':body',$this->body);
              $stmt->bindparam(':author',$this->author);
              $stmt->bindparam(':category_id',$this->category_id);

              //execute the query
           if($stmt->execute()){
            return true;
           }

              //print error if something goes wrong

              printf("Error %s. \n",$stmt->error);
              return false;

         }
           //update post function
         public function update(){
            //create query
             $query='UPDATE '. $this->table .' SET title = :title, body = :body, author = :author, category_id = :category_id WHERE id = :id';
             //prepare statement
 
             $stmt=$this->conn->prepare($query);
 
             //clean data
 
             $this->title=htmlspecialchars(strip_tags($this->title));
             $this->body=htmlspecialchars(strip_tags($this->body));
             $this->author=htmlspecialchars(strip_tags($this->author));
             $this->category_id=htmlspecialchars(strip_tags($this->category_id));
             $this->id=htmlspecialchars(strip_tags($this->id));

 
               //binding param
               $stmt->bindparam(':title',$this->title);
               $stmt->bindparam(':body',$this->body);
               $stmt->bindparam(':author',$this->author);
               $stmt->bindparam(':category_id',$this->category_id);
               $stmt->bindparam(':id',$this->id);
 
               //execute the query
            if($stmt->execute()){
             return true;
            }
 
               //print error if something goes wrong
 
               printf("Error %s. \n",$stmt->error);
               return false;
 
          }

          //delete function

          public function delete(){
            //create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
            //prepare statement
            $stmt= $this->conn->prepare($query);

            //clean the data
            $this->id= htmlspecialchars(strip_tags($this->id));

            //binding the id parameter    
            $stmt->bindparam(':id',$this->id);
            //execute the query
            if($stmt->execute()){
             return true;
          }
      
             //print error if something goes wrong
      
             printf("Error %s. \n",$stmt->error);
             return false;


          }


      }








?>