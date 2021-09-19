<?php
    require_once("./Database.php");
       
      class retrieveInstructors{
          private $db;
          function __construct(){
              $this->db = new Database;
          }

          public function getAllInstructors(){
            $this->db->query("SELECT * from instructor, department WHERE instructor.DEPARTMENT_ID = department.Department_id");
            $results = $this->db->resultset();
      
            return $results;
          }
      }