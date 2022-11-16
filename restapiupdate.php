<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header('Access-Control-Allow-Methods:POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization');
  $data=json_decode(file_get_contents("php://input"),true);
  $id=$data['sid'];
  $name=$data['sname'];
  $quantity=$data['squantity'];
  $price=$data['sprice'];
  $category=$data['scategory'];
  $conn=mysqli_connect('localhost','shoppingweb','test123','inventory');
  if($conn)
  {
    
    $sql="UPDATE list SET id={$id},name='{$name}',quantity={$quantity},price={$price},category='{$category}' Where id={$id}";
    if(mysqli_query($conn,$sql))
    {
      echo json_encode(array('message'=>'Record Updated','status'=>true));
    }
    else
    {
      echo json_encode(array('message'=>'Record not Updated','status'=>false));
    }
   
  }
?>