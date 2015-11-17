<div class="ui very padded basic segment container">
	<h1 class="ui dividing header">Project <em><?php print $project->name;?></em> bewerken</h1>
	<form method="post" action="<?php print action('ProjectController@postUpdate');?>">
		<?php print csrf_field();?>
		<input type="hidden" name="id" value="<?php print $project->id;?>" />
		<div class="ui form">
			<div class="required field">
				<label for="name">Projectnaam</label>
				<input type="text" name="name" placeholder="De naam van het project" value="<?php print old('name', $project->name);?>" />
			</div> <!-- /.required /.field -->

			<div class="required field">
				<label for="start_date">Startdatum</label>
				<input type="text" name="start_date" placeholder="De startdatum van het project" value="<?php print old('start_date', $start_date);?>" />
			</div> <!-- /.required /.field -->

			<div class="field">
				<label for="end_date">Einddatum (optioneel)</label>
				<input type="text" name="end_date" placeholder="De einddatum van het project" value="<?php print old('end_date', $end_date);?>" />
			</div> <!-- /.field -->

			<div class="field">
				<label for="description">Projectomschrijving</label>
				<textarea name="description" placeholder="Een (korte) projectomschrijving"><?php print old('description', $project->description);?></textarea>
			</div> <!-- /.field -->

			<div class="ui center aligned basic segment">
				<?php if($project->tasks->count() == 0) : ?>
				<a class="ui red labeled icon button" href="<?php print action('ProjectController@getDelete', [$project->id]);?>">
					<i class="remove icon"></i>
					Verwijderen
				</a> <!-- /.ui /.red /.labeled /.icon /.button -->
				<?php endif;?>
				<button class="ui gray labeled icon button" type="reset">
					<i class="undo icon"></i>
					Opnieuw
				</button> <!-- /.ui /.gray /.labeled /.icon /.button -->
				<button class="ui green labeled icon button" type="submit">
					<i class="checkmark icon"></i>
					Opslaan
				</button> <!-- /.ui /.green /.labeled /.icon /.buttonb -->
			</div> <!-- /.ui /.center /.aligned /.basic /.segment -->
		</div> <!-- /.ui /.form -->
	</form>
</div> <!-- /.ui /.very /.padded /.basic /.segment /.container -->
