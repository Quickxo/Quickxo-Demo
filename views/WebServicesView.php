<?php 
/** @file WebServicesView.php
 * HTML WebServices page of the website
  * 
 * @brief HTML view which displays the WebServices page
*/

ob_start();
?>



<h1 class="title">Web services</h1>
<div class="line"></div>
<div class="intro">A Web service is a software system designed to 
support interoperable machine-to-machine interaction over a network.
The Web technology, such as HTTP, is utilized for machine-to-machine communication, more 
specifically for transferring machine-readable file formats such as XML 
and JSON.</div>

<h3>Web service and Web API</h3>
	
<p>Web services can be implemented on other reliable transport mechanisms than HTTP, like FTP
for example. Only those using HTTP will be considered. Formally, the term "web service" describes 
a standardized way of integrating web-based applications using the XML, SOAP, WSDL and UDDI open 
standards over an Internet Protocol backbone, here HTTP.</p>   

<p>A Web API, if considered server side, is a programmatic interface consisting of one or more 
publicly exposed endpoints to a defined request–response message system, typically expressed 
in JSON or XML, which is exposed via the web—most commonly by means of an HTTP-based web server.</p> 

<p>Web 2.0 web applications implement either SOAP-based web services or RESTful resources. 
RESTful web APIs are typically loosely based on HTTP methods to access resources via URL-encoded 
parameters and the use of JSON or XML to transmit data. By contrast, SOAP protocols are standardized 
by the W3C and mandate the use of XML as the payload format, typically over HTTP. Furthermore, 
SOAP-based Web APIs use XML validation to ensure structural message integrity, by leveraging the XML 
schemas provisioned with WSDL documents. A WSDL document accurately defines the XML messages and 
transport bindings of a Web service.</p> 

<p>Only SOAP and REST will be considered in this website, in the form of a 
Web API for simplicity, SOAP beeing implemented without WSDL.</p> 


	
<?php 
$head = "";
$page = "Web services";
$content = ob_get_clean();
$title = "Web services"; 
require 'MasterPage.php';
?>	