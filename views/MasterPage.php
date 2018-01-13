<?php 
/** @file MasterPage.php
 * HTML common content of the website
 * 
 * @brief HTML code to be included in all the pages
 * of the website
 */
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title><?php echo $title ?></title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="public/css/style.css" media="all" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="public/css/ie7.css" media="all" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="public/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="public/css/ie9.css" media="all" />
<![endif]-->
<script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="public/js/ddsmoothmenu.js"></script>
<?php echo $head ?>
</head>
<body>
<div id="wrapper">
	<div id="sidebar">
		<div id="logo">
			<div id="imglogo">
				<img src="public/images/Quickxo-medium.png" />
				<div id="txtlogo">
					Quickxo
				</div>					
			</div>
		</div>
    <div id="menu" class="menu-v">
      <ul>
        <li><a href="index.php" <?php echo ($page == "Home" ? 'class="active"' : '')?>>Home</a></li>
        <li><a href="?command=RequestMethods" <?php echo ($page == "Request Methods" || $page == "HTTP GET" || $page == "HTTP POST" ? 'class="active"' : '')?>>Request Methods</a>
        	<ul>
        		<li><a href="?command=MethodGet" <?php echo ($page == "HTTP GET" ? 'class="active"' : '')?>>HTTP GET</a></li>
        		<li><a href="?command=MethodPost" <?php echo ($page == "HTTP POST" ? 'class="active"' : '')?>>HTTP POST</a></li>
        	</ul>
        </li> 
        <li><a href="?command=Ajax" <?php echo ($page == "Ajax" || $page == "jQuery.get()" || $page == "jQuery.post()" ? 'class="active"' : '')?>>Ajax</a>
        	<ul>
        		<li><a href="?command=AjaxGet" <?php echo ($page == "jQuery.get()" ? 'class="active"' : '')?>>jQuery.get()</a></li>
        		<li><a href="?command=AjaxPost" <?php echo ($page == "jQuery.post()" ? 'class="active"' : '')?>>jQuery.post()</a></li>
        	</ul>
        </li>
        <li><a href="?command=Database" <?php echo ($page == "Database query" || $page == "Simple query" || $page == "Multi-pages results" ? 'class="active"' : '')?>>Database query</a>
        	<ul>
        		<li><a href="?command=DatabaseSimple" <?php echo ($page == "Simple query" ? 'class="active"' : '')?>>Simple query</a></li>
        		<li><a href="?command=DatabaseMultiple" <?php echo ($page == "Multi-pages results" ? 'class="active"' : '')?>>Multi-pages results</a></li>
        	</ul>
        </li>
        <li><a href="?command=WebServices" <?php echo ($page == "Web services" || $page == "Soap" || $page == "Rest" ? 'class="active"' : '')?>>Web services</a>
        	<ul>
        		<li><a href="?command=Soap" <?php echo ($page == "Soap" ? 'class="active"' : '')?>>SOAP</a></li>
        		<li><a href="?command=Rest" <?php echo ($page == "Rest" ? 'class="active"' : '')?>>REST</a></li>
        	</ul>
		</li>
      </ul>
    </div>
	</div>
	<div id="content">
		<?php echo $content ?>
	</div>
	<!-- End Content -->
</div>
<!-- End Wrapper -->
<div class="clear"></div>
<script type="text/javascript" src="public/js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="public/js/jquery.corner.js"></script>
<!-- <![endif]-->
</body>
</html>