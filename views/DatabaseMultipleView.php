<?php 
/** @file DatabaseMultipleView.php
 * HTML DatabaseMultiple pages of the website
 * 
 * @brief HTML view which displays the DatabaseMultiple page
*/

ob_start();
?>

<link rel="stylesheet" href="public/css/highlight/vs.css">
<script src="public/js/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<script type="text/javascript">
	function getSelectedQuery() {
    	var e = document.getElementById("multipageQuery"); 

		return e.options[e.selectedIndex].value;
	}	
	
	function getSalesPage(page) {
		$.post("?command=XHRPagination", 
		{salesYear: <?php echo $salesYear ?>, 
		pageNumber: page},
		function(result){
			var json = JSON.parse(result);
			
			$("#tableBody").html(json.sales);
			$("#salesNavi").html(json.links);
		});
	}	
</script>

<?php 
$head = ob_get_clean();
ob_start();
?>	

<h1 class="title">Multiple pages results</h1>
<div class="line"></div>
<div class="intro">When the query returns a lot 
of results, it is tempting to group everything together in 
the view to have a better control on the data for its formatting. Quickxo provides 
the same ease without mingling the application logic.</div>

<h3>Pagination</h3>

<p>The peculiarity of multiple pages results is that the same 
page is requested each time, hence the view doesn't change but its
controller has to adapt its content: This is pagination. In the case of 
a large resultset (more than several hundreds of rows), this will 
consist in cutting it into multiple small resultsets that the user 
will visualize one after the other by clicking on as many page numbers 
as there are resultsets.</p>

<p>There are two ways to implement pagination with Quickxo. Either 
the view performs it, either the controller:</p>	

<ul>
	<li>Controller pagination: The query is adapted by the controller
	to fetch only the data corresponding to the requested view. The total 
	number of rows has to be retrieved. This is done with the LIMIT SQL keyword
	with either the use of SQL_CALC_FOUND_ROWS and SELECT FOUND_ROWS(), either a separate
	query with COUNT(*) to calculate the total number of rows.</li>
	<li>View pagination: The whole query resultset is sliced by the view
	from the array containing all the data.</li>			
</ul>	

<p>The faster way should be the first option, with the controller
retrieving the total number of rows from a separate COUNT(*) query.
However, the second option can also be convenient for moderate resultsets even
if the first option better complies to the passive view design pattern.</p>	

<div class="clear"></div>
<div class="line"></div>

<h3>Ajax is user-friendly</h3>   

<p>Before implementing pagination, the technical frame must be 
determined. A plain PHP solution will lead to continually and 
completly reloading	the same page when the user will move from 
one subset to another, only the paginated data will have changed.
It's quite feasible but it may annoy the user who has to scroll
back to where he was before clicking in order to continue exploring
the resultset. Even if the scrolling is done automatically, the user 
has to wait for the complete reloading of the same page between two clicks.</p>	

<p>An Ajax-based pagination has the double advantage of being user-friendly as 
only a small part of the page will be smoothly updated, and the second advantage 
is that it is straighforward to implement.</p>

<div class="clear"></div>
<div class="line"></div>

<h3>Querying the database</h3>   

<p>The user selects a year which will be sent as a parameter of the request.
The controller will execute a query against the database to get the detailed sales 
of the selected year. Northwind sales span from 04-07-1996 to 06-05-1998.</p>

<p>At the bottom of the table, the user clicks on the page number
associated with each result subset, which triggers the refresh of
the body of the table and of the navigation buttons.</p>	

<select id="multipageQuery">
	<option value="1996">1996</option>
	<option value="1997">1997</option>
	<option value="1998">1998</option>
</select> 

<script type="text/javascript">
	$(document).ready(function () {
	  $("#multipageQuery").val("<?php echo $salesYear ?>").change();
	});	
</script>

<a onclick="window.location.href = '?command=DatabaseMultiple&salesYear=' + getSelectedQuery();" class="button blue">QUERY</a>

