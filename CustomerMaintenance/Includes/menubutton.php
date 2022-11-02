<?php
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = "/WebApps/";
	$extra = 'index.php'; 
?> 

		<div id = "menubutton">
		  <form action="<?php echo ("http://" . $host . $uri . $extra); ?>">
			 <button type="submit">Return to Menu</button>
		  </form>
		  </div>

