<?php 

error_reporting(0);

include('userheader.php');
$connect = mysqli_connect("localhost", "root", "", "zea");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>window.location="userproduct.php"</script>';
			}
		}
	}
}

?>
<body>
<?php include('navbaruser.php'); ?>
<div class="container">
	<h1 class="page-header text-center">MENU</h1>
	<div class="row">
		<div class="col-md-12">
			<select id="catList" class="btn btn-default">
			<option value="0">All Category</option>
			<?php
				$sql="select * from category";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['categoryid']) ? " selected" : "";
					echo "<option$selected value=".$catrow['categoryid'].">".$catrow['catname']."</option>";
				}
			?>
			</select>
		</div>
	</div>
	<form method="POST" action="userproduct.php">
		<table class="table table-striped table-bordered">
			<thead>
<!-- 				<th class="text-center"><input type="checkbox" id="checkAll"></th> -->
				<th>Category</th>
				<th>Photo</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th></th>
				<th></th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE product.categoryid = $catid";
					}
					$sql="select * from product left join category on category.categoryid=product.categoryid $where order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						<tr>
							<?php
				$query1 = "SELECT * FROM product ORDER BY productid ASC";
				$result = mysqli_query($connect, $query1);
				if(mysqli_num_rows($result) > 0)
				{
				?>

				<form method="post" action="userorder.php?action=add&id=<?php echo $row["productid"]; ?>">
					<div align="center">


<!--  						<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>			 -->			
						<td><?php echo $row['catname']; ?></td>

						<td><img src="<?php echo $row['photo']; ?>" width="150px" height="150px"></td>

						<td><h4 class="text-info"><?php echo $row["productname"]; ?></h4></td>

						<td><h4 class="text-danger">₱ <?php echo $row["price"]; ?></h4></td>

						<td><input type="number" name="quantity" value="1" class="form-control" min="0" disabled=""></td>

						<td><input type="hidden" name="hidden_name" value="<?php echo $row["productname"]; ?>"></td>

						<td><input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>"></td>

						<td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"></td>

					</div>
				</form>
				<?php
				}
			?>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
			<div style="clear:both"></div>
			<br>
		</table>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<form method="post" action="purchaseuser.php">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th class="text-center"><input type="checkbox" id="checkAll"></th>
						<th width="40%">Item Name</th>
<!-- 						<th width="10%">Quantity</th> -->
						<th width="20%">Price</th>
<!-- 						<th width="15%">Total</th> -->
						<th width="5%">Quantity</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
							$row['productid'] = $values['item_id'];
							$row['productname'] = $values['item_name'];
							// $row['quantity_'] = $values['item_quantity'];
							$row['price'] = $values['item_price'];
					?>
<!-- 					<tr>
						<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
						<td><?php echo $values["item_name"]; ?></td> -->
<!--   						<td><?php echo $values["item_quantity"]; ?></td> -->
<!-- 						<td>₱ <?php echo $values["item_price"]; ?></td> -->
<!-- 						<td>₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td> -->
<!-- 						<td><input type="number" class="form-control" name="quantity_<?php echo $iterate; ?>" value="1" min="0"></td>
						<td><a href="userorder.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr> -->
					<tr>
						<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
<!-- 						<td><?php echo $row['catname']; ?></td> -->
						<td><?php echo $row['productname']; ?></td>
 						<td class="text-right">&#8369; <?php echo number_format($row['price'], 2); ?></td>
						<td><input type="number" class="form-control" name="quantity_<?php echo $iterate; ?>" value="1" min="0"></td>
						<td><a href="userorder.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
						$iterate++;
					}
				?>
<!-- 					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">₱ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr> -->
					<?php
					}
					?>
						
				</table>

					<div class="row">
						<div class="col-md-3">
						<input type="text" name="customer" class="form-control" placeholder="Customer Name" required>
						</div>
						<div class="col-md-2" style="margin-left:-20px;">
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Buy</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	
</div>
<?php include('modal.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'userproduct.php';
			}
			else
			{
				window.location = 'userproduct.php?category='+$(this).val();
			}
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
</body>
</html>