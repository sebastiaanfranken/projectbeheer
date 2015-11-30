<div class="ui container">
	<div class="ui basic segment">
		<h2 class="ui header">Hallo <em><?php print Auth::user()->name;?></em></h2>
		<p>Hier komt je profiel, met een korte beschrijving van jezelf.</p>
	</div> <!-- /.ui /.basic /.segment -->

	<div class="ui horizontal divider">Je projecten</div>

	<div class="ui basic segment">
		<?php if($projects->count() == 0) : ?>
		<p>Je hebt nog geen projecten. Wil je er een aanmaken?</p>
		<a href="<?php print action('ProjectController@getCreate');?>" class="ui primary labeled icon button">
			<i class="plus icon"></i>
			Project aanmaken
		</a> <!-- /.ui /.primary /.labeled /.icon /.button -->
		<?php else : ?>
		<table class="ui striped table">
			<thead>
				<tr>
					<th>Projectnaam</th>
					<th class="three wide"></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach($projects as $project) : ?>
				<tr>
					<td><?php print $project->name;?></td>
					<td>
						<a href="<?php print action('ProjectController@getDetails', [$project->id]);?>" class="ui right floated tiny labeled icon button">
							<i class="edit icon"></i>
							Details
						</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table> <!-- /.ui /.striped /.table -->
		<?php endif;?>
	</div> <!-- /.ui /.basic /.segment -->

	<div class="ui horizontal divider">Je taken</div>

	<div class="ui basic segment">
		<?php if($tasks->count() == 0) : ?>
			<?php if($projects->count() == 0) : ?>
			<p>Je hebt nog geen taken. Voordat je een taak kunt maken moet je eerst een project aanmaken.</p>
			<?php else : ?>
			<p>Je hebt nog geen taken. Wil je er een aanmaken?</p>
			<a href="#" class="ui primary labeled icon button">
				<i class="plus icon"></i>
				Taak aanmaken
			</a> <!-- /.ui /.primary /.labeled /.icon /.button -->
			<?php endif;?>
		<?php else : ?>
		<table class="ui striped table">
			<thead>
				<tr>
					<th>Taak</th>
					<th>Project</th>
					<th class="three wide"></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach($tasks as $task) : ?>
				<tr>
					<td><?php print $task->name;?></td>
					<td><?php print $task->project->name;?></td>
					<td>
						<a href="<?php print action('TaskController@getDetails', [$task->id]);?>" class="ui right floated tiny labeled icon button">
							<i class="edit icon"></i>
							Details
						</a> <!-- /.ui /.right /.floated /.tiny /.labeled /.icon /.button -->
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table> <!-- /.ui /.striped /.table -->
		<?php endif;?>
	</div> <!-- /.ui /.basic /.segment -->
</div> <!-- /.ui /.container -->
