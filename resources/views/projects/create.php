<div class="ui very padded basic segment container">
	<h1 class="ui dividing header">Projecten</h1>
	<form method="post" action="<?php print action('ProjectController@postCreate');?>">
		<?php print csrf_field();?>
		<div class="ui form">
			<div class="required field">
				<label for="name">Projectnaam</label>
				<input type="text" name="name" placeholder="De naam van het project" />
			</div> <!-- /.required /.field -->

			<div class="required field">
				<label for="start_date">Startdatum</label>
				<input type="text" name="start_date" placeholder="De startdatum van het project" value="<?php print $now;?>" />
			</div> <!-- /.required /.field -->

			<div class="field">
				<label for="end_date">Einddatum (optioneel)</label>
				<input type="text" name="end_date" placeholder="De einddatum van het project" />
			</div> <!-- /.field -->

			<div class="field">
				<label for="description">Projectomschrijving</label>
				<textarea name="description" placeholder="Een (korte) projectomschrijving"></textarea>
			</div> <!-- /.field -->

			<div class="ui center aligned basic segment">
				<button class="ui gray labeled icon button" type="reset">
					<i class="remove icon"></i>
					Opnieuw
				</button> <!-- /.ui /.gray /.labeled /.icon /.button -->
				<button class="ui green labeled icon button" type="submit">
					<i class="checkmark icon"></i>
					Opslaan
				</button> <!-- /.ui /.green /.labeled /.icon /.button -->
			</div> <!-- /.ui /.center /.aligned /.basic /.segment -->
		</div> <!-- /.ui /.form -->
	</form>
</div> <!-- /.ui /.very /.padded /.basic /.segment /.container -->
