<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/styleDeleteStudent.css" id="">   
  
    <script src="./scripts/script.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- bootstrap JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home Page</a>
          <a class="nav-link" id="v-pills-studentid-tab" data-bs-toggle="pill" href="#v-pills-studentid" role="tab" aria-controls="v-pills-studentid" aria-selected="false">Generate Student ID card</a>
          <a class="nav-link" id="v-pills-instructorid-tab" data-bs-toggle="pill" href="#v-pills-instructorid" role="tab" aria-controls="v-pills-instructorid" aria-selected="false">Generate Instructor Id Card</a>
          <a class="nav-link" id="v-pills-studentform-tab" data-bs-toggle="pill" href="#v-pills-studentform" role="tab" aria-controls="v-pills-studentform" aria-selected="false">Register a Student</a>
          <a class="nav-link" id="v-pills-instructorform-tab" data-bs-toggle="pill" href="#v-pills-instructorform" role="tab" aria-controls="v-pills-instructorform" aria-selected="false">Register an Instructor</a>
          <a class="nav-link" id="v-pills-removestudent-tab" data-bs-toggle="pill" href="#v-pills-removestudent" role="tab" aria-controls="v-pills-removestudent" aria-selected="false">Remove a Student</a>
          <a class="nav-link" id="v-pills-removeInstructor-tab" data-bs-toggle="pill" href="#v-pills-removeInstructor" role="tab" aria-controls="v-pills-removeInstructor" aria-selected="false">Remove an Instructor</a>

          
        </div>
        <div class="tab-content" id="v-pills-tabContent">
         
          <!-- v-pills-home1 -->

          <div class="tab-pane fade show active" id="v-pills-home" role="tabpane" aria-labelledby="v-pills-home-tab">

            <div class="top-pad h1 text-center heading low-width">
              ID Card Generator
          </div>
          <div class="low-width">
              <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                      <img src="images/1a.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                      <img src="images/2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="images/1.png" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </a>
                </div>
          </div>

            </div>
            <!-- v-pills-home-->
          <div class="tab-pane fade " id="v-pills-studentid" role="tabpanel" aria-labelledby="v-pills-studentid-tab">
            
                   <!-- Container for cards -->    
                   <button id="min-width" type="button" class="btn btn-secondary btn-sm" onclick="printDiv('printEntirepage')" value="printAllPages" >Print All IDs</button>
                   

                    <div class="container" id="printEntirepage">
                        
                      <!-- Row Configuration for  cards -->

                          <div class="row row-cols-1 row-cols-md-3 g-4">
                            <?php
                              require_once("./processorFiles/retrieveStudentDetails.php");

                              $s = new retrieveStudents();

                              $students = $s->getAllStudents();

                              $x = 0;
            
                            foreach($students as $student){ 
                              $x++;                 
                              $printableArea = "printableArea".$x;
                            ?>
                              <!-- Cards  -->
                            <div class="col">
                              <div class="prints" id="<?=$printableArea?>" >                                    
                                <div class="card" id="">
                                  <img src=<?="images/profile_pics/$student->image"?> onclick="printDiv('<?=$printableArea?>')" class="card-img-top low-height" alt="student">
                                    <div class="card-body">
                                      <h5 class="card-title"><strong>Name :</strong> <?=$student->name?></h5>
                                      <h5 class="card-title"><strong>USN :</strong> <?=$student->usn?></h5><hr>
                                      <p class="card-text"><strong>Date Of Birth : </strong> <?=$student->dob?></p>
                                      <p class="card-text"><strong>Email : </strong> <?=$student->email?></p>
                                      <p class="card-text"><strong>Phone : </strong> <?=$student->phone?></p>
                                      <p class="card-text"><strong>Gender : </strong> <?=$student->gender?></p>
                                      <p class="card-text"><strong>Course : </strong> <?=$student->Department_name?></p>
                                      <p class="card-text"><strong>Address : </strong> <?=$student->address?></p>                                       
                                    </div><!--- End of card-body class--->
                                </div><!---End of card class--->
                              </div>                                       
                            </div><!----End of col class-->
                              
                              <?php
                                }
                              ?>
                          </div>           
                    </div>
                    
                    
              </div>
          
          <!-- v-pills-instructorid -->
          
          <div class="tab-pane fade" id="v-pills-instructorid" role="tabpane" aria-labelledby="v-pills-instructorid-tab">
            
          <button id="min-width" type="button" class="btn btn-secondary btn-sm" onclick="printDiv('printEntirePage1')" value="printAllPages" >Print All IDs</button>

             <div class="container" id="printEntirePage1">
                          <div class="row row-cols-1 row-cols-md-3 g-4">
                            <?php
                              require_once("./processorFiles/retrieveInstructorDetails.php");

                              $s = new retrieveInstructors();

                              $instructors = $s->getAllInstructors();

                              $x=0;
            
                            foreach($instructors as $instructor){       
                              $x++;                 
                              $printableArea1 = "printableArea1".$x;
                              
                            ?>
                              <!-- Cards  -->
                            <div class="col">
                              <div id="<?=$printableArea1?>" >
                                <div class="card">
                                  <img src=<?="images/profile_pics/$instructor->image"?> onclick="printDiv('<?=$printableArea1?>')" class="card-img-top low-height" alt="student">
                                  <div class="card-body">
                                    <h5 class="card-title"><strong>Name :</strong> <?=$instructor->name?></h5>
                                    <h5 class="card-title"><strong>ID :</strong> <?=$instructor->id?></h5><hr>
                                    <p class="card-text"><strong>Date Of Birth : </strong> <?=$instructor->dob?></p>
                                    <p class="card-text"><strong>Email : </strong> <?=$instructor->email?></p>
                                    <p class="card-text"><strong>Phone : </strong> <?=$instructor->phone?></p>
                                    <p class="card-text"><strong>Gender : </strong> <?=$instructor->gender?></p>
                                    <p class="card-text"><strong>Department : </strong> <?=$instructor->Department_name?></p>
                                    <p class="card-text"><strong>Address : </strong> <?=$instructor->address?></p>
                                  </div><!--- End of card-body class--->
                                </div><!---End of card class--->
                              </div>
                            </div><!----End of col class-->      
                            <?php
                              }
                            ?>
                          </div>
                    </div>

          </div>
         
         <!-- v-pills-studentform -->

          <div class="tab-pane fade" id="v-pills-studentform" role="tabpane" aria-labelledby="v-pills-studentform-tab">
          <div>
                            <div class="gives-margin"></div>
                            <form method="POST" action="processorFiles/processStudentDetails.php" enctype="multipart/form-data">
                                  <legend><h1>Enter Student Details : </h1></legend>
                                <!-- First Name Input -->
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroup-sizing-sm">First Name: </span>
                                    </div>
                                    <input type="text" name="fname" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                  </div>
                                    <!-- Last Name Input -->
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroup-sizing-sm">Last Name: </span>
                                    </div>
                                    <input type="text" name="lname" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                  </div>
                                    <!-- USN Input -->
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroup-sizing-sm">USN : </span>
                                    </div>
                                    <input type="text" name="usn" pattern="[0-9][a-zA-Z]{2}[0-9]{2}[a-zA-Z]{2}[0-9]{3}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                  </div>
                                    <!-- Phone Input -->
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroup-sizing-sm">Phone : </span>
                                    </div>
                                    <input type="text" name="phone" pattern="(+91)?[1-9][0-9]{9}" min="10" max="13" class="form-control" placeholder="1234567890" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                  </div>
                                    <!-- Email Input -->
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroup-sizing-sm">Email : </span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="name@example.com" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                  </div>
                                    <!-- Date Of Birth Input -->
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroup-sizing-sm">Date of birth : </span>
                                    </div>
                                    <input class="form-control" name="date" type="date" value="2011-08-19" id="example-date-input" required>
                                  </div>
                                    <!-- Select Course Input -->
                                                
                                  <div class="form-group" required>
                                    <label for="course">Select the Course : </label>
                                      <select name="department" class="form-control" id="course">
                                        <option value="1">Computer Science Engineering</option>
                                        <option value="2">Information Science</option>
                                        <option value="3">Electronics and Communicaion</option>
                                        <option value="4">Aerospace Engineering</option>
                                        <option value="5">Aeronautical Engineering</option>
                                      </select>
                                  </div><br>
                                    
                                    <!-- Select your gender Input -->
                                  <div class="form-group">
                                    <label for="gender">Select your gender : </label>
                                      <select multiple name="gender" class="form-control" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                      </select>
                                  </div><br>
                                    
                                    <!-- Address Input -->
                                  <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" name="add1" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                  </div><br>
                                  <div class="form-group">
                                    <label for="inputAddress2">Address 2</label>
                                      <input type="text" name="add2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                  </div>
                                  <br>
                                  <div class="form-group">
                                    <label class="form-label" for="customFile">Choose Your Profile Picture : </label>
                                    <input type="file" name="image" class="form-control" id="customFile" />
                                  </div>
                                  <br>
                                    <!-- Registration Button -->
                              <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Register Student</button>
                          </form>
                </div>
          </div>

          <!-- v-pills-instructorform -->

          <div class="tab-pane fade" id="v-pills-instructorform" role="tabpane" aria-labelledby="v-pills-instructorform-tab">
          <div>
                        <div class="gives-margin"></div>
                          <form method="POST" action="processorFiles/processInstructorDetails.php" enctype="multipart/form-data">
                            <legend><h1>Enter Instructor Details : </h1></legend>
              
                                <!-- First Name Input -->
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">First Name: </span>
                              </div>
                              <input type="text" name="fname" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                                <!-- Last Name Input -->
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Last Name: </span>
                              </div>
                              <input type="text"  name="lname" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                            </div>

                                <!-- Instructor ID Input -->
              
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Instructor ID: </span>
                              </div>
                              <input type="text" name="id" pattern="[A-Za-z0-9]+" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                                <!-- Phone Input -->
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Phone : </span>
                              </div>
                              <input type="text" name="phone" pattern="[1-9][0-9]{9}" min="10" max="13" class="form-control" placeholder="1234567890" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                                <!-- Email Input -->
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Email : </span>
                              </div>
                              <input type="email" name="email" class="form-control" placeholder="name@example.com" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                                <!-- Date Of Birth Input -->
                            <div class="input-group input-group-sm mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Date of birth : </span>
                              </div>
                              <input class="form-control" name="dob" type="date" value="2011-08-19" id="example-date-input" required>
                            </div>
                                  <!-- Select course Input  -->
                            <div class="form-group" required>
                              <label for="course">Select the Course : </label>
                                <select name="department" class="form-control" id="course">
                                  <option value="1">Computer Science Engineering</option>
                                  <option value="2">Information Science</option>
                                  <option value="3">Electronics and Communicaion</option>
                                  <option value="4">Aerospace Engineering</option>
                                  <option value="5">Aeronautical Engineering</option>
                                </select>
                            </div><br>
                                <!-- Select Age Input -->
                            <div class="form-group">
                              <label for="gender">Select your gender : </label>
                                <select multiple  name="gender" class="form-control" id="gender">
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div><br>
                                <!-- Address Input -->
                            <div class="form-group">
                              <label for="inputAddress">Address</label>
                              <input type="text" name="add1" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div><br>
                            <div class="form-group">
                              <label for="inputAddress2">Address 2</label>
                              <input type="text" name="add2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                            </div>
                              <br>
                            <div class="form-group">
                              <label class="form-label" for="customFile">Choose Your Profile Picture : </label>
                                <input type="file" name="image" class="form-control" id="customFile" />
                            </div><br>
                            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Register Instructor</button>
                          </form>
                        
                  </div>
          </div>


         

          <!-- v-pills-removestudent -->


          <div class="tab-pane fade " id="v-pills-removestudent" role="tabpane" aria-labelledby="v-pills-removestudent-tab">
          <form  method="POST" action="./processorFiles/DeleteStudent.php">
                        <div class="form-group">
                          <label for="inputAddress2">Enter the USN to remove Student : </label>
                          <input type="text" name="usn" class="form-control" id="inputAddress2" placeholder="XXXXXXXXXX">
                        </div>

                        <button onclick="document.getElementById('id01').style.display='block'" type="button" class="btn btn-danger">Remove Student</button>
                        
                        <div id="id01" class="modal">                         
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>      
                            <form class="modal-content" action="./processorFiles/DeleteStudent.php">
                                  <div class="container1">
                                    <h1>Remove Student</h1>
                                      <p>Are you sure you want to remove Student?</p>
                                        <!-- <div class="clearfix">
                                          <button type="reset"  class="cancelbtn">Cancel</button>
                                          <button type="Submit" name="submit" class="deletebtn">Remove</button>
                                        </div> -->
                                        <button type="Submit" name="submit" class="btn btn-danger">Remove</button>
                                  </div>
                              </form>
                          </div>
                  </form>
          </div>

          <!-- v-pills-removeInstructor -->


          <div class="tab-pane fade " id="v-pills-removeInstructor" role="tabpane" aria-labelledby="v-pills-removeInstructor-tab">
          <form  method="POST" action="./processorFiles/DeleteInstructor.php">
                        <div class="form-group">
                          <label for="inputAddress2">Enter the ID to remove Instructor : </label>
                          <input type="text" name="id" class="form-control" id="inputAddress2" placeholder="XXXXXXXXXX">
                        </div>

                        <button onclick="document.getElementById('id02').style.display='block'" type="button" class="btn btn-danger">Remove Student</button>
                        
                        <div id="id02" class="modal">                         
                            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>      
                            <form class="modal-content" action="./processorFiles/DeleteInstructor.php">
                                  <div class="container1">
                                    <h1>Remove Instructor</h1>
                                      <p>Are you sure you want to remove Instructor?</p>
                                        <!-- <div class="clearfix">
                                          <button type="reset"  class="cancelbtn">Cancel</button>
                                          <button type="Submit" name="submit" class="deletebtn">Remove</button>
                                        </div> -->
                                        <button type="Submit" name="submit" class="btn btn-danger">Remove</button>
                                  </div>
                              </form>
                          </div>
                  </form>
          </div>

        </div>
      </div>
</body>
</html>