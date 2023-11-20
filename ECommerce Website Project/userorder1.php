<?php include('userheader.php'); ?>
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
	<br>
	<form method="POST" action="userorder1.php">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Category</th>
				<th>Photo</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
			</thead>
			<tbody>
				<?php
					$sql="select * from product left join category on category.categoryid=product.categoryid order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
							<td><?php echo $row['catname']; ?></td>
							<td><img src="<?php echo $row['photo']; ?>" width="50px" height="50px"></td>
							<td><?php echo $row['productname']; ?></td>
							<td class="text-right">&#8369; <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="number" class="form-control" name="quantity_<?php echo $iterate; ?>" value="0" min="0"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
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
<?php include('usermodal.php'); ?>
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