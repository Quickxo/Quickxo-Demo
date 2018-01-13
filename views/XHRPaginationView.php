<?php 
/** @file XHRPaginationView.php
 * HTML XHRPagination Ajax call
 * 
 * @brief HTML view which displays the XHRPagination Ajax call
*/ 

ob_start();

foreach($resultList as $result) { ?>			
	<tr>
		<td><?php echo $result["SaleDate"] ?></td>
		<td><?php echo $result["ProductName"] ?></td>
		<td><?php echo $result["UnitPrice"] ?></td>
		<td><?php echo $result["Quantity"] ?></td>
		<td><?php echo $result["Discount"] ?></td>
		<td><?php echo $result["ExtendedPrice"] ?></td>			
	</tr>
<?php } 

$sales = ob_get_clean();
ob_start();

?>

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

<?php

$links = ob_get_clean();
$result = array("sales"=>$sales, "links"=>$links);
echo json_encode($result, JSON_FORCE_OBJECT);

?>

