        <?php include("includes/header-teachers.php"); ?>
        <!-- Dashboard -->
         
          <div id="page-header">
          <h3 class="page-header">Dashboard &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="fa fa-calendar"></span></h3>
          </div>

          <div class="row placeholders">
          <!-- Top menu -->
          <a href="admission.php">
            <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
               <span class="fa fa-2x fa-users"></span><br>
              <span class="text-muted">Students</span>
            </div>
          </a>
          <a href="student.php">
            <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
              <span class="fa fa-2x fa-street-view"></span><br>
              <span class="text-muted">Parents</span>
            </div>
            </a>
            <a href="parent.php">
            <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
               <span class="fa fa-2x fa-file-text"></span><br>
              <span class="text-muted">Marks Report</span>
            </div>
            </a>
            <a href="employee.php">
            <div class="col-xs-6 col-sm-3 placeholder btn btn-sm btn-default">
              <span class="fa fa-2x fa-list-alt"></span><br>
              <span class="text-muted">Student Attendance Report</span>
            </div>
            </a>
           
          </div><!-- End top menu -->

           <!-- Calender -->
           <div class="row">
            <div class="col-xs-6 col-md-10 placeholder calendar">
            <div class="row">
            <div class="col-xs-6 col-md-6 placeholder">
                <h4 class="sub-header">Calender</h4> 
            </div>
            <div class="col-xs-6 col-sm-6 placeholder">
                <h4 class="sub-header">May 2017</h4>
            </div>
           </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Sunday</th>
                  <th>Monday</th>
                  <th>Tuesday</th>
                  <th>Wednesday</th>
                  <th>Thursday</th>
                  <th>Friday</th>
                  <th>Saturday</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>2</td>
                  <td>3</td>
                  <td>4</td>
                  <td>5</td>
                  <td>6</td>
                  <td>7</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>9</td>
                  <td>10</td>
                  <td>11</td>
                  <td>12</td>
                  <td>13</td>
                  <td>14</td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>16</td>
                  <td>17</td>
                  <td>18</td>
                  <td>19</td>
                  <td>20</td>
                  <td>21</td>
                </tr>
                <tr>
                  <td>22</td>
                  <td>23</td>
                  <td>24</td>
                  <td>25</td>
                  <td>26</td>
                  <td>27</td>
                  <td>28</td>
                </tr>
                 <tr>
                  <td>29</td>
                  <td>30</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr> 
              </tbody>
            </table>
            </div>
            </div>
            <!-- Right side bar -->
            <div class="col-xs-6 col-sm-2 placeholder">
            <!-- Right side bar -->
              <div class="side-bar-info side-blocks-1">
             
              <h4>No.<br>Students</h4>
              <span class="text-muted-1">Total Students</span>
            </div>
            <br>
            <div class="side-bar-info side-blocks-2">
             
              <h4>No.<br>Teacher</h4>
              <span class="text-muted-1">Total Teachers</span>
            </div>
            <br>
            <div class="side-bar-info side-blocks-3">
             
              <h4>No.<br>Attendance</h4>
              <span class="text-muted-1">Total Students present today</span>
            </div>
            <br>
            <div class="side-bar-info side-blocks-4">
              
              <h4>No.<br>Parents</h4>
              <span class="text-muted-1">Total Parents</span>
            </div>
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
          
          

<?php include("includes/footer.php"); ?>
