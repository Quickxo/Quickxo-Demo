<?php 
/** @file AjaxGetView.php
 * HTML AjaxGet page of the website
  * 
 * @brief HTML view which displays the AjaxGet page
*/

ob_start();
?>

<link rel="stylesheet" href="public/css/highlight/vs.css">
<script src="public/js/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

<script type="text/javascript">
	function getSelectedServerInfo() {
		$('.envInfoName').html($("#serverinfo option:selected").text());
		$.get("?command=XHRAjaxGet",
			{envInfoName: $("#serverinfo option:selected").text()},
			function(data){$('.serverEnvInfo').html(data);})	
	}	
</script> 

<?php 
$head = ob_get_clean();
ob_start();
?>	

<h1 class="title">Ajax method GET</h1>
<div class="line"></div>
<div class="intro">jQuery, like any other Ajax library, rely on 
XMLHttpRequest Javascript API to send Ajax calls.</div>

<h3>Quickxo's front controller handles XMLHttpRequest Open method type GET.</h3>
	
<p>It is more common to use GET for AJAX calls. This is because when using 
XMLHttpRequest, browsers implement POST as a two-step process (sending the 
headers first and then the data). This means that GET requests are more 
responsive.</p>

<p>Select a server environment variable, click on the Get button to send the 
corresponding Ajax GET request and the retrieved associated value will be	
displayed in the table below.</p>

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

<a onclick="getSelectedServerInfo();" class="button blue">GET</a>

<br />
  <h2>Server response</h2>
  <table>
	<tr>
	  <th><h4>Requested information</h4></th>
	  <th><h4>Server environment information</h4></th>
	</tr>
	<tr>
	  <td class="envInfoName">&nbsp;</td>
	  <td class="serverEnvInfo">&nbsp;</td>
	</tr>
  </table>	
<br />
<div class="clear"></div>
<div class="line"></div>

<h2>Ajax calls are processed like standard HTTP requests</h2>
<p>Clicking on the GET button triggers a call to the following 
Javascript function: </p>

<pre><code class="JavaScript">
function getSelectedServerInfo() {
	$('.envInfoName').html($("#serverinfo option:selected").text());
	$.get("?command=XHRAjaxGet",
		{envInfoName: $("#serverinfo option:selected").text()},
		function(data){$('.serverEnvInfo').html(data);})	
}	
</code></pre>	

<p>More precisely, the GET request is sent to the front controller which instanciate 
the class XHRAjaxGetCommand: </p>

<pre><code class="JavaScript">
	$.get("?command=XHRAjaxGet",
</code></pre>	

<p>Quickxo processes Ajax GET request like a standard HTTP request.
For a better separation between standard calls and Ajax calls, all
Ajax controllers and views begin with the prefix XHR (like XmlHttpRequest)
but it is not required. All corresponding Ajax files are grouped together 
and they have the same name as the view to which they belong, but with the 
prefix XHR.</p>	

<div class="clear"></div>
<div class="line"></div>	 
<h2>Difference between Ajax GET and standard HTTP GET requests</h2>
<ul>
	<li>Light views: As one part only of the current view is updated
	instead of the complete view with a standard HTTP request </li>		
<pre><code class="php">
/** @file XHRAjaxGetView.php
* HTML XHRAjaxGet Ajax call
* 
* @brief HTML view which displays the XHRAjaxGet Ajax call
*/

echo $serverEnvInfo;
</code></pre>
	<li>Ajax speed: the amount of data sent back by the server 
	is minimum.</li>	
	<li>Error view: requesting an Ajax controller which does
	not exist will not return the same 404 error view as with
	a standard request. By default, the 404 error will be displayed in 
	the part of the view being updated.</li>
</ul>
<div class="clear"></div>
<div class="line"></div>
<h2>What about a dispatcher or an Ajax Handler ?</h2>	
<p>Quickxo keeps things simple. If necessary, a special dispatcher
can be implemented to handle Ajax calls. For example, the method
getCommand($command) of the class Controller is a convenient place 
to route incoming Ajax requests. Alternatively, a dedicated Ajax
handler could be placed in the controllers folder so that all Ajax
request could be sent to it.</p>	

<?php 
$page = "jQuery.get()";
$content = ob_get_clean();
$title = "jQuery.get()"; 
require 'MasterPage.php';
?>	