<?php 
/** @file AjaxView.php
 * HTML Ajax page of the website
 * 
 * @brief HTML view which displays the Ajax page
 */
 
ob_start();
?>

<h1 class="title">Ajax</h1>
<div class="line"></div>
<div class="intro">This website uses jQuery to perform asynchronous HTTP (Ajax) requests.
Whether it was another Javascript library or simply plain Javascript does not
modify the way Ajax calls are processed by Quickxo.</div>

<h3>Ajax calls are processed like any other HTTP requests.</h3>

<p>The front controller will not make any distinction between
Ajax requests and standard requests. It will instanciate the targetted 
action class to run its action command. This mechanism is simple and 
straigtforward in order to keep Quickxo easy to use.</p>

<p>If needed, for more separation of concerns for example, a dispatcher 
can quickly replace this mechanism without special difficulty.</p>	

<div class="clear"></div>
<div class="line"></div>

<div class="one-half">
<h3><a href="?command=AjaxGet"><img src="public/images/Get.png" alt="" />jQuery.get()</a></h3>
<p>A dedicated form is available from the sub-item jQuery.get()
of the Ajax menu item to submit its parameters with the jQuery HTTP GET method.</p>
</div>

<div class="one-half last">
<h3><a href="?command=AjaxPost"><img src="public/images/Post.jpg" alt="" />jQuery.post()</a></h3>
<p>A dedicated form is available from the sub-item jQuery.post()
of the Ajax menu item to submit its parameters with the jQuery HTTP POST method.</p>
</div>
	
<?php 
$head = "";
$page = "Ajax";
$content = ob_get_clean();
$title = "Ajax"; 
require 'MasterPage.php';
?>