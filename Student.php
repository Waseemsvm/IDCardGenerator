<?php
require_once("Database.php");

class Student{//A student class

    private $db;

    public function __construct(){
        $this->db = new Database;//create a database object
    }

    // Add Student
    public function addStudent($data){

       //handle images
       $target = "../images/profile_pics/".basename($_FILES['image']['name']);
       

      // Prepare Query
      $this->db->query('INSERT INTO student (usn, name, phone, email, dob, gender, address, image, Department_id)
      VALUES (:usn, :fname, :phone, :email, :dob, :gender, :address, :image, :did)');
     
      //store the uploaded image into a ../images/profile_pics/ directory
      if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo "inserted image successfully";
      }else{
        echo "There was an error while inserting an image";
      }

      // Bind Values
      $this->db->bind(':usn', $data['usn']);
      $this->db->bind(':fname', $data['fname']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':image', $data['image']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':dob', $data['dob']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':image', $data['image']);
      $this->db->bind(':did', $data['did']);




      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    public function removeStudent($data){


      $this->db->query('DELETE FROM STUDENT WHERE USN = :usn');

      $this->db->bind(':usn', $data['usn']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
}