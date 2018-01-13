<?php 
/** @file DatabaseSimpleView.php
 * HTML DatabaseSimple page of the website
  * 
 * @brief HTML view which displays the DatabaseSimple page
*/

ob_start();
?>

<script type="text/javascript">
	function getSelectedQuery() {
    	var e = document.getElementById("simpleQuery"); 

		return e.options[e.selectedIndex].value;
	}	
</script>

<?php 
$head = ob_get_clean();
ob_start();
?>	

<h1 class="title">Simple query</h1>
<div class="line"></div>
<div class="intro">Northwind database is a fully functional sample SQLite3 database
store in the model folder under the name Northwind.db.</div>

<h3>CRUD operations</h3>

<p>Create, Read, Update, and Delete (as an acronym CRUD) are 
the four basic functions of persistent storage. In a real Web application,
the model must implement all these operations, plus a lot of 
specialized queries in order to maintain an up to date model.
</p>

<p>In this website, the database is fully operational and there 
is no need to modify it. Hence, only the Read operation will 
be implemented for the demo.</p>

<div class="clear"></div>
<div class="line"></div>

<h3>Querying the database</h3>   

<p>The user has the choice among several simple queries implemented
in the model. Once the query is selected, the view is updated by
clicking on the Query button.</p>

<select id="simpleQuery">
	<option value="DISCONTINUED_PRODUCTS">Discontinued products</option>
	<option value="CURRENT_PRODUCTS">Current products</option>
	<option value="ALL_PRODUCTS">All products</option>
</select> 

<script type="text/javascript">
	$(document).ready(function () {
	  $("#simpleQuery").val("<?php echo $queryName ?>").change();
	});	
</script>

<a onclick="window.location.href = '?command=DatabaseSimple&queryName=' + getSelectedQuery();" class="button blue">QUERY</a>

<br />
<h2>List of products</h2>
<table>
	<tr>
		<th><h4>Product ID</h4></th>
		<th><h4>Product Name</h4></th>
		<th><h4>Quantity Per Unit</h4></th>
		<th><h4>Unit Price</h4></th>			
	</tr>
	<?php foreach($resultList as $result) { ?>		
	<tr>
		<td><?php echo $result["ProductID"] ?></td>
		<td><?php echo $result["ProductName"] ?></td>
		<td><?php echo $result["QuantityPerUnit"] ?></td>
		<td><?php echo $result["UnitPrice"] ?></td>
	</tr>
	<?php } ?>
</table>	
<br />

<div class="clear"></div>
<div class="line"></div>

<h3>Model organization</h3>   

<p>All the database logic is managed by:</p>

<ul>
	<li>The Db class: to connect to the database</li>
	<li>The Product class: all the queries against the database</li>			
</ul>	

<p>Both classes are stored in the models folder. The controller
alone manages queries and database interaction using these classes,
the view is passive and has no knowledge of the model. it is updated 
by the controller which has a role of presenter.</p>
	
<div class="clear"></div>
<div class="line"></div>

<h3>Benefits of the MVC - Passive view</h3>   

<p>Any change on the model is consequently applied on all the
views, thanks to the separation of concerns. A same model may 
have several different views, with their own business logic
managed by their dedicated controller. Any change on a view 
has no consequence on the model or on the business logic. Team
development friendly, it provides a faster development process.</p>	
	
<?php 
$page = "Simple query";
$content = ob_get_clean();
$title = "Simple query"; 
require 'MasterPage.php';
?>	