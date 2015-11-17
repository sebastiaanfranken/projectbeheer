<div class="ui very padded basic segment container">
	<h1 class="ui dividing header">
		Details van <em><?php print $project->name;?></em>
	</h1> <!-- /.ui /.dividing /.header -->

	<table class="ui celled table">
		<tbody>
			<tr>
				<td class="two wide">Naam</td>
				<td class="fourteen wide"><?php print $project->name;?></td>
			</tr>
			<tr>
				<td class="two wide">Startdatum</td>
				<td class="fourteen wide"><?php print (new DateTime($project->start_date))->format('d-m-Y');?></td>
			</tr>
			<tr>
				<td class="two wide">Einddatum</td>
				<td class="fourteen wide"><?php print isset($project->end_date) ? (new DateTime($project->end_date))->format('d-m-Y') : '-';?></td>
			</tr>
			<tr>
				<td class="two wide">Beschrijving</td>
				<td class="fourteen wide"><?php print $project->description;?></td>
			</tr>
		</tbody>
	</table> <!-- /.ui /.striped /.table -->

	<a class="ui tiny primary labeled icon button" href="<?php print action('ProjectController@getUpdate', [$project->id]);?>">
		<i class="edit icon"></i>
		Wijzigen
	</a>

	<h1 class="ui dividing header">Taken voor <em><?php print $project->name;?></em></h1>
	<?php if($project->tasks->count() > 0) : ?>
	<?php else : ?>
	<p>Er zijn nog geen taken gekoppeld aan dit project.</p>
	<?php endif;?>
	<a class="ui tiny icon labeled primary button">
		<i class="plus icon"></i>
		Taak toevoegen
	</a> <!-- /.ui /.tiny /.icon /.labeled /.primary /.button -->
</div> <!-- /.ui /.very /.padded /.basic /.segment /.container -->
