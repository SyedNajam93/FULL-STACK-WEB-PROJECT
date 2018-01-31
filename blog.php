<?php include "includes/db.php";?>     




<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Codester | Blog</title>
	<meta charset="utf-8">
	<link rel="icon" href="http://dzyngiri.com/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="http://dzyngiri.com/favicon.png" type="image/x-icon" />
    <meta name="description" content="Codester is a free responsive Bootstrap template by Dzyngiri">
    <meta name="keywords" content="free, template, bootstrap, responsive">
    <meta name="author" content="Inbetwin Networks">  
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>   
    
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>
	<script>		
		 jQuery(window).load(function() {	
		 $x = $(window).width();		
	if($x > 1024)
	{			
	jQuery("#content .row").preloader();}	
	
	jQuery(".list-blog li:last-child").addClass("last"); 
	jQuery(".list li:last-child").addClass("last"); 

	
    jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});	
  		  }); 
					
	</script>

  
  <!--Google analytics code-->	  
	  <script type="text/javascript">
           var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-29231762-1']);
          _gaq.push(['_setDomainName', 'dzyngiri.com']);
          _gaq.push(['_trackPageview']);
        
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
      </script>
	</head>

	<body>
<div class="spinner"></div>
<!--  header  -->
<header>
<div class="container clearfix">
<div class="row">
<div class="span12">
<div class="navbar navbar_">
<div class="container">
<h1 class="brand brand_"><a href="index.php"><img alt="" src="img/logo.png"> </a></h1>
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
<div class="nav-collapse nav-collapse_  collapse">
<ul class="nav sf-menu">

<li class="sub-menu"><a href="process.html">BLOG CATEGORIES</a>
<ul>
<!--WE PUT THE WHILE LOOP INSIDE THE INDEX PAHESO THAT E COULD GET MULTIPLE CATTEGORY DISPLAYING ON THE MAIN PAGE-->  
<?php         

$query = "SELECT * FROM categories";        
$select_all_categories_query = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_all_categories_query)){
$cat_title = $row['cat_title'];	
$cat_id = $row['cat_id'];	
echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a> </li>";	

}
?>  

</ul>
</li>
<li><a href="contact.html">Contact</a></li>



</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</header>


 <!---------------------------PLACING THE POST CODE HERE ------------------------>   
<!--//THIS IS THE CODE FOR THE PAGINATION/////////////////

<?php  
        
$per_page = 5;


if(isset($_GET['page'])) {


$page = $_GET['page'];

} else {


$page = "";
}


if($page == "" || $page == 1) {

$page_1 = 0;

} else {

$page_1 = ($page * $per_page) - $per_page;

}


$post_query_count = "SELECT  * FROM posts";

$find_count = mysqli_query($connection,$post_query_count);
$count = mysqli_num_rows($find_count);  
$count = ceil($count/2);        
       
//////////////////////////////////////////////////////            
        
        
        
        
$query = "SELECT * FROM posts LIMIT $page_1, 4";
$select_all_posts_query = mysqli_query($connection,$query);           


while ($row = mysqli_fetch_assoc($select_all_posts_query)) {

$post_id = $row['post_id'];  
$post_title = $row['post_title'];   
$post_author = $row['post_author'];  
$post_date = $row['post_date'];   
$post_image = $row['post_image']; 
$post_content = $row['post_content'];           
$post_comment_count = $row['post_comment_count'];
?>                               
    
<div class="bg-content">       
  <!--  content  -->      
   <div id="content"><div class="ic"></div>
    <div class="container">
          <div class="row">
        <article class="span8">
         <div class="inner-1">         
          <ul class="list-blog">
            <li>  
            <h3><a href="post.php?p_id=<?php echo $post_id; ?>"> <?php echo $post_title ?></a></h3>     
            <time datetime="2012-11-09" class="date-1"><i class="icon-calendar icon-white"></i><?php echo $post_date; ?></time>
            <div class="name-author"><i class="icon-user icon-white"></i> <a href="#"><?php echo $post_author; ?></a></div>
            <a href="#" class="comments"><i class="icon-comment icon-white"></i> <?php echo $post_comment_count; ?></a> 
            <div class="clear"></div>            
             
               <img width="500"  alt="" src="images/<?php echo $post_image; ?>">                               
              <p style="color:yellow;" ><?php echo $post_content; ?></p>
              <a href="#" class="btn btn-1">Read More</a>          
            </li>  
         
          </ul>
          </div>  
</div>
 </div>
       </div>
            
<?php } ?> 

<!--WE WILL BE ADDING PAGINATION HERE FOR THE BLOG PAGE -------------------------->
<ul class="pager">  
<?php   
for($i=1;  $i<= $count; $i++){
echo "<li><a href='blog.php?page={$i}'>{$i}</a></li>";
}
?>
</ul>

<!----------------------- footer---------------------------------------------  -->
<footer>
      <div class="container clearfix">
       <ul class="list-social pull-right">
          <li><a class="icon-1" href="#"></a></li>
          <li><a class="icon-2" href="#"></a></li>
          <li><a class="icon-3" href="#"></a></li>
          <li><a class="icon-4" href="#"></a></li>
        </ul>
    <div class="privacy pull-left">&copy; 2018 | <a href="http://www.dzyngiri.com">CODING SAIYAN : SYED NAJAM </a> | <a href="http://twitter.github.com/bootstrap/" target="_blank">Bootstrap</a> |  <a href="" target="_blank"></a></div>
  </div>
    </footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>