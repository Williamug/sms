        <?php require_once("includes/session.php"); ?>
        <?php confirm_logged_in(); ?>
        <?php include("includes/header.php"); ?>
        <?php  
         
           // No. of students
           $result_students = mysql_query("SELECT COUNT(*) AS as_studentno FROM as_students");
          $row = mysql_fetch_array($result_students);
      
        ?>
      
        <!-- Dashboard -->
         
          <div id="page-header">
          <h4 class="page-header">Dashboard &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	          
                 <iframe name="iframeContent" src="clock/clock.html" width="190" height="40"></iframe>
                 <!-- <p class="as_welcome_note">Howdy, <?php //echo $_SESSION['as_username']; ?></p> -->

           </h4>
          </div>

          <div class="row placeholders">
          <!-- Top menu -->
          <a href="admission.php">
            <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
               <span class="fa fa-2x fa-user-plus"></span><br>
              <span class="text-muted">Student Admission</span>
            </div>
          </a>
          <a href="student.php">
            <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
              <span class="fa fa-2x fa-users"></span><br>
              <span class="text-muted">Student</span>
            </div>
            </a>
            <a href="parent.php">
            <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
               <span class="fa fa-2x fa-street-view"></span><br>
              <span class="text-muted">Parents</span>
            </div>
            </a>
            <a href="staff-view.php">
            <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
              <span class="fa fa-2x fa-briefcase"></span><br>
              <span class="text-muted">Staff</span>
            </div>
            </a>
            <a href="report-manage.php">
              <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
              <span class="fa fa-2x fa-file-text"></span><br>
              <span class="text-muted">Marks Report</span>
            </div>
            </a>
            <!-- <a href="attendence-view.php">
            <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
              <span class="fa fa-2x fa-list-alt"></span><br>
              <span class="text-muted">Student Attendance Reports</span>
            </div>
            </a> -->
            <!-- <a href="timetable.php">
            <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
              <span class="fa fa-2x fa-calendar"> </span><br>
              <span class="text-muted">Timetable</span>
            </div>
            </a> -->
            <a href="library.php">
            <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
              <span class="fa fa-2x fa-book"></span><br>
              <span class="text-muted">Library</span>
            </div>
            </a>
          </div><!-- End top menu -->

           <!-- Calender -->
           <div>
           <div class="row">
	            <div class="col-xs-6 col-md-10 placeholder calendar">
	            <!-- calendar -->
	            <iframe frameborder="0" name="iframeContent" src="fullcalendar/demos/theme.php" width="900" height="620">
	               <!-- <div id="calendar"></div> -->
	            </iframe>
	            </div>
            <!-- Right side bar -->
            <div class="col-xs-6 col-sm-2 placeholder">
            <!-- Right side bar -->
                <!-- <div class="side-bar-info side-blocks-3"> -->
                 <?php  
                   
                     // No. of students
                    //  $result_attend = mysql_query("SELECT COUNT(*) AS as_attendence_id FROM as_attendence
                    //                     WHERE as_attendence = 'present'");
                    // $row = mysql_fetch_array($result_attend);
                
                  ?>
                <!-- <h4><?php //echo $row["as_attendence_id"]; ?><br>Attendance</h4> -->
                <!-- <span class="text-muted-1">Total Students present today</span>
              </div> -->
            <br>

	              <div class="side-bar-info side-blocks-1">
	             <?php  
         
           // No. of students
           $result_students = mysql_query("SELECT COUNT(*) AS as_studentno FROM as_students");
          $row = mysql_fetch_array($result_students);
      
        ?>
	              <h4><?php echo $row["as_studentno"]; ?><br>Students</h4>
	              <span class="text-muted-1">Total Students</span>
	            </div>
            <br>
           
	            <!-- <div class="side-bar-info side-blocks-4">
                
                <h4><?php //echo $row["as_studentno"];  ?><br>Parents</h4>
                <span class="text-muted-1">Total Parents</span>
              </div> -->
              <br>

               <?php
                 $result_teachers = mysql_query("SELECT COUNT(*) AS as_core_subj FROM as_teacher 
                                      WHERE as_position = 'teacher' OR as_position = 'class teacher'");
                 if($row = mysql_fetch_array($result_teachers)){
              ?>

              <div class="side-bar-info side-blocks-2">
	             
	              <h4><?php echo $row['as_core_subj'];}?><br>Teachers</h4>
	              <span class="text-muted-1">Total Teachers</span>
	            </div>
            <br>
            <?php
                 $result_teachers = mysql_query("SELECT COUNT(*) AS as_teachers_id FROM as_teacher");
                 if($row = mysql_fetch_array($result_teachers)){
              ?>

              <div class="side-bar-info side-blocks-5">
               <h4><?php echo $row['as_teachers_id'];}?><br>Employees</h4>
                <span class="text-muted-1">Total Employees</span>
              </div>
            <br>
	        </div>
            <div class="row">
	            <div class="col-md-3">
	                
	            </div>
            <a href="#" class="down-link">
	            <div class="col-md-3 notice btn">
	            <span class="fa fa-envelope"></span>
	             Send mail/ SMS
	            </div>
            </a>
            <a href="#" class="down-link">
	            <div class="col-md-3 notice btn">
	            <span class="fa fa-newspaper-o"></span>
	                  Notice board
	            </div>
            </a>
	            <div class="col-md-3">
	             
	            </div>
            </div>
          </div>
          </div>
<?php include("includes/footer.php"); ?>
