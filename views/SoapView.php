<?php 
/** @file SoapView.php
 * HTML Soap page of the website
 * 
 * @brief HTML view which displays the Soap page
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

<h1 class="title">Soap</h1>
<div class="line"></div>
<div class="intro">SOAP (originally Simple Object Access Protocol) is a 
protocol specification for exchanging structured information in the implementation 
of web services in computer networks. It allows processes running on disparate operating 
systems (such as Windows and Linux) to communicate using Extensible Markup Language (XML).</div>

<h3>SOAP Web services implementation</h3>
	
<p>PHP implements natively SOAP Web Services. <a href = "http://php.net/manual/en/class.soapserver.php">SoapServer</a> class 
provides a server for the SOAP 1.1 and SOAP 1.2 protocols. 
It can be used with or without a WSDL service description. 
The user can select a server variable below and consume the dedicated SOAP 
Web Service by submitting the form with the GET method.</p>   

<?php
if (extension_loaded('soap')){ 
?> 
<div class="form-container">
	<form class="forms" action="" method="get">
		<input type="hidden" name="command" value="Soap" /> 
		<fieldset>
			<ol>
				<li class="form-row select-row">
				<h3>Select server environment variable</h3>
					<select id="envInfoName" name="envInfoName" >
						<option value="REQUEST_METHOD">REQUEST_METHOD</option>
						<option value="REQUEST_URI">REQUEST_URI</option>
						<option value="QUERY_STRING">QUERY_STRING</option>
						<option value="SCRIPT_NAME">SCRIPT_NAME</option>
						<option value="SCRIPT_FILENAME">SCRIPT_FILENAME</option>
						<option value="SERVER_SOFTWARE">SERVER_SOFTWARE</option>
						<option value="REQUEST_TIME">REQUEST_TIME</option>
						<option value="SERVER_PROTOCOL">SERVER_PROTOCOL</option>
						<option value="GATEWAY_INTERFACE">GATEWAY_INTERFACE</option>
					</select>
					<script type="text/javascript">
						$(document).ready(function () {
						  $("#envInfoName").val("<?php echo $envInfoName ?>").change();
						});	
					</script>					
					<input type="submit" value="Submit" class="btn-submit" />
				</li>	
				<li class="form-row text-area-row">
					<div class="response">SoapServer response: <?php echo $soapResponse; ?></div>
				</li>				
				<li class="form-row text-area-row">
					<h3>Soap request and response dumping</h3>
					<textarea readonly class="text-area required">
						<?php 
							echo $requestHeaders;
							echo $requestContent;
							echo $responseHeaders;
							echo $responseContent;
						?>		
					</textarea>
				</li>
			</ol>
		</fieldset>
	</form>
</div>

<div class="clear"></div>
<div class="line"></div>

<h3>Explanation</h3>   

<p>The <?php echo $envInfoName ?> environment variable is sent to WebServices controller 
(command=WebServices) using method GET. But the dumped request headers
show POST /Quickxo/index.php?command=SoapServer HTTP/1.1. <br><br>
This means that SoapClient class uses method POST from HTTP/1.1 protocol 
to consume getServerInfo SOAP Web service implemented in the dedicated 
controller SoapServerCommand.php.</p>	

<p>The SOAP client sends its request to the SOAP server in an XML envelope
 as shown in the dumped request.</p>
 
<p>The SOAP server sends its response to the SOAP client indicating 
that the request has succeeded (HTTP/1.1 200 OK). The response itself 
is also an XML envelope as shown in the dumped response.</p> 

<div class="clear"></div>
<div class="line"></div>

<h3>WebServices controller</h3>   

<p>The GET request is sent to the WebServices controller which
creates an instance of the PHP native SoapClient class.</p>	

<pre><code class="php">
$client = new SoapClient(null, array(
'location' => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . '?command=SoapServer',
'uri'      => "urn:MyNamespace",
'trace'    => 1 ));			
</code></pre>

<p>The location is typically http://localhost/Quickxo/index.php?command=SoapServer.
<br>The SOAP parameter location is processed through Quickxo front controller which 
will send SoapClient's request to the native PHP SOAP server implemented in the 
SoapServer controller (Front controller design pattern).
</p>

<div class="clear"></div>
<div class="line"></div>

<h3>SoapServer controller</h3>   

<p>The SoapServer controller is a MVC controller but it does not
include any view since it is linked to the SoapClient.</p>	

<pre><code class="php">
class SoapServerCommand extends Command {
	
	/** 
	 * Just run native PHP Soap Server, without including 
	 * the view HTML code to be returned to the client's browser
	 */
	public function doExecute($request) {
		try {
			$server = new SoapServer(null, array('uri' => "urn:MyNamespace"));
			$server->addFunction("getServerInfo"); 
			$server->handle();
		}
		catch (Exception $e) { 
			die("SoapServer error: " . $e->getMessage() . " ");
		}
	}
} 		
</code></pre>

<p>The Web service is the getServerInfo function:</p>	

<pre><code class="php">
function getServerInfo($envInfo) { 
	return '$_SERVER[\'' . $envInfo . '\'] = ' . $_SERVER['' . $envInfo . ''];
} 		
</code></pre>

<p>SOAP publishes this function for any external process which needs to consume it. 
However, this Web service is not completly standalone as the communication 
between the server and the client is processed through Quickxo Front Controller, 
which allows to keep a total control over accesses for a better management of 
security and resources. At the opposite, it is also possible to isolate Web services
by placing them in a special folder with a .htaccess file authorizing direct 
external accesses, like the Quickxo public folder does.</p>	

<div class="clear"></div>
<div class="line"></div>

<h3>Quickxo front controller handles SOAP webservices</h3>   

<p>The SOAP client sends its request to the server via Quickxo front controller: 
<br><br>
http://localhost/Quickxo/index.php?command=SoapServer
<br><br>
Although it is not mandatory, this allows a better control for more security
and mostly it simplifies the process which considers the SOAP server as a controller 
without its associated view as it is bound to its client.</p>

<p>Nevertheless, it is also possible to instanciate the SOAP server directly
without involving Quickxo's front controller, storing its class in the unrestricted public folder
for example. </p>

<?php	
}
else{
	echo "SOAP PHP extension not loaded.<br>";
	echo "To run the content of this page, SOAP PHP extension has to be loaded.";
}
?> 
	
<?php 
$page = "Soap";
$content = ob_get_clean();
$title = "SOAP"; 
require 'MasterPage.php';
?>	