<article class="postcontent">
    <?php 
    foreach ($postById as $key => $value) {
        ?>
    <div class="details">
     <div class="title">
         <h2><?php echo $value['postTitle'] ?></h2>
         <p>Category:<a href="<?php echo BASE_URL; ?>/Index/postByCat/<?php echo $value['postCat'] ?>"><?php echo $value['catName'] ?></a></p>
     </div>
     <div class="desc">
         <p><?php echo $value['postContent'] ?></p>
     </div>   
    </div>
    <?php
    } ?>
</article>



  
