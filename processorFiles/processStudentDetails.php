<?php
   require_once("../Database.php") ;
   require_once "../Student.php";

   $db = new Database();
echo $db->isConnected() ? "DB Connected" . PHP_EOL : "DB Not Connected" . PHP_EOL;

if( !$db->isConnected() ){
	echo $db->getError();
	die("Unable to connect to DB");
}


//create a new student object 

$student = new Student();


//After Register button is clicked
if(isset($_POST['submit'])){


   //create variables to retrieve data stored in form
   $usn = $_POST['usn'];
   $name = $_POST['fname'].$_POST['lname'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $dob = $_POST['date'];
   $gender = $_POST['gender'];
   $address = $_POST['add1']." ".$_POST['add2'];
   $did = $_POST['department'];
   $image = $_FILES['image']['name'];
   


   //create $data array variable
   $data = ['fname'=> $name, 'email'=>$email, 'image'=>$image, 'usn'=>$usn, 'phone'=>$phone, 'dob'=>$dob, 'gender'=>$gender, 'address'=> $address, 'did'=>$did];


   //call add student method from student object
   if($student->addStudent($data)){

      //if the student is added success fully show this message
      echo "<h1>Inserted $name successfully</h1>";
      header("Location: ../StudentSuccessPage.php");
   }
   
}else{

   //if submit is not set
   echo "unable to submit form";
}




?>