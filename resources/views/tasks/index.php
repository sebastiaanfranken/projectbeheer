<div class="ui very padded basic segment container">
	<?php if($tasks->count() > 0) : ?>
	<h1 class="ui dividing header">Taken</h1>

	<table class="ui striped table">
		<thead>
			<tr>
				<th class="two wide">Taak</th>
				<th class="two wide">Startdatum</th>
				<th class="two wide">Einddatum</th>
				<th class="two wide">Project</th>
				<th class="five wide">Omschrijving</th>
				<th class="three wide"></th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($tasks as $task) : ?>
			<tr>
				<td><?php print $task->name;?></td>
				<td><?php print (new DateTime($task->start_date))->format('d-m-Y');?></td>
				<?php if(!is_null($task->end_date)) : ?>
				<td><?php print (new DateTime($task->end_date))->format('d-m-Y');?></td>
				<?php else : ?>
				<td>-</td>
				<?php endif;?>
				<td><?php print $task->project()->find($task->project_id)->name;?></td>
				<td><?php print $task->description;?></td>
				<td>
					<a class="ui right floated tiny labeled icon button" href="<?php print action('TaskController@getDetails', [$task->id]);?>">
						<i class="search icon"></i>
						Details
					</a> <!-- /.ui /.right /.floated /.tiny /.labeled /.icon /.button -->
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table> <!-- /.ui /.striped /.table -->
	<a class="ui primary tiny labeled icon button" href="<?php print action('TaskController@getCreate');?>"><i class="plus icon"></i> Toevoegen</a>
	<?php else : ?>
	<div class="ui message">
		<div class="header">Geen taken</div>
		<p>Er zijn nog geen taken toegevoegd. Wil je er een toevoegen?</p>
		<a href="<?php print action('TaskController@getCreate');?>" class="ui tiny primary icon labeled button">
			<i class="plus icon"></i>
			Toevoegen
		</a> <!-- /.ui /.tiny /.primary /.icon /.labeled /.button -->
	</div> <!-- /.ui /.message -->
	<?php endif;?>
</div> <!-- /.ui /.very /.padded /.basic /.segment /.container -->
