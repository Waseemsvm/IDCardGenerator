<?php
   require_once("../Database.php") ;
   require_once "../Instructor.php";

   $db = new Database();
echo $db->isConnected() ? "DB Connected" . PHP_EOL : "DB Not Connected" . PHP_EOL;

if( !$db->isConnected() ){
	echo $db->getError();
	die("Unable to connect to DB");
}


//create a new instructor object 

$instructor = new Instructor();


//After Register button is clicked
if(isset($_POST['submit'])){

   var_dump($_FILES);

   //create variables to retrieve data stored in form

   $id = $_POST['id'];
   $name = $_POST['fname'].$_POST['lname'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $dob = $_POST['dob'];
   $gender = $_POST['gender'];
   $address = $_POST['add1']." ".$_POST['add2'];
   $did = $_POST['department'];

   if(array_key_exists('image', $_FILES)){
      $image = $_FILES['image']['name'];
   }else{
      die("image not found!");
   }


   


   //create $data array variable
   $data = ['fname'=> $name, 'email'=>$email, 'image'=>$image, 'id'=>$id, 'phone'=>$phone, 'dob'=>$dob, 'gender'=>$gender, 'address'=> $address, 'did'=>$did];


   //call add student method from student object
   if($instructor->addInstructor($data)){

      //if the student is added success fully show this message
      echo "<h1>Inserted $name successfully</h1>";
      header("Location: ../InstructorSuccessPage.php");
   }
   
}else{

   //if submit is not set
   echo "unable to submit form";
}




?>