<aside class="sidebar">
	<div class="widget">
		<h2>Category</h2>
		<ul>
			<?php foreach ($catlist as $key => $value) {
    ?>
			<li><a href="<?php echo BASE_URL; ?>/Index/postByCat/<?php echo $value['catId'] ?>"><?php echo $value['catName'] ?></a></li>
			<?php
} ?>
		</ul>
	</div>
	<div class="widget">
		<h2>Latest Post</h2>
		<ul>
			<?php foreach ($latestPost as $key => $value) {
        ?>
			<li><a href="<?php echo BASE_URL ?>/Index/postDetails/<?php echo $value['postId'] ?>"><?php echo $value['postTitle'] ?></a></li>
					
			<?php
    } ?>
		</ul>
	</div>
</aside>	
