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
	<table class="ui striped table">
		<thead>
			<tr>
				<th class="four wide">Naam</th>
				<th class="four wide">Startdatum</th>
				<th class="four wide">Einddatum</th>
				<th class="four wide"></th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($project->tasks as $task) : ?>
			<tr>
				<td><?php print $task->name;?></td>
				<td><?php print (new DateTime($task->start_date))->format('d-m-Y');?></td>
				<?php if(!is_null($task->end_date)) : ?>
				<td><?php print (new DateTime($task->end_date))->format('d-m-Y');?></td>
				<?php else : ?>
				<td>-</td>
				<?php endif;?>
				<td></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table> <!-- /.ui /.striped /.table -->
	<?php else : ?>
	<p>Er zijn nog geen taken gekoppeld aan dit project.</p>
	<?php endif;?>
	<a class="ui tiny icon labeled primary button" href="<?php print action('TaskController@getCreate', [$project_id]);?>">
		<i class="plus icon"></i>
		Taak toevoegen
	</a> <!-- /.ui /.tiny /.icon /.labeled /.primary /.button -->
</div> <!-- /.ui /.very /.padded /.basic /.segment /.container -->
