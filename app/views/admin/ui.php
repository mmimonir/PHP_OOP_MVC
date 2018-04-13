
	<h2>UI Option</h2>
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
<form action="<?php echo BASE_URL; ?>/Admin/changeUI" method="post">
	<table>
		<tr>
			<td>Change Background Color</td>
			<td><input type="color" name="color" required="1"></td>
		</tr>
		
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Save"></td>
		</tr>
	</table>
</form>



