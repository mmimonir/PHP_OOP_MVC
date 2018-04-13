<script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>
<h2>Update Article.</h2>
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
<?php foreach ($postbyid as $key => $value) {
    ?>
<form action="<?php echo BASE_URL; ?>/Admin/updatePost/<?php echo $value['postId']; ?>" method="post">
	<table>
		<tr>
			<td>Post Title</td>
			<td><input type="text" name="postTitle" value="<?php echo $value['postTitle']; ?>"></td>
		</tr>		
		<tr>
			<td>Post Content</td>
			<td>				
				<textarea class="txtarea" name="postContent"><?php echo $value['postContent']; ?></textarea>
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
					
					<option value="<?php echo $value['catId']; ?>" selected = "selected"><?php echo $value['catName']; ?></option>					
					
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Update Post"></td>
		</tr> 
	</table>
</form>

<?php
} ?>

