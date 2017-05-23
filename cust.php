<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>CONFERENCE REGISTRATION SYSTEM</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
$error ="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
   if(!empty($_POST['idnumber']))    
   {
      if(!empty($_POST['password']))
	  {
            include "connection.php";

	        // to create a query to be executed in sql
	        $idnum = $_POST['idnumber'];
	        $pass = $_POST['password'];
	        $query = "SELECT * FROM customer WHERE id_number = '$idnum' AND password = '$pass'";

	        // to run sql query in database
	        $result = mysql_query($query) or die(mysql_error());
	     
		    //Check whether the query was successful or not
	        if(isset($result)) 
			{
		        if(mysql_num_rows($result) == 1) 
				{
			        //Login Successful
			        $_SESSION['uname'] = $_POST['idnumber'];
                    header('Location:index.php');
					exit();
		        }
		        else 
				{
			        //Login failed
			        $error ="Invalid UserName or Password!";
			    }
	        }
	        else 
		    {
		        die("Query failed");
	        }
	  }
	  else
	  {
	       $error ="Please input Password!";
	  }
   }
   else
      $error ="Please input username!";
}
?>
<div id="body_main">
<div id="top">   	
			<marquee><h1>WELCOME TO CONFERENCE REGISTRATION SYSTEM</h1></marquee>    
  </div>
     
   
     
     
     
<div id="menu">
        <ul>
            <li><a href="account.php" target="_parent" >Home</a></li>
            <li><a href="aboutus.php" target="_parent" >About Us</a></li>
			<li><a href="promotion.php" target="_parent">Latest Promotion</a></li>
            <li><a href="gallery.php" target="_parent">Album Gallery</a></li>
			<li><a href="gowns.php" target="_parent">Gowns</a></li>  
            <li><a href="cust.php" class="current">Customer File</a></li> 
            <li><a href="contact.php" target="_parent">Contact Us</a></li>   			
        </ul> 
    </div> <!-- end of menu -->
    
    <div id="content">
    <div class="cleaner_with_height">&nbsp;</div>
	<div class="cleaner_with_height">&nbsp;</div>
    	
			<div class="login_section1">
			<h2>For Existing Customer Only</h2>
			<h5>Please Login</h5>
				<div class="login_section_content1">
        			<form method="post" action="cust.php" >
						<h3>USERNAME :  <input type="text" name="username"></h3>
					   	<h3>PASSWORD :  <input type="password" name="password"></h3>
						<br>
						<br>
					    <h3><input type="submit"  class="button" value="LOGIN">&nbsp;&nbsp;&nbsp;<h5>First time visiting us? Register <a href="reg.php">Here</a>&nbsp; </h5>
                     </form><br>
	
				</div>
			</div>
                        
             <div class="cleaner_with_height">&nbsp;</div>
			<div class="cleaner_with_height">&nbsp;</div>
       
        
        
        <div class="cleaner">&nbsp;</div>
    </div>
    
     <div id="footer_panel">
     
        <div id="footer_right">
            Copyright © 2015<br />
        </div>
        
        <div class="cleaner">&nbsp;</div>
    </div>
</div>

</html>