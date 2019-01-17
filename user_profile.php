<!DOCTYPE html>
<?php
session_start();
include("includes/head.php");

if (!isset($_SESSION['user_email'])) {
  header("location:index.php");
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Find people</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/allstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
  </head>
  <body>
    <?php
    include("includes/header.php");
    ?>
    <div class="col-sm-2">
    </div>
    <div class="row">
      <div class="col-sm-1">
      </div>
      <?php
        if (isset($_GET['u_id'])) {
          $u_id = $_GET['u_id'];
        }
        if ($u_id < 0 || $u_id == "") {
          echo "<script>window.open('home.php', '_self')</script>";
        }else{

        }

       ?>
       <div class="col-sm-12">
         <?php
         if (isset($_GET['u_id'])) {
            global $con;
            $user_id  = $_GET['u_id'];
            $select = "SELECT * FROM users WHERE user_id='".$user_id."'";
            $run = mysqli_query($con,$select);
            $row = mysqli_fetch_array($run);
            $name = $row['user_name'];

         } ?>

         <?php
         if (isset($_GET['u_id'])) {
           global $con;
           $user_id = $_GET['u_id'];
           $select = "SELECT * FROM users WHERE user_id='".$user_id."'";
           $run = mysqli_query($con,$select);
           $row = mysqli_fetch_array($run);

           $user_id = $row['user_id'];
           $user_name = $row['user_name'];
           $first_name = $row['f_name'];
           $last_name = $row['l_name'];
           $describe_user = $row['describe_user'];
           $user_email = $row['user_email'];
           $user_birthday = $row['user_birthday'];
           $user_image = $row['user_image'];
           $user_cover = $row['user_cover'];
             $user_batch = $row['batch'];
               $user_degree = $row['degree'];

         echo "

          <div class='row'>
            <div class = 'col-sm-3'>
              <div class-'col-sm-7>'
              </div>
              <center>
              <div style='background-color:#e6e6e6;' class ='col-sm-12'>
                <h2> Information About</h2>
                <img  class='img-circle' src='users/$user_image' width='150px' height='150px' />
                <br /><br />
                <ul class='list-group'>
                <li class='list-ground-item' title='username'><strong>$first_name $last_name</strong></li>
                <li class='list-ground-item' title='username'><strong>$user_email</strong></li>
                <li class='list-ground-item' title='username'><strong> $user_batch</strong></li>
                <li class='list-ground-item' title='username'><strong> $user_degree</strong></li>
                </ul>
          ";
          $user = $_SESSION['user_email'];
          $get_users = "SELECT * FROM users WHERE user_email = '$user'";
          $run_user= mysqli_query($con,$get_users);
          $row = mysqli_fetch_array($run_user);

          $userwon_id = $row['user_id'];
          if ($user_id == $userwon_id) {
            echo "<a href = 'profile1.php?u_id = $userwon_id' class = 'btn btn-success'>EDIT PROFILE</a><br /><br /><br />";
          }



         }
          ?>

       </div>
    </div>

    <div class="col-sm-6" >
      <!--user post -->

      <?php
        global $con;
        if(isset($_GET['u_id'])){
          $u_id = $_GET['u_id'];
        }
          $get_posts = "SELECT * FROM posts WHERE user_id = '".$u_id."' ORDER BY 1 DESC LIMIT 5 ";
          $run_posts = mysqli_query($con,$get_posts);

          while ($row_posts = mysqli_fetch_array($run_posts)) {
            $post_id =$row_posts['post_id'];
            $user_id =$row_posts['user_id'];
            $title =$row_posts['post_title'];
            $content =$row_posts['post_content'];
            $members =$row_posts['post_members'];
            $upload_image =$row_posts['upload_image'];
            $post_date =$row_posts['post_date'];
            $user = "SELECT * FROM users WHERE user_id = '".$user_id."' AND posts = 'yes'";
            $run_user = mysqli_query($con,$user);
            $row_user = mysqli_fetch_array($run_user);

            $user_name = $row_user['user_name'];
            $user_image = $row_user['user_image'];

            if(strlen($content) >= 1 && strlen($upload_image) >= 1){
    ?>

    <div class='own_posts'>
      <div class='row'>
        <div class='col-sm-2'>
        <p><img src='users/<?php echo $user_image;?>' class='img-circle' width='100px' height='100px'></p>
        </div>
        <div class='col-sm-6'>
          <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=<?php echo $user_id; ?>'><?php echo $user_name; ?></a></h3>
          <h4><small style='color:black;'>Updated a post on <strong><?php $post_date; ?></strong></small></h4>
        </div>
      </div>
      <div class='row'>
        <div class='col-sm-12'>
        <h2><i><?php echo $title; ?></i></h2>
          <p><?php echo $content; ?></p>
          members:<p><?php echo $members; ?> </p>
          <img id='posts-img' src='imagepost/<?php echo $upload_image; ?>' style='height:450px;'>
        </div>
      </div><br>



    </div>
    <?php

            }

          }


       ?>

    </div>
      </div>
</div>
</body>
</html>
