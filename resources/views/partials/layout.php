<!DOCTYPE html>

<html lang="nl">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Sebastiaan Franken" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
		<title>Projectbeheer software | <?php print $subtitle;?></title>
		<link rel="stylesheet" type="text/css" href="/css/semantic.min.css" />
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/semantic.min.js"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			// Triggers dropdown menus
			$('.dropdown').dropdown();
		});
		</script>
		<style type="text/css">body { padding-top: 50px; }</style>
	</head>

	<body>
		<div class="ui inverted large top fixed menu">
			<div class="header item">
				<i class="idea icon"></i>
				Projectbeheer
			</div> <!-- /.header /.item -->
			<a class="item" href="<?php print url('/');?>">Dashboard</a>
			<a class="item" href="#">Projecten</a>
			<a class="item" href="#">Taken</a>
			<div class="right menu">
				<div class="ui dropdown item">
					<i class="user icon"></i>
					Welkom <?php print Auth::user()->name;?>
					<i class="dropdown icon"></i>
					<div class="ui menu">
						<a class="item" href="<?php print action('Auth\AuthController@getLogout');?>">Uitloggen</a>
					</div> <!-- /.ui /.menu -->
				</div> <!-- /.ui /.dropdown /.item -->
			</div> <!-- /.right /.menu -->
		</div> <!-- /.ui /.inverted /.large /.top /.fixed /.menu -->

		<?php print $content;?>
	</body>
</html>
