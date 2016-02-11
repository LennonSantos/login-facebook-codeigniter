<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
  	<meta name="description" content="<?php echo $description_page; ?>">
  	<meta name="keywords" content="<?php echo $key_page; ?>">
	<title><?php echo $title_page; ?></title>
	<link rel="icon" href="<?php echo base_url('favicon.png') ?>" type="image/png" sizes="32x32">
	<?php

		foreach ($styles as $key) {
			echo "<link rel='stylesheet' href='".base_url("assets/css/{$key}.css")."'> \n";
		}

	?>
</head>