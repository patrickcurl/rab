<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
  <h1> Attention Needed:  an Error was Found: </h1>
  <pre><?php echo $exception; ?></pre>
    <pre><?php echo $code; ?></pre>
    <pre><?php echo $url; ?></pre>
    <?php foreach($inputs as $key => $val) {
      echo $key . " - " . $val;
      } ?>
  </body>
</html>