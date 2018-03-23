<h2>Category List</h2>

   
<table class="tblone">
	<tr>
		<th>No.</th>
		<th>Category Name</th>
		<th>Category Title</th>
		<th>Action</th>
	</tr>
	<?php
    $i = 0;
    foreach ($cat as $key => $value) {
        $i++ ?>

        
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $value['catName']; ?></td>
		<td><?php echo $value['catTitle']; ?></td>
		<td>
			<a href="<?php echo BASE_URL; ?>/Admin/editCat/<?php echo $value['catId']; ?>">Edit</a> ||
			<a href="<?php echo BASE_URL; ?>/Admin/deleteCat/<?php echo $value['catId']; ?>">Delete</a>
		</td>
	</tr>
	<?php
    }
?> 
</table>
