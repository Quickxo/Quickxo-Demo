<?php 
/** @file RequestMethodsView.php
 * HTML Request Methods page of the website
  * 
 * @brief HTML view which displays the Request Methods page
*/

ob_start();
?>

<h1 class="title">Request methods</h1>
<div class="line"></div>
<div class="intro">The two most used HTTP methods are GET and POST. Quickxo
handles these methods with the $_REQUEST 'superglobal' at the front controller level.
This demo Website shows the processing of both there methods.
</div>

<h3>Request methods processing is perfomed in the controllers</h3>

<p>Whatever the method, the front controller identifies the controller in charge of
the processing and forward to it the $_REQUEST 'superglobal'.</p>

<p>By default, Quickxo supports HTTP GET and HTTP POST request methods indistinctly.</p>

<div class="one-half">
<h3><a href="?command=MethodGet"><img src="public/images/Get.png" alt="" />HTTP GET</a></h3>
<p>A dedicated form is available from the sub-item HTTP GET
of the Request Methods menu item to submit its parameters
   with the HTTP GET method.</p>
</div>

<div class="one-half last">
<h3><a href="?command=MethodPost"><img src="public/images/Post.jpg" alt="" />HTTP POST</a></h3>
<p>A dedicated form is available from the sub-item HTTP POST
of the Request Methods menu item to submit its parameters
   with the HTTP POST method.</p>
</div>
   
<div class="clear"></div>
	
<?php 
$head = "";
$page = "Request Methods";
$content = ob_get_clean();
$title = "Request Methods"; 
require 'MasterPage.php';
?>		