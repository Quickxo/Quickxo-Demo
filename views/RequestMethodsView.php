<?php 
/** @file RequestMethodsView.php
 * HTML Request Methods page of the website
  * 
 * @brief HTML view which displays the Request Methods page
*/

ob_start();
?>

<h1 class="title">Request Methods</h1>
<div class="line"></div>
<div class="intro">HTTP defines methods to indicate the desired action to be 
performed on the identified resource. The HTTP/1.0 specification defined the 
GET, POST and HEAD methods and the HTTP/1.1 specification added 5 new methods: 
OPTIONS, PUT, DELETE, TRACE and CONNECT. <br />

Any client can use any method and the server can 
be configured to support any combination of methods. There is no limit to the 
number of methods that can be defined and this allows for future methods to be 
specified without breaking existing infrastructure. 
For example, WebDAV defined 7 new methods and RFC 5789 specified 
the PATCH method.<br />

This demo Website shows 
</div>

<h3>Quickxo is designed to accommodate changes</h3>

<p>By adapting the method Run of the class Controller from the file Controller.php,
Quickxo can be extended to support any request method, existing or not.</p>

<p>By default, Quickxo supports HTTP GET and HTTP POST request methods.</p>

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