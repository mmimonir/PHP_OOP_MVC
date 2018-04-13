<script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>
<h2>Add New Article.</h2>
<?php if (isset($postErrors)) {
    echo '<div style="color:red; border:1px solid red; padding:5px 10px; margin:5px;">';
    foreach ($postErrors as $key => $value) {
        switch ($key) {
            case 'postTitle':
                foreach ($value as $key => $val) {
                    echo "Title: ".$val."<br/>";
                }
                break;
                case 'postContent':
                foreach ($value as $val) {
                    echo "Content: ".$val."<br/>";
                }
                break;
                case 'postCat':
                foreach ($value as $val) {
                    echo "Category: ".$val."<br/>";
                }
                break;
            
            default:
                
                break;
        }
    }
    echo '</div>';
} ?>
<form action="<?php echo BASE_URL; ?>/Admin/addNewPost" method="post">
	<table>
		<tr>
			<td>Post Title</td>
			<td><input type="text" name="postTitle"></td>
		</tr>		
		<tr>
			<td>Post Content</td>
			<td>				
				<textarea class="txtarea" name="postContent"></textarea>
				<script>
			CKEDITOR.replace( 'postContent' );
		</script>
			</td>
		</tr>
		<tr>
			<td>Post Category</td>
			<td>
				<select name="postCat" class="cat">
					<option>Select One</option>
					<?php foreach ($catlist as $key => $cat) {
    ?>
					<option value="<?php echo $cat['catId']; ?>"><?php echo $cat['catName']; ?></option>					
					<?php
} ?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Create Post"></td>
		</tr>
	</table>
</form>



