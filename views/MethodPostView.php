<?php 
/** @file MethodPostView.php
 * HTML home page of the website
  * 
 * @brief HTML view which displays the MethodPost page
*/

ob_start();
?>

<h1 class="title">Request method POST</h1>
<div class="line"></div>
<div class="intro">The POST request method send the data enclosed in the 
body of the request message to a web server, most likely for storing it.
It is often used when uploading a file or when submitting a completed Web form.
It should be used only when the HTTP request method GET is not suitable 
for search engine optimisation (SEO) among other things like
giving the user the possibility to bookmark pages.</div>

<h3>Quickxo's front controller handles HTTP request method POST.</h3>
	
<p>The front controller doesn't differentiate the HTTP request method 
GET from the POST. In the table bellow, the user checks a selection of 
server environment variables to get their values back from the server.
Once desired variables are checked, the user clicks on the POST button to send
the corresponding request and to retieve the associated values.	
</p>
<br />
<h3>Server and execution environment information</h3>
<div class="form-container">
	<form class="forms" action="?command=MethodPost" method="post">
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
			<br /><br />
			<h3>Server response</h3>
			<textarea readonly name="message" class="text-area"><?php echo $serverEnvInfo ?></textarea>
		</fieldset>
	</form>
</div>

<br />
<div class="clear"></div>
<div class="line"></div>
<h2>Choice between GET and POST</h2>
<p>
	In this example, GET was not a suitable choice 
	because of the high number of parameters (33) 
	leading to a visually too long URL, being not 
	user and search engine friendly.
	Apart from that, their operation is identical.
</p>	
	
<?php 
$head = "";
$page = "HTTP POST";
$content = ob_get_clean();
$title = "HTTP POST"; 
require 'MasterPage.php';
?>	