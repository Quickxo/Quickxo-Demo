<?php 
/** @file HomeView.php
 * HTML home page of the website
 * 
 * @brief HTML view which displays the home page
 */
 
ob_start();
?>

<h1 class="title">Welcome to Quickxo demo website</h1>
<div class="line"></div>
<div class="intro">This <a href="https://github.com/Quickxo">Quickxo</a> powered website shows how easy it is to 
create an HTML5/CSS3/Javascript based design clearly and neatly separated
from its business logic.</div>

<h3>Model2 and Passive View MVC variation</h3>

<p>Quickxo implements Model2. This MVC variation is the MVC Pattern for Web Applications
where all website's requests go to a front controller, which in turn figures out the appropriate 
controller to run depending on the structure of the incoming request URL.</p>

<p>Quickxo implements also MVP-Passive View. This other MVC variation implies a complete isolation
	of the view from the model. The view is updated/created by the presenter
	which communicate with the model.</p>

<div class="one-half">
<h3><img src="public/images/struts.png" alt="" />Model2</h3>
<p>Front Controller based and appropriate controller defined by
the structure of the URL.</p>
</div>

<div class="one-half last">
<h3><img src="public/images/android.png" alt="" />Passive View</h3>
<p>The view is isolated from the model. The controller performs
all the business logic, allowing the view to manage only the design of the webpage.</p>
</div>
   
<div class="clear"></div>
<div class="line"></div>

<h3>Quickxo is Front Controller based</h3>

<p>The Front Controller is defined as “a controller that handles 
all requests for a Web site”.</p>

<p>That for, performance considerations could be a liabilitie
if it is not taken care closely of performance problems, because if 
it must perform a database query or a query of an XML document to make decisions, 
performance could be very slow as a result.</p>

<p>Front Controller design pattern often leads to passive views because 
it centralizes all business functions and supports infrastructure 
concerns such as authorization, security, and the rendering of views. 
The view in the Front Controller pattern is completely passive and is rendered by 
the command that handles the request.</p>

<ul>
	<li>The client's browser sends a request to the server, mandatorily through <b>index.php</b> which contains the front controller logic. This is 
	the Front Controller design pattern.</li>
	<li>The front controller identifies from the URL the corresponding action command and instanciate it.</li>
	<li>The action class of the requested view starts by updating and querying the model accordingly to the parameters 
	of the request.</li>
	<li>The dynamic content of the requested view is computed and the corresponding view is included
	at the end of the process.</li>
	<li>The view applies the design with the data calculated in the previous step and uses plain PHP as 
	templating language.</li>
	<li>The server sends the corresponding HTML code back to the client's browser.</li>
</ul>

<div class="clear"></div>
<div class="line"></div>

<h3>Master page</h3>

<p>This demo website is built using a common HTML layout shared among all 
pages to avoid code duplication for menu and scripts. Hence, each view
contains only its specific content: title, main content and scripts. These 
elements are coded with PHP output buffering for a better readability
as in a standard HTML page: ob_start(), ob_get_clean() and inclusion of the
<a href="https://github.com/Quickxo/Quickxo-Demo/blob/master/views/MasterPage.php">Masterpage</a> at the end of each view.</p>

<ul>
	<li>$head: contains the scripts to add to the existing Masterpage Head section.</li>
	<li>$page: contains the name of the current page to distinguish the selected menu entry.</li>
	<li>$content: The content of the page.</li>
	<li>$title: The title of the page.</li>
</ul>

The bottom of each page ends with a require 'MasterPage.php'; command
to include the shared content.<br><br>

<p>This layout is not mandatory and the use of a Masterpage is optional.</p>

<!-- Begin Footer -->
<div id="footer">
<p class="blocktext">Quickxo's folder structure</p>
<div class="footer-box one-third">
<h3>Model</h3>
<ul class="popular-posts">
	<li>
		<a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/models"><img src="public/images/folder.png" alt="" /></a>				
		<h5><a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/models">Folder: models</a></h5>
		<span>Class: Db</span>
	</li>			
	<li>
		<a href="https://www.sqlite.org/"><img src="public/images/sqlite.png" alt="" /></a>
		<h5><a href="https://www.sqlite.org/">Database: SQLite 3</a></h5>
		<span>Northwind</span>
	</li>
</ul>
</div>
<div class="footer-box one-third">
<h3>View</h3>
<ul class="popular-posts">
	<li>
		<a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/views"><img src="public/images/folder.png" alt="" /></a>				
		<h5><a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/views">Folder: views</a></h5>
		<span>Class: None</span>
		<span>Plain PHP, HTML, CSS, Javascript</span>
	</li>	
	<li>
		<a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/public"><img src="public/images/folder.png" alt="" /></a>				
		<h5><a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/public">Folder: public</a></h5>
		<span>Class: None</span>
		<span>Images, CSS, Javascript, resources</span>
	</li>			
</ul>
</div>

<div class="footer-box one-third last">
<h3>Controller</h3>
<ul class="popular-posts">
	<li>
		<a href="https://github.com/Quickxo/Quickxo-Demo/blob/master/index.php"><img src="public/images/file.png" alt="" /></a>				
		<h5><a href="https://github.com/Quickxo/Quickxo-Demo/blob/master/index.php">File: index.php</a></h5>
		<span>Class: None</span><br />
		<span>Front Controller</span>
	</li>	
	<li>
		<a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/controllers"><img src="public/images/folder.png" alt="" /></a>				
		<h5><a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/controllers">Folder: controllers</a></h5>
		<span>Class: Controller</span>
	</li>			
	<li>
		<a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/controllers/commands"><img src="public/images/folder.png" alt="" /></a>				
		<h5><a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/controllers/commands">Folder: commands</a></h5>
		<span>Class: Command</span>
		<span>Class: Any extended from Command</span>
	</li>	
	<li>
		<a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/controllers/commands/classes"><img src="public/images/folder.png" alt="" /></a>				
		<h5><a href="https://github.com/Quickxo/Quickxo-Demo/tree/master/controllers/commands/classes">Folder: classes</a></h5>
		<span>Class: Dedicated location for controllers helper classes</span>
	</li>
</ul>
</div>
</div>

<?php 
$head = "";
$page = "Home";
$content = ob_get_clean();
$title = "Quickxo demo website"; 
require 'MasterPage.php';
?>	