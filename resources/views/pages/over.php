<!DOCTYPE html>

<html lang="nl">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Sebastiaan Franken" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
		<title>Projectbeheer software | Voor kleine en grote projecten</title>
		<link rel="stylesheet" type="text/css" href="/css/semantic.min.css" />
		<link rel="stylesheet" type="text/css" href="/css/pages.css" />
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/semantic.min.js"></script>
	</head>

	<body>
		<?php if(session('message')) : ?>
		<div class="ui container">
			<div class="ui warning session message">
				<i class="comment outline icon"></i>
				<?php print session('message');?>
			</div> <!-- /.ui /.icon /.message -->
		</div>
		<?php endif;?>

		<div class="ui vertical stripe segment">
			<h1 class="ui center aligned icon extra huge header">
				<i class="circular idea icon"></i>
				Projectbeheer
			</h1> <!-- /.ui /.center /.aligned /.icon /.header -->
		</div>

		<div class="ui vertical stripe segment">
			<div class="ui middle aligned stackable grid container">
				<div class="row">
					<div class="eight wide column">
						<h2 class="ui header">Tijd is geld</h2>
						<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>

						<h2 class="ui header">Projectsoftware die <em>niet</em> in de weg zit</h2>
						<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
					</div> <!-- /.eight /.wide /.column -->

					<div class="six wide right floated column">
						<img src="/images/over-leader-1.png" class="ui large borderd rounded image" />
						<div class="ui pointing basic label">Weg met <em>todo lijstjes</em>!</div>
					</div> <!-- /.six /.wide /.right /.floated /.column -->
				</div> <!-- /.row -->
			</div> <!-- /.ui /.middle /.aligned /.stackable /.grid /.container -->
		</div> <!-- /.ui /.vertical /.stripe /.segment -->

		<div class="ui vertical stripe quote segment">
			<div class="ui equal width stackable internally celled grid">
				<div class="center aligned row">
					<div class="column">
						<h2>"Prima te gebruiken software!"</h2>
						<p><strong>Sebastiaan</strong> - Zelfstandig ontwikkelaar</p>
					</div> <!-- /.column -->

					<div class="column">
						<h2>"Mooi vormgegeven en helder"</h2>
						<p><strong>Roy</strong> - Programmeur &amp; Webdesigner</p>
					</div> <!-- /.column -->
				</div> <!-- /.center /.aligned /.row -->
			</div> <!-- /.ui /.equal /.width /.stackable /.internally /.celled /.grid -->
		</div> <!-- /.ui /.vertical /.stripe /.quote /.segment -->

		<div class="ui vertical stripe segment">
			<div class="ui middle aligned stackable grid container">
				<div class="row">
					<div class="six wide column">
						<img src="/images/over-leader-2.png" class="ui large borderd rounded image" />
						<div class="ui pointing basic label">Nooit meer dit.</div>
					</div> <!-- /.six /.wide /.column -->

					<div class="eight wide right floated column">
						<h2 class="ui header">Gebouwd met de toekomst in het achterhoofd</h2>
						<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>

						<h2 class="ui header">Web software, dus overal te gebruiken</h2>
						<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
					</div> <!-- /.eight /.wide /.right /.floated /.column -->
				</div> <!-- /.row -->
			</div> <!-- /.ui /.middle /.aligend /.stackable /.grid /.container -->
		</div> <!-- /.ui /.vertical /.stripe /.segment -->

		<div class="ui vertical stripe segment">
			<div class="ui two column middle aligned very relaxed stackable grid container">
				<div class="column">
					<h2 class="ui center aligend header">Inloggen</h2>
					<div class="ui form">
						<form method="post" action="<?php print action('Auth\AuthController@postLogin'); ?>">
							<?php print csrf_field();?>
							<div class="field">
								<label for="username">E-mailadres</label>
								<div class="ui left icon input">
									<input type="text" name="email" placeholder="Je e-mailadres" />
									<i class="user icon"></i>
								</div> <!-- /.ui /.left /.icon /.input -->
							</div> <!-- /.field -->
							<div class="field">
								<label for="password">Wachtwoord</label>
								<div class="ui left icon input">
									<input type="password" name="password" placeholder="Je wachtwoord" />
									<i class="lock icon"></i>
								</div> <!-- /.ui /.left /.icon /.input -->
							</div> <!-- /.field -->

							<button type="submit" class="ui blue submit button">Login</button>
							<button type="reset" class="ui button">Opnieuw</button>
						</form>
					</div> <!-- /.ui /.form -->
				</div> <!-- /.column -->

				<div class="ui vertical divider">
					Of
				</div> <!-- /.ui /.vertical /.divider -->

				<div class="center aligned column">
					<a href="#" class="ui big green labeled icon button">
						<i class="signup icon"></i>
						Registreren
					</a> <!-- /.ui /.big /.green /.labeled /.icon /.button -->
				</div> <!-- /.column -->
			</div> <!-- /.ui /.two /.column /.middle /.aligned /.very /.relaxed /.stackable /.grid /.container -->
		</div> <!-- /.ui /.vertical /.stripe /.segment -->

		<div class="ui inverted vertical footer segment">
			<div class="ui container">
				<p>&copy; Sebastiaan Franken <?php print (new DateTime())->format('Y');?></p>
			</div> <!-- /.ui /.container -->
		</div> <!-- /.ui /.inverted /.vertical /.footer /.segment -->
	</body>
</html>
