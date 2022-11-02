<?php
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = "/WebApps/Login/";
	$extra = 'logout.php'; 
?> 
 
		<div id = "logoutbutton">
		  <form action="<?php echo ("http://" . $host . $uri . $extra); ?>">
			 <button type="submit">Log Out</button>
		  </form>  
		</div>