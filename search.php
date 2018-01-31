<?php  include "includes/header.php"; ?>
<?php include "includes/db.php";?>     
       
 
      <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

  

           

   <?php
            
       if(isset($_POST['submit'])){
           
        echo $search = $_POST['search'];   
           
      
       $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
       
       $search_query = mysqli_query($connection, $query);
       
       
        if(!$search_query){
           
        die("QUERY FAILED" .mysqli_error($connection));
           
       }
       
       $count = mysqli_num_rows($search_query);
      if($count == 0){
      echo "<h1>No results</h1>";  
        
    }   
           else {
               
               
         
while ($row = mysqli_fetch_assoc($search_query)) {

$post_title = $row['post_title'];   
$post_author = $row['post_author'];  
$post_date = $row['post_date'];   
$post_image = $row['post_image']; 
$post_content = $row['post_content'];           
        
?>       
            
 <!-- Title -->
          <h1 class="mt-4"><?php echo $post_title ?></h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#"><?php echo $post_author ?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo $post_date ?></p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="images/Amazon.jpg" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $post_content ?></p>
<?php } 
           
           
           
           
           }
       
       }         
            
   
 ?>        
                
    
    
    
    
           
            
            
            
            
            
          

          
          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

    

            </div>
          </div>

        </div>

       
          
          
          
          <!-- Sidebar Widgets Column -->
        <div class="col-md-4"><!---Plcing the php code for the search blog--->
        
    <?php
            
       if(isset($_POST['submit'])){
           
        echo $search = $_POST['search'];   
           
       }         
            
    ?>  
        
            
            
            
 <div class="card my-4">
<h4>blog serach</h4>
<form action="" method="post">
<div class="card-body">
<input name="search" type="text" class="form-control" placeholder="Search.....">
    <span class="input-group-btn">
<button name="submit" class="btn btn-default" type="submit">submit
    <span class="input-group-btn"></span>    
        
        </button>    
    
    </span>
    
    
    </div>    
    
    </form>

</div>      
            
      
            
                       
            
            <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php  include "includes/footer.php"; ?>


