<?php get_header() ?>

<div class="stockATF">
  <h2 class="stock_title txtCenter brandColorTxt">SILVERSEA Stocks</h2>
  <p class="stock_txt txtCenter">Conoce nuestro stock alrededor del mundo, actualizado semana a semana.</p>
</div>

<!-- Set DB Connection -->
<?php

$pais= $_GET['pais'];
$ciudad= $_GET['ciudad'];
$id_contenedor= $_GET['id_contenedor'];


if($pais!="*" and $pais!=''){
  $wherePais = "and pais = '$pais'";
}
if($ciudad!="*" and $ciudad!=''){
  $whereCiudad = "and ciudad = '$ciudad'";
}
if($id_contenedor!="*" and $id_contenedor!=''){
  $whereContainer = "and id_contenedor = '$id_contenedor'";
}

$qry= "SELECT
       pais, ciudad, id_contenedor, sum(quantity) as quantity, truncate(avg(supplier_price),0) as supplier_price
       from stock
       where quantity > 0 $wherePais  $whereCiudad $whereContainer
       group by pais, ciudad, id_contenedor";

$get = $wpdb->get_results($qry);

$list_pais = $wpdb->get_results(" SELECT distinct pais from stock where quantity > 0 $whereContainer");
$list_ciudad = $wpdb->get_results(" SELECT distinct ciudad from stock where quantity > 0 $wherePais $whereContainer");
$list_container = $wpdb->get_results(" SELECT distinct id_contenedor from stock where quantity > 0 $wherePais $whereCiudad");