<br />
<h2><?php echo $nbSales ?> sales</h2>
<table>
	<thead>
		<tr>
			<th><h4>Date</h4></th>
			<th><h4>Product</h4></th>
			<th><h4>Unit Price</h4></th>	
			<th><h4>Qty</h4></th>	
			<th><h4>Discount (%)</h4></th>			
			<th><h4>Price</h4></th>			
		</tr>
	</thead>
	<tbody id="tableBody">
		<?php foreach($resultList as $result) { ?>		
		<tr>
			<td><?php echo $result["SaleDate"] ?></td>
			<td><?php echo $result["ProductName"] ?></td>
			<td><?php echo $result["UnitPrice"] ?></td>
			<td><?php echo $result["Quantity"] ?></td>
			<td><?php echo $result["Discount"] ?></td>
			<td><?php echo $result["ExtendedPrice"] ?></td>			
		</tr>
		<?php } ?>
	</tbody>
</table>	
<div class="page-navi" id="salesNavi">
	<ul>
		<li><a href="#" onclick="getSalesPage(<?php echo $pagination->getPrevPage() ?>); return false;" >&lsaquo;</a></li>
	<?php foreach ($pagination->getPages() as $page) { 
			  if ($page['num'] == '...') { ?>
				  <li><a>…</a></li>
	<?php 	  }else{ ?>
				  <li><a href="#" <?php echo ($page['isCurrent'] ? ' class="current"' : '') ?> onclick="getSalesPage(<?php echo $page['num'] ?>); return false;"><?php echo $page['num'] ?></a></li>			
	<?php 	  }
		  }?>
		<li><a href="#" onclick="getSalesPage(<?php echo $pagination->getNextPage() ?>); return false;" >&rsaquo;</a></li>
	</ul>
</div>	
<br />

<div class="clear"></div>
<div class="line"></div>

<h3>Code reuse</h3>   

<p>The pagination logic is implemented in a dedicated class to 
allow code reuse by instanciation of this class for each
table of result. This class, Pagination.php, is located
in a special folder (classes) reserved for helper classes, naturally
located as a sub-folder of the controller directory.</p>

<div class="clear"></div>
<div class="line"></div>

<h3>Ajax calls</h3>   

<p>As seen earlier, Ajax calls are processed like standard HTTP requests.
The associated PHP view will update only the table body and the navigation
block of buttons. Each of these components will be grouped in an array
to be returned back to the Ajax call. Client's side, the Ajax part 
will then update each zone of the page by replacing their HTML
content with each corresponding element of the array received from 
the controller, serialized under the JSON format.</p>	

<pre><code class="JavaScript">
function getSalesPage(page) {
	$.post("?command=XHRPagination", 
	{salesYear: <?php echo $salesYear ?>, 
	pageNumber: page},
	function(result){
		var json = JSON.parse(result);
		
		$("#tableBody").html(json.sales);
		$("#salesNavi").html(json.links);
	});
}		
</code></pre>

<p>The getSalesPage function is called each time the user wants
to load another page of results. The wanted page number is sent via a HTTP Post 
request which also carries the wanted year. The array sent back by 
the controller, serialized in JSON, will be parsed to extract each 
of its component which will replace the corresponding part of the
HTML view.</p>

<div class="clear"></div>
<div class="line"></div>

<h3>Browser back button</h3>   

<p>Some users are accustomed to often clicking on the back button of their browser.
Hence, they might feel disoriented because Ajax calls are not stored
in browser history. This is a drawback of Ajax and there are several workarounds 
to restore this feature. This is beyond the scope of this demo website but it is
possible to make the browser always go back through the history of content shown 
on the page including content which has been added using AJAX. Historically 
this has been quite tricky and has involved using hashtags in the URL and capturing 
the hashtag using javascript on page load and then re-initiating the AJAX call in 
question but since the inception of HTML5 this has been made a lot easier through 
the use of the HTML5 History API. The API allows to modify the websites URL without 
a full page refresh which is particularly useful for AJAX based page content.</p>		

<?php 
$page = "Multi-pages results";
$content = ob_get_clean();
$title = "Multi-pages results"; 
require 'MasterPage.php';
?>	
