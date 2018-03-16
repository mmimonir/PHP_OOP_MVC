

Home <hr>
<article class="postcontent">
	<?php 
    foreach ($getcat as $key => $value) {
        ?>
	<div class="post">
        <div class="title">
         <h2><?php echo $value['postTitle'] ?></h2>
         <p>Category:<?php echo $value['catName'] ?></p>
     </div>
		
		<p><?php 
        $text = $value['postContent'];
        if (strlen($text) > 200) {
            $text = substr($text, 0, 200);
            echo $text;
        } ?></p>
		<div class="readmore"><a href="<?php echo BASE_URL ?>/Index/postDetails/<?php echo $value['postId'] ?>">Ream More...</a></div>
	</div>
	<?php
    } ?>
</article>



  
