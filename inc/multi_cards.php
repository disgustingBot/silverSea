
<?php function entry_card ($args = array()) {
    if(!isset($args['title']  )){ $args['title']   = get_the_title(); }
    if(!isset($args['link']   )){ $args['link']    = get_the_permalink(); }
    if(!isset($args['image']  )){ $args['image']   = get_the_post_thumbnail_url(); }
    if(!isset($args['excerpt'])){ $args['excerpt'] = excerpt(70); }
    ?>

    <a href="<?php echo $args['link']; ?>" class="entry_card">
      <img class="entry_card_img" src="<?php echo $args['image']; ?>" alt="Post featured image">
      <div class="entry_card_caption">
        <p class="entry_card_title"><?php echo $args['title']; ?></p>
        <div class="textgroup_divider"></div>
        <p class="entry_card_excerpt"><?php echo $args['excerpt']; ?></p>
      </div>
    </a>

<?php } ?>



<?php function squared_info ($args = array()) {
    if(!isset($args['title']  )){ $args['title']   = get_the_title(); }
    if(!isset($args['link']   )){ $args['link']    = get_the_permalink(); }
    if(!isset($args['image']  )){ $args['image']   = get_the_post_thumbnail_url(); }
    if(!isset($args['excerpt'])){ $args['excerpt'] = excerpt(70); }
    ?>

    <figure class="squared_info">
      <img class="squared_info_picture rowcol1" src="<?php echo $args['image']; ?>" alt="Logos de clientes">
      <figcaption class="squared_info_caption rowcol1">
        <p class="squared_info_title"><?php echo $args['title']; ?></p>
        <p class="squared_info_txt"><?php echo $args['excerpt']; ?></p>
      </figcaption>
    </figure>

<?php } ?>
