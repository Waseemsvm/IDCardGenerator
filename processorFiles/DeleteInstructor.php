<?php
   require_once("../Database.php") ;
   require_once "../Instructor.php";

   $db = new Database();
echo $db->isConnected() ? "DB Connected" . PHP_EOL : "DB Not Connected" . PHP_EOL;

if( !$db->isConnected() ){
	echo $db->getError();
	die("Unable to connect to DB");
}


//create a new student object 

$instructor = new Instructor();


//After Register button is clicked
if(isset($_POST['submit'])){


   //create variables to retrieve data stored in form
   $id = $_POST['id']; 

   //create $data array variable
   $data = ['id'=>$id];


   //call add student method from student object
   if($instructor->removeInstructor($data)){

      //if the student is added success fully show this message
      echo "<h1>Deleted $name successfully</h1>";
      header("Location: ../index.php");
   }
   
}else{

   //if submit is not set
   echo "unable to submit form";
   echo $_POST['id'];
}




?>