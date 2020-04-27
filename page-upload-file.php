<?php get_header() ?>

<form class="" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="action" value="lt_upload_file">
  <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
  <input type="file" name="file" value="">
  <button type="submit" name="submit">Upload</button>
</form>

<?php get_footer() ?>
