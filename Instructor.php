<?php
require_once("Database.php");

class Instructor{//A instructor class

    private $db;

    public function __construct(){
        $this->db = new Database;//create a database object
    }

    // Add instructor
    public function addInstructor($data){

       //handle images
       $target = "../images/profile_pics/".basename($_FILES['image']['name']);
       

      // Prepare Query
      $this->db->query('INSERT INTO instructor (id, name, phone, email, dob, gender, address, image, Department_id)
      VALUES (:id, :fname, :phone, :email, :dob, :gender, :address, :image, :did)');
     
      //store the uploaded image into a ../images/profile_pics/ directory
      if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo "inserted image successfully";
      }else{
        echo "There was an error while insertiing an image";
      }

      // Bind Values
      $this->db->bind(':id', $data['id']);
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

    public function removeInstructor($data){


      $this->db->query('DELETE FROM INSTRUCTOR WHERE ID = :id');

      $this->db->bind(':id', $data['id']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
}