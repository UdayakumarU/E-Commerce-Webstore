<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="navbar-brand py-0">Products</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
	<?php
		$res=mysql_query("select * from category");
	?>
	<div class="collapse navbar-collapse " id="navbarNavDropdown">
	<?php while($row=mysql_fetch_array($res))
			{
	?>
		        <ul class="navbar-nav">
					<li class="nav-item dropdown" >
						<a class="nav-link dropdown-toggle py-0"  id="navbarDropdownMenuLink"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="category.php?cid=<?php echo $row['id']; ?>"><?php echo $row['categoryName']; ?></a>
						<?php
							$res_pro=mysql_query("select * from subcategory where categoryid =".$row['id']);
						?>
						<ul>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<?php
								while($pro_row=mysql_fetch_array($res_pro))
								{
								?>
									<li>
										<a class="dropdown-item  "  href="sub-category.php?scid=<?php echo htmlentities($pro_row['id']); ?>&amp;cid=<?php echo htmlentities( $row['id']); ?>"><?php echo $pro_row['subcategoryName'];?></a>
										
									</li>
								<?php
								}
								?>
							</div>
						</ul>
					</li>
				</ul>
			<?php
			}
			?>
    </div>
	
</nav>




