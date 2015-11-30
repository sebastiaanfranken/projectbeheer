<div class="ui very padded basic segment container">
	<h1 class="ui dividing header">
		Details van <em><?php print $task->name;?></em></h1>
	</h1> <!-- /.ui /.dividing /.header -->

	<table class="ui celled table">
		<tbody>
			<tr>
				<td class="two wide">Naam</td>
				<td class="fourteen wide"><?php print $task->name;?></td>
			</tr>
			<tr>
				<td class="two wide">Project</td>
				<td class="fourteen wide"><?php print $task->project->name;?></td>
			</tr>
			<tr>
				<td class="two wide">Startdatum</td>
				<td class="fourteen wide"><?php print (new DateTime($task->start_date))->format('d-m-Y');?></td>
			</tr>
			<tr>
				<td class="two wide">Einddatum</td>
				<td class="fourteen wide"><?php print isset($task->end_date) ? (new DateTime($task->end_date))->format('d-m-Y') : '-';?></td>
			</tr>
			<tr>
				<td class="two wide">Beschrijving</td>
				<td class="fourteen wide"><?php print $task->description;?></td>
			</tr>
		</tbody>
	</table> <!-- /.ui /.celled /.table -->

	<a class="ui tiny primary labeled icon button" href="<?php print action('TaskController@getUpdate', [$task->id]);?>">
		<i class="edit icon"></i>
		Wijzigen
	</a> <!-- /.ui /.tiny /.primary /.labeled /.icon /.button -->
</div> <!-- /.ui /.very /.padded /.basic /.segment /.container -->
