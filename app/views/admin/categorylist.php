<h2>Category List</h2>
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $value) {
        echo "<span style='color:green; font-weight:bold;'>".$value."</span>";
    }
} else {
    // header("Location:".BASE_URL."/Admin");
}

 ?>
   
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
		
		<?php if (Session::get('level')==1) {
            ?>
		<td>
			<a href="<?php echo BASE_URL; ?>/Admin/editCategory/<?php echo $value['catId']; ?>">Edit</a> ||
			<a onclick="return confirm('Are You Sure to Delete?')" href="<?php echo BASE_URL; ?>/Admin/deleteCategory/<?php echo $value['catId']; ?>">Delete</a>
		</td>
		<?php
        } else {
            ?>
<td>Not Permited</td>
         <?php
        } ?>
	</tr>
	<?php
    }
?> 
</table>
