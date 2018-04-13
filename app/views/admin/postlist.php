<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.2.1/dt-1.10.16/cr-1.4.1/sl-1.2.5/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.2.1/dt-1.10.16/cr-1.4.1/sl-1.2.5/datatables.min.js"></script>
<h2>Article List</h2>
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
<table class="display" id="myTable">
	<thead>
	<tr>
		<th width="5%">No</th>
		<th width="20%">Title</th>
		<th width="35%">Content</th>
		<th width="15%">Category</th>
		<th width="25%">Action</th>		
	</tr>
	</thead>
	<tbody>
	<?php
    $i=0;
     foreach ($listPost as $key=> $value) {
         $i++; ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $value['postTitle']; ?></td>
		<td>
			<?php 
            $text = $value['postContent'];
         if (strlen($text) > 40) {
             $text = substr($text, 0, 40);
             echo $text;
         } ?></td>
		<td><?php echo $value['catName']; ?></td>
		<?php if (Session::get('level')==1) {
             ?>
		<td>
			<a href="<?php echo BASE_URL; ?>/Admin/editArticle/<?php echo $value['postId']; ?>">Edit</a> ||
			<a onclick="return confirm('Are You Sure to Delete?')" href="<?php echo BASE_URL; ?>/Admin/deleteArticle/<?php echo $value['postId']; ?>">Delete</a>
		</td>
		<?php
         } else {
             ?>
<td>Not Permited</td>
         <?php
         } ?>
	</tr>
	<?php
     } ?>
     </tbody>
</table>
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
