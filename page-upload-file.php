<?php get_header() ?>

<form class="uploadForm" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="action" value="lt_upload_file">
  <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
  <h3 class="fileUploadLabel">Actualizar informacion</h3>
  <input class="btn file" type="file" name="file" value="">
  <button class="btn blue" type="submit" name="submit">Upload</button>
</form>

<?php get_footer() ?>
