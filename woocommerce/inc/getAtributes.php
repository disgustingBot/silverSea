<?php


$categories = get_the_terms( get_the_ID(), 'product_cat' );
// FIND OUT WHICH CARACTERISTICS
if ($categories) {
  // for each category
  foreach ($categories as $cat) {
    $parent=get_term_by('id', $cat->parent, 'product_cat', 'ARRAY_A');
    $grandParent=get_term_by('id', $parent['parent'], 'product_cat', 'ARRAY_A');

    if ($parent['slug']=="size") {
      $size = $cat->name;
      $sizeSlug = $cat->slug;
      $sizeNumber = preg_replace("/[^0-9]/", "", $sizeSlug );
    }
    if ($grandParent['slug']=="general") {
      $tipo_1 = $parent['name'];
      $tipo_1Slug = $parent['slug'];
      $tipo_2 = $cat->name;
      $tipo_2Slug = $cat->slug;
    }
    if ($parent['slug']=="condition") {
      $condition = $cat->name;
      $conditionSlug = $cat->slug;
    }
    $code = $sizeNumber . strtoupper($tipo_2Slug) . ' ' . strtoupper($conditionSlug);
  }
}

 ?>
