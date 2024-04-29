<?php 
          
   header('Access-Control-Allow-Origin: *');//http per
   header('Content-Type:Application/JSON'); //

   //initializing our API
   include_once('..\core\initialize.php');
  
    //instantiate post

    $post=new post($db);
 
    $post->id=isset($_GET['id'])? $_GET['id'] : die();
    $post->read_single();

    $post_arr=array(
        'id'=>$post->id,
        'title'=>$post->title,
        'body'=>$post->body,
        'author'=>$post->author,
        'category_id'=>$post->category_id,
        'category_name'=>$post->category_name,

    );
  //make a json array
  print_r(json_encode($post_arr));

