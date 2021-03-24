
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












<?php
function team_card ($args = array()) {
  if(!isset($args['title']  )){ $args['title']   = get_the_title(); }
  if(!isset($args['link']   )){ $args['link']    = get_the_permalink(); }
  if(!isset($args['image']  )){ $args['image']   = get_post_thumbnail_id(get_the_ID()); }
  if(!isset($args['excerpt'])){ $args['excerpt'] = excerpt(70); }
  $terms = get_the_terms( get_the_id(), 'area' );
  ?>

  <article class="card teamCard <?php echo $terms[0]->slug; ?>">
    <!-- <img class="teamCardImg teamCardImg2 rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""> -->
    <?php
    $config = array(
      'id' => $args['image'],
      'class' => 'teamCardImg teamCardImg2 rowcol1',
      'sizes' => [['768', '70']],
      'default_size' => '19',
    );
    responsive_img($config);
    ?>
    <div class="teamCardTxt">
      <p class="teamCardName teamCardBlock"><?= $args['title'] ?></p>
      <p class="teamCardPosition teamCardBlock"><?php echo get_post_meta($post->ID, 'Cargo', true); ?></p>
      <a class="teamCardLinkedin teamCardNone brandColorTxt" href="<?php echo get_post_meta( get_the_id(), 'Linkedin' )[0]; ?>" >LinkedIn</a>
    </div>
  </article>

<?php
}
















function simpla_card ($args = array()) {
  // global $product;
  if(get_post_type()=='product'){
    $_pf = new WC_Product_Factory();
    $_product = $_pf->get_product(get_the_ID());
  }

  include get_template_directory() . '/inc/getAtributes.php';

  if(!isset($args['title']  )){ $args['title']   = get_the_title(); }
  if(!isset($args['link']   )){ $args['link']    = get_the_permalink(); }
  if(!isset($args['image']  )){ $args['image']   = get_the_post_thumbnail_url(); }
  if(!isset($args['excerpt'])){ $args['excerpt'] = excerpt(70); }
  ?>

  <article
    class="card"
    contenedor="true"
    data-code="<?= $code; ?>"
    data-size="<?= $sizeNumber; ?>"
    data-tip1="<?= $tipo_1; ?>"
    data-tip2="<?= strtoupper($tipo_2Slug); ?>"
    data-cond="<?= strtoupper($conditionSlug); ?>"
  >

    <div class="cardHead">
      <div class="cardThumbnail">
        <?php newSvg(ucwords($tipo_1Slug)); ?>
      </div>
      <h4 class="cardTitle"><a href="<?= $args['link']; ?>"><?= $args['title']; ?></a></h4>
      <p class="cardSubTitle"><a href="<?= $args['link']; ?>"><?php echo $tipo_2 . ', ' . $condition ?></a></p>
    </div>
    <?php $attachment_ids = $_product->get_gallery_image_ids(); ?>


    <div class="cardMedia<?php if($attachment_ids){ echo ' Carousel'; } ?>">

      <a class="cardImgA Element" href="<?= $args['link']; ?>">
        <?php
        $config = array(
          'id' => get_post_thumbnail_id(get_the_ID()),
          'class' => 'productGalleryImg',
          'sizes' => [['576', '85'],['768','45'],['1200','34']],
        );
        responsive_img($config);
        ?>
      </a>

      <?php if($attachment_ids){foreach( $attachment_ids as $attachment_id ) { ?>
        <a class="cardImgA Element" href="<?= $args['link']; ?>">
          <?php
          $config = array(
            'id' => $attachment_id,
            'class' => 'productGalleryImg',
            'sizes' => [['576', '85'],['768','45'],['1200','34']],
          );
          responsive_img($config);
          ?>
        </a>
      <?php }} ?>

      <?php if($attachment_ids){ ?>
        <button class="arrowBtn arrowButtonNext rowcol1 NextButton">
          <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
            <circle cx="53" cy="53" r="53" fill="currentColor"/>
            <path d="M72.7972 50.8521C74.0047 52.0295 74.0047 53.9705 72.7972 55.1479L46.3444 80.9415C44.4438 82.7947 41.25 81.4481 41.25 78.7936L41.25 27.2064C41.25 24.5519 44.4438 23.2053 46.3444 25.0585L72.7972 50.8521Z" fill="white"/>
          </svg>
        </button>
        <button class="arrowBtn arrowButtonPrev rowcol1 PrevButton">
          <svg class="arrowSVG" width="106" height="106" viewBox="0 0 106 106" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
            <circle r="53" transform="matrix(-1 0 0 1 53 53)" fill="currentColor"/>
            <path d="M33.2028 50.8521C31.9953 52.0295 31.9953 53.9705 33.2028 55.1479L59.6556 80.9415C61.5562 82.7947 64.75 81.4481 64.75 78.7936L64.75 27.2064C64.75 24.5519 61.5562 23.2053 59.6556 25.0585L33.2028 50.8521Z" fill="white"/>
          </svg>
        </button>
      <?php } ?>
    </div>

    <div class="cardCaption">

      <div class="cardFeatures">
        <?php
        if ($categories) {
          newSvg($sizeSlug);
          newSvg(ucwords($tipo_1Slug));
          newSvg(strtoupper($tipo_2Slug));
          newSvg(strtoupper($conditionSlug));
        }
        ?>
      </div>

      <div class="cardActions">
        <div class="cuantos Cuantos">
          <input class="cuantosQnt cuantosQantity" type="text" value="1" min="1">
          <button class="cuantosBtn cuantosMins">-</button>
          <button class="cuantosBtn cuantosPlus">+</button>
        </div>
        <button class="cardAdd btn btnSimple">AGREGAR</button>
      </div>
    </div>

  </article>

<?php } ?>