?>
<div class="stock_header_row">
  <div class="table_head">
    <select class="select_stock" name="select" id="getPais">
      <option value="*">PAIS</option>
      <?php foreach ($list_pais as $row) {
        $pais = $row->pais;?>
        <option value="<?php echo $pais ?>" <?php if($_GET['pais']==$pais){echo "selected";} ?>><?php  echo $pais; ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="table_head">
    <select class="select_stock" name="select" id="getCiudad">
      <option value="*" >CIUDAD</option>
      <?php foreach ($list_ciudad as $row) {
        $ciudad = $row->ciudad;?>
        <option value="<?php echo $ciudad ?>" <?php if($_GET['ciudad']==$ciudad){echo "selected";} ?>><?php  echo $ciudad; ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="table_head">
    <select class="select_stock" name="select" id="getContainer">
      <option value="*" >CONTAINER</option>
      <?php foreach ($list_container as $row) {
        $container = $row->id_contenedor;?>
        <option value="<?php echo $container ?>" <?php if($_GET['id_contenedor']==$container){echo "selected";} ?>><?php  echo $container; ?></option>
      <?php } ?>
    </select>
  </div>

  <!-- <div class="table_head">CANTIDAD</div> -->


    <button type="button" name="button" class="btn stock_btn" onclick="filterStock()">Filtrar</button>
    <a type="button" name="button" class="btn stock_btn" href="<?php echo get_site_url() . '/stock'; ?>">Limpiar Filtros</a>
</div>

<div class="stock_main">
  <?php echo $log; ?>
  <div class="table_stock">
    <div class="stock_row_title">
      <p class="stock_row_title_txt txtCenterLeft">PAIS</p>
      <p class="stock_row_title_txt txtCenterLeft">CIUDAD</p>
      <p class="stock_row_title_txt txtCenterLeft">CONTENEDOR</p>
      <p class="stock_row_title_txt txtCenterLeft">CANTIDAD</p>
      <?php if ( is_user_logged_in() ) {?>
        <p class="stock_row_title_txt">PRECIO</p>
      <?php }  ?>
    </div>
    <?php foreach ($get as $row ) {
      $pais = $row->pais;
      $ciudad = $row->ciudad;
      $container = $row->id_contenedor;
      $stock = $row->quantity;
      $supplier_price = $row->supplier_price;
      $supplier = $row->supplier;
      $fixed_price = $row->fixed_price;
      $sale_price = $row->sale_price;
      $currency = $row->currency;
      ?>

      <div class="stock_row">
        <div class="table_column"><?php echo $pais; ?></div>
        <div class="table_column"><?php echo $ciudad; ?></div>
        <div class="table_column"><?php echo $container; ?></div>


        <div class="table_column">
          <?php echo $stock; ?>
        </div>

        <!-- CHECHEO SI EL USER ESTA LOGUEADO -->
        <?php if ( is_user_logged_in() ) {?>
          <div class="table_column"><?php echo $supplier_price; ?></div>
        <?php }  ?>
      </div>
    <?php  } ?>

</div>

  <div class="contact_regions">
    <h3 class="txtCenter contact_regions_title"><strong>Datos de contacto de SILVERSEA según región:</strong></h3>
    <div class="region">

      <h4 class="region_title">EUROPA</h4>
      <div class="region_sellers">
        <p class="seller_name">Stefano Ricci</p>
        <p class="seller_phone"><a href="tel:+34-696-98-82-43"><span class="stock_phone_email">&#128241;</span>(+34) 696 98 82 43</a></p>
        <p class="seller_email"><a href="mailto:sricci@silverseacontainers.com"><span class="stock_phone_email">&#128231;</span></a></p>
      </div>
      <div class="region_sellers">
        <p class="seller_name">Francisco Mulet</p>
        <p class="seller_phone"><a href="tel:+34-689-666-142"><span class="stock_phone_email">&#128241;</span>(+34) 689 666 142</a></p>
        <p class="seller_email"><a href="mailto:fmulet@silverseacontainers.com"><span class="stock_phone_email">&#128231;</span></a></p>
      </div>
      <div class="region_sellers">
        <p class="seller_name">Alain Wevar</p>
        <p class="seller_phone"><a href="tel:+34-683-623-698"><span class="stock_phone_email">&#128241;</span>(+34) 683 623 698</a></p>
        <p class="seller_email"><a href="mailto:awevar@silverseacontainers.com"><span class="stock_phone_email">&#128231;</span></a></p>
      </div>

      <h4 class="region_title">CIS & ASIA</h4>
      <div class="region_sellers">
        <p class="seller_name">Sinder Tamimi</p>
        <p class="seller_phone"><a href="tel:+34-646-504-571"><span class="stock_phone_email">&#128241;</span>(+34) 646 504 571</a></p>
        <p class="seller_email"><a href="mailto:stamimi@silverseacontainers.com"><span class="stock_phone_email">&#128231;</span></a></p>
      </div>
      <div class="region_sellers">
        <p class="seller_name">Farhodjon Abdulazizov</p>
        <p class="seller_phone"><a href="tel:+998-949-23-11-33"><span class="stock_phone_email">&#128241;</span>(+998) 949 23 11 33</a></p>
        <p class="seller_email"><a href="mailto:fabdulazizov@silverseacontainers.com"><span class="stock_phone_email">&#128231;</span></a></p>
      </div>
      <div class="region_sellers">
        <p class="seller_name">Fancy Ding</p>
        <p class="seller_phone"><a href="tel:+86-158-53-215-547"><span class="stock_phone_email">&#128241;</span>(+86) 158 5321 5547</a></p>
        <p class="seller_email"><a href="mailto:fding@silverseacontainers.com"><span class="stock_phone_email">&#128231;</span></a></p>
      </div>

      <h4 class="region_title">LATAM</h4>
      <div class="region_sellers">
        <p class="seller_name">Mathias Sosa</p>
        <p class="seller_phone"><a href="tel:+598-99-101-199"><span class="stock_phone_email">&#128241;</span>(+598) 99 101 199</a></p>
        <p class="seller_email"><a href="mailto:msosa@silverseacontainers.com"><span class="stock_phone_email">&#128231;</span></a></p>
      </div>
      <div class="region_sellers">
        <p class="seller_name">Nicolás Lingordo</p>
        <p class="seller_phone"><a href="tel:+598-99-101-057"><span class="stock_phone_email">&#128241;</span>(+598) 99 101 057</a></p>
        <p class="seller_email"><a href="mailto:nlingordo@silverseacontainers.com"><span class="stock_phone_email">&#128231;</span></a></p>
      </div>
    </div>
  </div>
</div>


<div class="" id="display">
</div>

<?php get_footer() ?>
