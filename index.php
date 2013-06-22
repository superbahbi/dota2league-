<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dota2League</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
<?php
		include './src/api.php';
		$api = new api();
		$steam_api_key = '06243C06702C63017DCD25C95498849E';
		$dota_webapi_listing ='GetLeagueListing';
	
		$api->url = 'http://api.steampowered.com/IDOTA2Match_570/'.$dota_webapi_listing.'/v1/?key='.$steam_api_key;
		
		try {
		$data = $api->get_api_data();
		} catch (Exception  $e ) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
		} 
?>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="#">Dota2League</a>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
	  	<?php 
	  	foreach ( $data->result->leagues as $league ) {
			echo ' <div class="span4">';
			echo '<p><a class="btn" href="'.$league->tournament_url.'">'.$league->name .'</a></p>';
			echo '<p> League ID : '. $league->leagueid .'</p>';
			echo '</div>';
		}
	    ?>
      </div>

      <hr>
    </div> <!-- /container -->
  </body>
</html>
