<div class="searchoption">
	<div class="menu">
		<a href="<?php echo BASE_URL; ?>">Home</a>
	</div>
	<div class="search">
		<form action="<?php echo BASE_URL; ?>/Index/search" method="post">
			<input type="text" name="keyword" placeholder="Search Here">
			<select class="catsearch" name="catId">
				<option>Select One</option>
				<?php foreach ($catlist as $key => $value) {
    ?>
				<option value="<?php echo $value['catId'] ?>"><?php echo $value['catName'] ?></option>
				<?php
} ?>
				
			</select>
			<button class="submitbtn" type="submit">Search</button>
		</form>
	</div>
</div>
