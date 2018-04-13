
	<h2>Update Category</h2>
	<?php foreach ($catById as $key => $value) {
    ?>
	
<form action="<?php echo BASE_URL; ?>/Admin/updateCat/<?php echo $value['catId']; ?>" method="post">
	<table>
		<tr>
			<td>Category Name</td>
			<td><input type="text" name="catName" value="<?php echo $value['catName']; ?>"></td>
		</tr>
		<tr>
			<td>Category Title</td>
			<td><input type="text" name="catTitle" value="<?php echo $value['catTitle']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Update"></td>
		</tr>
	</table>
</form>

<?php
} ?>

