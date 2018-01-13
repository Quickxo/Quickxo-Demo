<?php 
/** @file AjaxPostView.php
 * HTML AjaxPostView page of the website
  * 
 * @brief HTML view which displays the AjaxPostView page
*/

ob_start();
?>

<link rel="stylesheet" href="public/css/highlight/vs.css">
<script src="public/js/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

<?php 
$head = ob_get_clean();
ob_start();
?>	

<h1 class="title">Ajax method POST</h1>
<div class="line"></div>
<div class="intro">Like for Ajax method GET, jQuery and any other Ajax library rely 
on XMLHttpRequest 
Javascript API to send Ajax POST calls.</div>

<h3>Ajax POST load data from the server using a HTTP POST request.</h3>
	
<p>In the table bellow, the user checks a selection of 
server environment variables to get their values back from the server using an Ajax 
POST call ny clicking on the POST button to send
the corresponding request and to retieve the associated values. Only
the textarea under the table will be updated.</p>

<br />
<h2>Server and execution environment information</h2>
<div class="form-container">
	<form id="envInfo" class="forms" action="?command=MethodPost" method="post">
		<fieldset>
			<table>
				<tr>
					<th colspan="3"><h4>Check desired server information</h4></th>
				</tr>
				<tr>
					<td><input type="checkbox" name="check_list[]" value="GATEWAY_INTERFACE">GATEWAY_INTERFACE</td>
					<td><input type="checkbox" name="check_list[]" value="SERVER_ADDR">SERVER_ADDR</td>
					<td><input type="checkbox" name="check_list[]" value="SERVER_NAME">SERVER_NAME</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="check_list[]" value="SERVER_SOFTWARE">SERVER_SOFTWARE</td>
					<td><input type="checkbox" name="check_list[]" value="SERVER_PROTOCOL">SERVER_PROTOCOL</td>
					<td><input type="checkbox" name="check_list[]" value="REQUEST_METHOD">REQUEST_METHOD</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="check_list[]" value="REQUEST_TIME">REQUEST_TIME</td>
					<td><input type="checkbox" name="check_list[]" value="REQUEST_TIME_FLOAT">REQUEST_TIME_FLOAT</td>		
					<td><input type="checkbox" name="check_list[]" value="QUERY_STRING">QUERY_STRING</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="check_list[]" value="DOCUMENT_ROOT">DOCUMENT_ROOT</td>
					<td><input type="checkbox" name="check_list[]" value="HTTP_ACCEPT">HTTP_ACCEPT</td>
					<td><input type="checkbox" name="check_list[]" value="HTTP_ACCEPT_CHARSET">HTTP_ACCEPT_CHARSET</td>
				</tr>	
				<tr>
					<td><input type="checkbox" name="check_list[]" value="HTTP_ACCEPT_ENCODING">HTTP_ACCEPT_ENCODING</td>
					<td><input type="checkbox" name="check_list[]" value="HTTP_ACCEPT_LANGUAGE">HTTP_ACCEPT_LANGUAGE</td>
					<td><input type="checkbox" name="check_list[]" value="HTTP_CONNECTION">HTTP_CONNECTION</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="check_list[]" value="HTTP_HOST">HTTP_HOST</td>
					<td><input type="checkbox" name="check_list[]" value="HTTP_REFERER">HTTP_REFERER</td>
					<td><input type="checkbox" name="check_list[]" value="HTTP_USER_AGENT">HTTP_USER_AGENT</td>
				</tr>	
				<tr>
					<td><input type="checkbox" name="check_list[]" value="HTTPS">HTTPS</td>
					<td><input type="checkbox" name="check_list[]" value="REMOTE_ADDR">REMOTE_ADDR</td>		
					<td><input type="checkbox" name="check_list[]" value="REMOTE_HOST">REMOTE_HOST</td>
				</tr>	
				<tr>
					<td><input type="checkbox" name="check_list[]" value="REMOTE_PORT">REMOTE_PORT</td>
					<td><input type="checkbox" name="check_list[]" value="REMOTE_USER">REMOTE_USER</td>
					<td><input type="checkbox" name="check_list[]" value="REDIRECT_REMOTE_USER">REDIRECT_REMOTE_USER</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="check_list[]" value="SCRIPT_FILENAME">SCRIPT_FILENAME</td>
					<td><input type="checkbox" name="check_list[]" value="SERVER_ADMIN">SERVER_ADMIN</td>
					<td><input type="checkbox" name="check_list[]" value="SERVER_PORT">SERVER_PORT</td>
				</tr>		
				<tr>
					<td><input type="checkbox" name="check_list[]" value="SERVER_SIGNATURE">SERVER_SIGNATURE</td>		
					<td><input type="checkbox" name="check_list[]" value="PATH_TRANSLATED">PATH_TRANSLATED</td>
					<td><input type="checkbox" name="check_list[]" value="SCRIPT_NAME">SCRIPT_NAME</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="check_list[]" value="REQUEST_URI">REQUEST_URI</td>
					<td><input type="checkbox" name="check_list[]" value="PATH_INFO">PATH_INFO</td>		
					<td><input type="checkbox" name="check_list[]" value="ORIG_PATH_INFO">ORIG_PATH_INFO</td>		
				</tr>
			</table>
			<input type="submit" value="POST" class="btn-submit">
		</form>	

		<script type="text/javascript">
			$("#envInfo").submit(function(event){
				var data = {'check_list[]' : []};
				
				event.preventDefault();
				$(":checked").each(function(){
					data['check_list[]'].push($(this).val());
				});
				$.post("?command=XHRAjaxPost", 
						data, 
						function(result){$('.text-area').html(result);});
			});	
		</script> 
		<br /><br />
		<h2>Server response</h2>
		<textarea readonly name="message" class="text-area"></textarea>
	</fieldset>
</div>

<br />
<div class="clear"></div>
<div class="line"></div>
<h2>Ajax calls are processed like standard HTTP requests</h2>
<p>Clicking on the POST button runs the following Javascript code: 
</p>	
<pre><code class="JavaScript">
$("#envInfo").submit(function(event){
	var data = {'check_list[]' : []};
	
	event.preventDefault();
	$(":checked").each(function(){
		data['check_list[]'].push($(this).val());
	});
	$.post("?command=XHRAjaxPost", 
			data, 
			function(result){$('.text-area').html(result);});
});		
</code></pre>	

<p>This time, the POST request is sent to the front controller which instanciate 
the class XHRAjaxPostCommand: </p>

<pre><code class="JavaScript">
	$.post("?command=XHRAjaxPost",
</code></pre>

<p>Quickxo processes Ajax POST request like a standard HTTP request.
For a better separation between standard calls and Ajax calls, all
Ajax controllers and views begin with the prefix XHR (like XmlHttpRequest)
but it is not required. All corresponding Ajax files are grouped together 
and they have the same name as the view to which they belong, but with the 
prefix XHR.</p>		

<div class="clear"></div>
<div class="line"></div>
<h2>What about a dispatcher or an Ajax Handler ?</h2>	
<p>If necessary, a special dispatcher can be implemented to handle Ajax calls. For example, the method
getCommand($command) of the class Controller is a convenient place 
to route incoming Ajax requests. Otherwise, an Ajax	handler could be 
placed in the controllers folder so that all Ajax request could be sent to it.</p>

<?php 
$page = "jQuery.post()";
$content = ob_get_clean();
$title = "jQuery.post()"; 
require 'MasterPage.php';
?>		
