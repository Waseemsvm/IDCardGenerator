<?php
    require_once("./Database.php");
       
      class retrieveStudents{
          private $db;
          function __construct(){
              $this->db = new Database;
          }

          public function getAllStudents(){
            $this->db->query("SELECT * from student, department WHERE student.DEPARTMENT_ID = department.Department_id");
            $results = $this->db->resultset();
      
            return $results;
          }
      }

    //   <!-- Cards  -->
    //               <div class="col">
    //                 <div class="card">
    //                   <img src="images/student.jpeg" class="card-img-top low-height" alt="student">
    //                   <div class="card-body">
    //                     <h5 class="card-title"><strong>Name</strong> : Waseem Akram P</h5>
    //                     <h5 class="card-title"><strong>USN</strong> : 1MJ18CS171</h5><hr>
    //                     <p class="card-text"><strong>Date Of Birth</strong> : 10-03-1999</p>
    //                     <p class="card-text"><strong>Email</strong> : waseemsvm14@gmail.com</p>
    //                     <p class="card-text"><strong>Phone</strong> : 8618152314</p>
    //                     <p class="card-text"><strong>Gender</strong> : Male</p>
    //                     <p class="card-text"><strong>Course</strong> : Computer Science and Engineering</p>
    //                     <p class="card-text"><strong>Address</strong> : 2nd Cross Near Sharada vidya Mandira School, Ayappa Swamy Temple road, Kadugodi, Benagaluru-67</p>
    //                   </div><!--- End of card-body class--->
    //                 </div><!---End of card class--->
    //               </div><!----End of col class-->

?>