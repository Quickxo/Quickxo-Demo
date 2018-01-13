<?php 
/** @file DatabaseView.php
 * HTML Database page of the website
  * 
 * @brief HTML view which displays the Database page
*/

ob_start();
?>

<h1 class="title">Database</h1>
<div class="line"></div>
<div class="intro">Database logic is processed by the Db class
located in the <a href="https://github.com/Quickxo/Quickxo/tree/master/models">models folder</a>.</div>

<h3>Quickxo views are purely passive</h3>

<p>Quickxo uses the Front Controller design pattern and the 
same routing mechanism from URL to Controller as Model2.
However, thanks to the Front Controller design pattern, and 
because it is a very simplified implementation, Quickxo views 
are purely passive, hence it is also a variation of the MVP - 
passive view design pattern.</p>

<img src="public/images/mvp-passiveview.png" alt="Passive view" />

<p>The Passive View design pattern signifies that the view has
no link and even no knowledge of the model. The controller (presenter)
does all the processing with the model and updates the view.</p>

<div class="clear"></div>
<div class="line"></div>

<h3>Northwind sample database</h3>

<p>The Northwind database is a well known sample database used by Microsoft 
to demonstrate the features of some of its products, including SQL 
Server and Microsoft Access. The database contains the sales data 
for Northwind Traders, a fictitious specialty foods export-import 
company. Many people are already familiar with it and there are many 
resources for related learning that make use of the same database 
which has been ported into all databases (Oracle, Sqlite, VistaDB, MySQL, 
PostGreSQL)	like for example <a href="https://code.google.com/archive/p/northwindextended/">northwindextended</a>.<br /><br />
The ERD below shows the table structure of the Northwind database.</p>

<img src="public/images/erd.png" alt="Northwind" />
   
<div class="clear"></div>
	
<?php 
$head = "";
$page = "Database query";
$content = ob_get_clean();
$title = "Database query"; 
require 'MasterPage.php';
?>	