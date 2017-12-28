<?php 
        
 $finmsg = "";
    $servername = "localhost";
  $susername = "leminhye_user";
  $spassword = "1Q2S3C";
  $dbname = "leminhye_data";
            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) && empty($_GET['userhash']) && empty($_GET['usermail'])){
            $email = $_GET['email']; // Set email variable
            $hash = $_GET['hash']; // Set hash variable
            $conn2 = mysqli_connect($servername,$susername,$spassword,$dbname);
            $query = "SELECT * FROM tbl_tutors WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
            $result = mysqli_query($conn2,$query);
            $count = mysqli_num_rows($result);
              if($count>=1){

                        // Create connection
                        // Check connection
                        if ($conn2->connect_error) {
                            die("Connection failed: " . $conn2->connect_error);
                        }

                        $sql = "UPDATE tbl_tutors SET active='1' WHERE email='".$email."' AND hash='".$hash."'";

                        if ($conn2->query($sql) === TRUE) {
                            $finmsg = "Email confirmed successfully! Please wait for a staff member to check your application and approve memebership!";
                        } else {
                            $finmsg = "Error updating record: " . $conn2->error;
                        }
                }
                else{
                    $query = "SELECT * FROM tbl_tutors WHERE email='".$email."' AND hash='".$hash."' AND active='1'";
                    $result2 = mysqli_query($conn2,$query);
                     $count2 = mysqli_num_rows($result2);
                    if($count2>=1){
                        $finmsg = "You have already confirmed your email!";
                    }
                    else{
                        $finmsg = "Invalid confirmation url!";

                    }
                  }
                }
                else if (isset($_GET['usermail']) && !empty($_GET['usermail']) AND isset($_GET['userhash']) && !empty($_GET['userhash']) && empty($_GET['hash']) && empty($_GET['email'])) {
                    $email = $_GET['usermail']; // Set email variable
                    $hash = $_GET['userhash']; // Set hash variable
                    $conn2 = mysqli_connect($servername,$susername,$spassword,$dbname);
                    $query = "SELECT * FROM tbl_users WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
                    $result = mysqli_query($conn2,$query);
                    $count = mysqli_num_rows($result);
                      if($count>=1){

                                // Create connection
                                // Check connection
                                if ($conn2->connect_error) {
                                    die("Connection failed: " . $conn2->connect_error);
                                }

                                $sql = "UPDATE tbl_users SET active='1' WHERE email='".$email."' AND hash='".$hash."'";

                                if ($conn2->query($sql) === TRUE) {
                                    $finmsg = "Email confirmed successfully!";
                                } else {
                                    $finmsg = "Error updating record: " . $conn2->error;
                                }
                        }
                        else{
                            $query = "SELECT * FROM tbl_tutors WHERE email='".$email."' AND hash='".$hash."' AND active='1'";
                            $result2 = mysqli_query($conn2,$query);
                             $count2 = mysqli_num_rows($result2);
                            if($count2>=1){
                                $finmsg = "You have already confirmed your email!";
                            }
                            else{
                                $finmsg = "Invalid confirmation url!";

                            }

                    
                        }
                }
                include 'includes/header.php'; ?>


<div class="showcardveil"></div>
<div class="showcard2">
    
    <div class="showcasetext">
        <div class="logincontainervalid">
            <?php echo $finmsg; ?>
        </div>
    </div>
</div>
<?php
       include 'includes/simplefooter.php'; ?>