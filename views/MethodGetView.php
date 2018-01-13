<?php 
/** @file MethodGetView.php
 * HTML MethodGet page of the website
  * 
 * @brief HTML view which displays the MethodGet page
*/

ob_start();
?>

<link rel="stylesheet" href="public/css/highlight/vs.css">
<script src="public/js/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

<script type="text/javascript">
	function getSelectedServerInfo() {
    	var e = document.getElementById("serverinfo"); 
		
		return e.options[e.selectedIndex].text;
	}	
</script> 

<?php 
$head = ob_get_clean();
ob_start();
?>	

<h1 class="title">Request method GET</h1>
<div class="line"></div>
<div class="intro">As usual, HTTP request method GET requests a 
specified resource, to retrieve data from the server. It should be 
preferred over the HTTP request method POST when possible
for search engine optimisation (SEO) among other things like
giving the user the possibility to bookmark pages.</div>

<h3>Quickxo's front controller handles HTTP request method GET.</h3>
	
<p>The front controller doesn't differentiate the HTTP request method 
GET from the POST. With the combobox bellow, the user selects a 
pre-defined server environment variable to get its value from the server.
Once a variable is selected, the user clicks on the Get value button to send
the corresponding GET request to retieve the associated value.	
</p>

<select id="serverinfo">
	<option value="REQUEST_METHOD">REQUEST_METHOD</option>
	<option value="QUERY_STRING">QUERY_STRING</option>
	<option value="SCRIPT_NAME">SCRIPT_NAME</option>
	<option value="SCRIPT_FILENAME">SCRIPT_FILENAME</option>
	<option value="SERVER_SOFTWARE">SERVER_SOFTWARE</option>
	<option value="HTTP_REFERER">HTTP_REFERER</option>
	<option value="SERVER_PROTOCOL">SERVER_PROTOCOL</option>
	<option value="GATEWAY_INTERFACE">GATEWAY_INTERFACE</option>
</select> 

<script type="text/javascript">
	$(document).ready(function () {
	  $("#serverinfo").val("<?php echo $envInfoName ?>").change();
	});	
</script> 

<a onclick="window.location.href = '?command=MethodGet&envInfoName=' + getSelectedServerInfo();" class="button blue">GET</a>

<br />
  <h2>Server response</h2>
  <table>
	<tr>
	  <th><h4>Requested information</h4></th>
	  <th><h4>Server environment information</h4></th>
	</tr>
	<tr>
	  <td><?php echo $envInfoName ?></td>
	  <td><?php echo $serverEnvInfo ?></td>
	</tr>
  </table>	
<br />
<div class="clear"></div>
<div class="line"></div>

<h2>Quickxo's operating mode is simple and straightforward</h2>
<p>MVC design pattern benefits</p>
<ul>
	<li>Easy URLs: to get SERVER_SOFTWARE information, the query string is 
	command=MethodGet&envInfoName=SERVER_SOFTWARE</li>
	<li>Clear design: all the presentation of this page is in a sigle file, 
	MethodGetView.php. No business logic is mingled with the design logic.</li>			
	<li>Organized business logic: One single location, the dedicated controller, 
	which is MethodGetCommand.php for this page. Easy to debug and convenient 
	to test.</li>			
</ul>
<div class="clear"></div>
<div class="line"></div>	
<h2>Importance of the separation of concerns</h2>
<p>Looking at the controller of the page, the action class
MethodGetCommand acts by its function doExecute:</p>
<pre><code class="php">
/** @class MethodGetCommand
*  @brief Action class of the MethodGet view
*
* Override the doExecute($request) function to implement view specific logic 
*/
class MethodGetCommand extends Command {

/** 
 * Include MethodGet view HTML code to be returned to the client's browser
 */
public function doExecute($request) {
	$envInfoName = isset($request['envInfoName']) ? $request['envInfoName'] : 'REQUEST_METHOD';   
	$serverEnvInfo = $_SERVER['' . $envInfoName . ''];
	include(views_path . 'MethodGetView.php');
}
} 
</code></pre>

<p>More precisely on the following line:</p>

<pre><code class="php">...
	$serverEnvInfo = $_SERVER['' . $envInfoName . ''];
</code></pre>	

<p>Since there is one single line, the temptation is great 
not to follow the MVC rules: Why not do a direct include 
of this single line directly in the PHP file MethodGetView.php dedicated to 
the design ? The result would be exactly the same and at the
same time, there is even no need to use the controller at all.</p>

<p>It would be an example of <a href="https://en.wikipedia.org/wiki/Technical_debt" class="active">"technical debt"</a>.
Choosing the easy solution will produce a software system that lacks a 
perceivable architecture: Difficult to debug and to test, and above all
that complicates the development process.
</p>

<p>Quickxo uses plain PHP as templating language. Therefore, 
view PHP pages should use only a small subset of the PHP language, mainly display 
instructions, along with loops and conditional statements. 
</p>	
	
<?php 
$page = "HTTP GET";
$content = ob_get_clean();
$title = "HTTP GET"; 
require 'MasterPage.php';
?>		