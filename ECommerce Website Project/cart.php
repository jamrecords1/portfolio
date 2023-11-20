<?php 

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
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}

?>
<body>
<?php include('navbaruser.php'); ?>
<!-- <div class="container">
	<h1 class="page-header text-center">Zea's All around Ordering System</h1>
	<ul class="nav nav-tabs">
		<?php
			$sql="select * from category order by categoryid asc limit 1";
			$fquery=$conn->query($sql);
			$frow=$fquery->fetch_array();
			?>
				<li class="active"><a data-toggle="tab" href="#<?php echo $frow['catname'] ?>"><?php echo $frow['catname'] ?></a></li>
			<?php

			$sql="select * from category order by categoryid asc";
			$nquery=$conn->query($sql);
			$num=$nquery->num_rows-1;

			$sql="select * from category order by categoryid asc limit 1, $num";
			$query=$conn->query($sql);
			while($row=$query->fetch_array()){
				?>
				<li><a data-toggle="tab" href="#<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></a></li>
				<?php
			}
		?>
	</ul>

	<div class="tab-content">
		<?php
			$sql="select * from category order by categoryid asc limit 1";
			$fquery=$conn->query($sql);
			$ftrow=$fquery->fetch_array();
			?>
				<div id="<?php echo $ftrow['catname']; ?>" class="tab-pane fade in active" style="margin-top:20px;">
					<?php

						$sql="select * from product where categoryid='".$ftrow['categoryid']."'";
						$pfquery=$conn->query($sql);
						$inc=4;
						while($pfrow=$pfquery->fetch_array()){
							$inc = ($inc == 4) ? 1 : $inc+1; 
							if($inc == 1) echo "<div class='row'>"; 
							?>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading text-center">
											<b><?php echo $pfrow['productname']; ?></b>
										</div>
										<div class="panel-body">
											<img src="<?php if(empty($pfrow['photo'])){echo "upload/noimage.jpg";} else{echo $pfrow['photo'];} ?>" height="225px;" width="100%">
										</div>
										<div class="panel-footer text-center">
											&#8369; <?php echo number_format($pfrow['price'], 2); ?>
										</div>
									</div>
								</div>
							<?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
		    	</div>
			<?php

			$sql="select * from category order by categoryid asc";
			$tquery=$conn->query($sql);
			$tnum=$tquery->num_rows-1;

			$sql="select * from category order by categoryid asc limit 1, $tnum";
			$cquery=$conn->query($sql);
			while($trow=$cquery->fetch_array()){
				?>
				<div id="<?php echo $trow['catname']; ?>" class="tab-pane fade" style="margin-top:20px;">
					<?php

						$sql="select * from product where categoryid='".$trow['categoryid']."'";
						$pquery=$conn->query($sql);
						$inc=4;
						while($prow=$pquery->fetch_array()){
							$inc = ($inc == 4) ? 1 : $inc+1; 
							if($inc == 1) echo "<div class='row'>"; 
							?>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading text-center">
											<b><?php echo $prow['productname']; ?></b>
										</div>
										<div class="panel-body">
											<img src="<?php if($prow['photo']==''){echo "upload/noimage.jpg";} else{echo $prow['photo'];} ?>" height="" width="">
										</div>
										<div class="panel-footer text-center">
											&#8369; <?php echo number_format($prow['price'], 2); ?>
										</div>
									</div>
								</div>
							<?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
		    	</div>
				<?php
			}
		?>
	</div>
</div> -->
<div class="container">
	<h1 class="page-header text-center">MENU</h1>
	<br>
			<?php
				$query = "SELECT * FROM product ORDER BY productid ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="cart.php?action=add&id=<?php echo $row["productid"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<td><img src="<?php echo $row['photo']; ?>" width="50px" height="50px"></td>

<!-- 						<h4 class="text-info"><?php echo $row['catname']; ?></h4> -->

						<h4 class="text-info"><?php echo $row["productname"]; ?></h4>

						<h4 class="text-danger">₱ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["productname"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<form method="post" action="purchase.php">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>₱ <?php echo $values["item_price"]; ?></td>
						<td>₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">₱ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
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
		</form>
		</div>
	</div>
</div>
