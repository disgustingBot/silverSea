<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<?php // if (isset($_GET[0])) { ?>
  <div class="vars">
    <h1>GET:</h1>
    <?php foreach ($_GET as $key => $value) { ?>
      <p><span><?php echo $key; ?></span> -> <span><?php echo $value; ?></span></p>
    <?php } ?>
  </div>
<?php // } ?>
    
</body>
</html>