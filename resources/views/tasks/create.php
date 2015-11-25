<div class="ui very padded basic segment container">
	<h1 class="ui dividing header">Taak toevoegen</h1>

	<form method="post" action="<?php print action('TaskController@postCreate');?>">
		<?php print csrf_field();?>
		<div class="ui form">
			<div class="required field">
				<label for="project_id">Project</label>
				<select required="required" name="project_id">
					<?php foreach($projects as $project) : ?>
					<option value="<?php print $project->id;?>" <?php print $parent_id == $project->id ? 'selected="selected"' : '';?>><?php print $project->name;?></option>
					<?php endforeach;?>
				</select>
			</div> <!-- /.required /.field -->

			<div class="required field">
				<label for="name">Naam</label>
				<input type="text" name="name" placeholder="De taaknaam" value="<?php print old('name');?>" />
			</div> <!-- /.required /.field -->

			<div class="required field">
				<label for="start_date">Startdatum</label>
				<input type="text" name="start_date" placeholder="De startdatum van de taak" value="<?php print $now;?>" />
			</div> <!-- /.required /.field -->

			<div class="field">
				<label for="end_date">Einddatum (optioneel)</label>
				<input type="text" name="end_date" placeholder="De einddatum van de taak" />
			</div> <!-- /.field -->

			<div class="field">
				<label for="description">Taakomschrijving</label>
				<textarea name="description" placeholder="Een (korte) taakomschrijving"></textarea>
			</div> <!-- /.field -->

			<div class="ui center aligned basic segment">
				<button class="ui gray labeled icon button" type="reset">
					<i class="undo icon"></i>
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
