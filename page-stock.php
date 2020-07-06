<?php get_header() ?>

<h2 class="stock_title">Silversea Stock</h2>

<!-- Set DB Connection -->
<?php

$pais= $_GET['pais'];
$ciudad= $_GET['ciudad'];
$container= $_GET['container'];


if($pais!="*" and $pais!=''){
  $wherePais = "and pais = '$pais'";
}
if($ciudad!="*" and $ciudad!=''){
  $whereCiudad = "and ciudad = '$ciudad'";
}
if($container!="*" and $container!=''){
  $whereContainer = "and id_contenedor = '$container'";
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


<div class="stock_main">
  <div class="table_stock">
    <div class="stock_header_row">
      <div class="table_head">
        <select class="select_stock" name="select" id="getPais">
          <option value="*">COUNTRY</option>
          <?php foreach ($list_pais as $row) {
            $pais = $row->pais;?>
            <option value="<?php echo $pais ?>"><?php  echo $pais; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="table_head">
        <select class="select_stock" name="select" id="getCiudad">
          <option value="*" >CITY</option>
          <?php foreach ($list_ciudad as $row) {
            $ciudad = $row->ciudad;?>
            <option value="<?php echo $ciudad ?>"><?php  echo $ciudad; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="table_head">
        <select class="select_stock" name="select" id="getContainer">
          <option value="*" >CONTAINER</option>
          <?php foreach ($list_container as $row) {
            $container = $row->id_contenedor;?>
            <option value="<?php echo $container ?>"><?php  echo $container; ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="table_head">QUANTITY</div>
      <div class="table_head">PRICE</div>
      <button type="button" name="button" class="btn stock_btn" onclick="filterByCountry()">Filter</button>
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
        <div class="table_column"><?php echo $stock; ?></div>
        <div class="table_column"><?php echo $supplier_price; ?></div>
      </div>
  <?php  } ?>

</div>

  <div class="contact_regions">
    <div class="region">
      <h4 class="region_title">EUROPE</h4>
      <div class="region_sellers">
        <p class="seller_name">Federico Platero</p>
        <p class="seller_phone">(+34) 683 623 698 </p>
        <p class="seller_email">fplatero@silverseacontainers.com</p>
      </div>
      <div class="region_sellers">
        <p class="seller_name">Stefano Ricci</p>
        <p class="seller_phone">(+34) 696988243</p>
        <p class="seller_email">sricci@silverseacontainers.com</p>
      </div>
      <div class="region_sellers">
        <p class="seller_name">Francisco Mulet</p>
        <p class="seller_phone">(+34) 689 666 142</p>
        <p class="seller_email">fmulet@silverseacontainers.com</p>
      </div>

      <h4 class="region_title">CIS & ASIA</h4>
      <div class="region_sellers">
        <p class="seller_name">Sinder Tamimi</p>
        <p class="seller_phone">(+34) 646 504 571</p>
        <p class="seller_email">stamimi@silverseacontainers.com</p>
      </div>
      <div class="region_sellers">
        <p class="seller_name">Farhodjon Abdulazizov</p>
        <p class="seller_phone">(+998) 949231133</p>
        <p class="seller_email">fabdulazizov@silverseacontainers.com</p>
      </div>
      <div class="region_sellers">
        <p class="seller_name">Leon Lin</p>
        <p class="seller_phone">(+86) 189 30902821</p>
        <p class="seller_email">llin@silverseacontainers.com</p>
      </div>

      <h4 class="region_title">LATAM</h4>
      <div class="region_sellers">
        <p class="seller_name">Damián González</p>
        <p class="seller_phone">(+52) 8182292083</p>
        <p class="seller_email">dgonzalez@silverseacontainers.com </p>
      </div>
      <div class="region_sellers">
        <p class="seller_name">Felipe Peña</p>
        <p class="seller_phone">(+598) 99 101 199</p>
        <p class="seller_email">fpena@silverseacontainers.com </p>
      </div>
      <div class="region_sellers">
        <p class="seller_name">Nicolás Lingordo</p>
        <p class="seller_phone">(+598) 99 101 057</p>
        <p class="seller_email">nlingordo@silverseacontainers.com</p>
      </div>
    </div>
  </div>
</div>


<div class="" id="display">
   <!-- Records will be displayed here -->
</div>

<?php get_footer() ?>
