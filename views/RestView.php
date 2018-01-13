<?php 
/** @file RestView.php
 * HTML Rest page of the website
  * 
 * @brief HTML view which displays the Rest page
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

<h1 class="title">Rest</h1>
<div class="line"></div>
<div class="intro">REST-compliant (REpresentational State Transfer) Web services 
allow requesting systems to access and manipulate textual representations of Web resources 
using a uniform and predefined set of stateless operations.</div>

<h3>Applied to Web services</h3>
	
<p>Web service APIs that adhere to the REST architectural constraints are 
called RESTful APIs. HTTP-based RESTful APIs are defined with the 
following aspects:</p> 

<ul>
	<li>Base URL, such as http://api.example.com/resources</li>
	<li>An internet media type that defines state transition data elements (e.g., Atom, microformats, application/vnd.collection+json, etc.)</li>
	<li>Standard HTTP methods (e.g., OPTIONS, GET, PUT, POST, and DELETE)</li>
</ul>

<p>In this website, only POST will be used, with JSON as serialization format.</p> 

<h3>REST Web services implementation</h3>
	
<p>The user can select a server variable below and consume the dedicated REST 
Web service by submitting the form with the GET method.</p>   

<?php
if (extension_loaded('curl')){ 
?> 
<div class="form-container">
	<form class="forms" action="" method="get">
		<input type="hidden" name="command" value="Rest" /> 
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
					<div class="response">RestServer response: <?php echo $restResponse; ?></div>
				</li>				
				<li class="form-row text-area-row">
					<h3>Rest response dumping</h3>
					<textarea readonly class="text-area required"><?php 
					if (!empty($info)){
						echo "status: " . $restStatus . "\n";
						echo "status_message: " . $restStatusMessage . "\n";
						echo "data: " . $restResponse . "\n\n";
						echo "content_type: " . (isset($info['content_type']) ? $info['content_type'] : "") . "\n";
						echo "url: " . (isset($info['url']) ? $info['url'] : "") . "\n";
						echo "http_code: " . (isset($info['http_code']) ? $info['http_code'] : "") . "\n";
						echo "header_size: " . (isset($info['header_size']) ? $info['header_size'] : "") . "\n";
						echo "request_size: " . (isset($info['request_size']) ? $info['request_size'] : "") . "\n";
						echo "filetime: " . (isset($info['filetime']) ? $info['filetime'] : "") . "\n";
						echo "ssl_verify_result: " . (isset($info['ssl_verify_result']) ? $info['ssl_verify_result'] : "") . "\n";
						echo "redirect_count: " . (isset($info['redirect_count']) ? $info['redirect_count'] : "") . "\n";
						echo "total_time: " . (isset($info['total_time']) ? $info['total_time'] : "") . "\n";
						echo "namelookup_time: " . (isset($info['namelookup_time']) ? $info['namelookup_time'] : "") . "\n";
						echo "connect_time: " . (isset($info['connect_time']) ? $info['connect_time'] : "") . "\n";
						echo "pretransfer_time: " . (isset($info['pretransfer_time']) ? $info['pretransfer_time'] : "") . "\n";
						echo "size_upload: " . (isset($info['size_upload']) ? $info['size_upload'] : "") . "\n";
						echo "size_download: " . (isset($info['size_download']) ? $info['size_download'] : "") . "\n";
						echo "speed_download: " . (isset($info['speed_download']) ? $info['speed_download'] : "") . "\n";
						echo "speed_upload: " . (isset($info['speed_upload']) ? $info['speed_upload'] : "") . "\n";
						echo "download_content_length: " . (isset($info['download_content_length']) ? $info['download_content_length'] : "") . "\n";
						echo "upload_content_length: " . (isset($info['upload_content_length']) ? $info['upload_content_length'] : "") . "\n";
						echo "starttransfer_time: " . (isset($info['starttransfer_time']) ? $info['starttransfer_time'] : "") . "\n";
						echo "redirect_time: " . (isset($info['redirect_time']) ? $info['redirect_time'] : "") . "\n";
						echo "primary_ip: " . (isset($info['primary_ip']) ? $info['primary_ip'] : "") . "\n";
						echo "primary_port: " . (isset($info['primary_port']) ? $info['primary_port'] : "") . "\n";
						echo "local_ip: " . (isset($info['local_ip']) ? $info['local_ip'] : "") . "\n";
						echo "local_port: " . (isset($info['local_port']) ? $info['local_port'] : "") . "\n";
						echo "redirect_url: " . (isset($info['redirect_url']) ? $info['redirect_url'] : "") . "\n";
						echo "request_header: " . (isset($info['request_header']) ? $info['request_header'] : "") . "\n";
					}?>		
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
show request_header: POST /Quickxo/index.php?command=RestServer HTTP/1.1 <br><br>
This means that the controller RestCommand class uses method POST from HTTP/1.1 protocol 
to consume getServerInfo REST Web service implemented in the dedicated 
controller RestServerCommand.php.</p>	

<div class="clear"></div>
<div class="line"></div>

<h3>PHP REST server</h3>   

<p>Unlike SOAP with SoapServer, there isn't any native PHP REST Class.
A simple REST server is implemented in a dedicated controller RestServerCommand.php.</p>	

<pre><code class="php">
class RestServerCommand extends Command {
	
	/** 
	 * Just run a simple Rest Server, without including 
	 * the view HTML code to be returned to the client's browser
	 */
	public function doExecute($request) {
		try {
			header("Content-Type:application/json");
	 		$status = 400;
			$status_message = "Invalid Request";
			$data = null;
			
			if (isset($request['envInfoName'])){
				$envInfoName = $request['envInfoName'];
				$data = getServerInfo($envInfoName);
				$status = 200;
				$status_message = "OK";
			}
			
			header("HTTP/1.1 " . $status);	
			$response['status'] = $status;
			$response['status_message'] = $status_message;
			$response['data'] = $data;
			$json_response = json_encode($response);
			echo $json_response;			
		}
		catch (Exception $e){ 
			die("RestServer error: " . $e->getMessage() . "");
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

<div class="clear"></div>
<div class="line"></div>

<h3>PHP REST client</h3>   

<p>Unlike SOAP with SoapClient, no REST client is natively available in PHP.
However, PHP supports libcurl, a library which allows to connect and communicate 
to many different types of servers with many different types of protocols.</p>

<p>With cURL, a REST client will be instanciated in the controller of the Rest view 
in order to consume the getServerInfo REST webservice described above.</p>

<pre><code class="php">
  public function doExecute($request) {
	$restResponse = "";
	$restStatus = "";
	$restStatusMessage = "";
	$envInfoName = "";
	$info = "";
	$envInfoName = (isset($request['envInfoName'])) ? $request['envInfoName'] : "REQUEST_METHOD"; 
	if (isset($request['envInfoName'])){  
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . '?command=RestServer';
		$client = curl_init();
		$data = array('envInfoName' => $envInfoName);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_URL, $url);
		curl_setopt($client, CURLOPT_POST, 1);
		curl_setopt($client, CURLOPT_POSTFIELDS, $data);
		curl_setopt($client, CURLINFO_HEADER_OUT, 1);
		$response = curl_exec($client);
		$result = json_decode($response);	
		$restResponse = $result->data; 
		$restStatus = $result->status;
		$restStatusMessage = $result->status_message;
		$info = curl_getinfo($client); 
		curl_close($client);
	}
	
    include(views_path . 'RestView.php');
  }
</code></pre>

<p>With cURL, a HTTP session is created towards 
http://localhost/Quickxo/index.php?command=RestServer to send a POST request 
for getServerInfo webservice:</p>

<pre><code class="php">
...
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . '?command=RestServer';
$client = curl_init();
$data = array('envInfoName' => $envInfoName);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_URL, $url);
curl_setopt($client, CURLOPT_POST, 1);
curl_setopt($client, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($client);
$result = json_decode($response);	
...
  }
</code></pre>

<p>REST server serializes its response under the JSON format.
Compared to SOAP, REST seems slower. In reality, it is often the opposite
because REST JSON data is lighter than SOAP XML one. In this demo website,
REST server is in PHP and instanciates an extenal library for HTTP requests.</p>

<div class="clear"></div>
<div class="line"></div>

<h3>Quickxo front controller handles REST webservices</h3>   

<p>The REST client sends its request to the server via Quickxo front controller: 
<br><br>
http://localhost/Quickxo/index.php?command=RestServer
<br><br>
Although it is not mandatory, this allows a better control for more security
and mostly it simplifies the process which considers the REST server as a controller 
without its associated view as it is bound to its client.</p>

<p>Nevertheless, it is also possible to instanciate the REST server directly
without involving Quickxo's front controller, storing its class in the unrestricted public folder
for example. </p>

<?php	
}
else{
	echo "CURL PHP extension not loaded.<br>";
	echo "To run the content of this page, CURL PHP extension has to be loaded.";
}
?> 
	
<?php 
$page = "Rest";
$content = ob_get_clean();
$title = "REST"; 
require 'MasterPage.php';
?>	