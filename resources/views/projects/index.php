<div class="ui very padded basic segment container">
	<?php if($projects->count() > 0) : ?>
		<h1 class="ui dividing header">
			Projecten
			<a class="ui right floated primary tiny button"><i class="plus icon"></i> Toevoegen</a>
		</h1> <!-- /.ui /.dividing /.header -->

		<table class="ui striped table">
			<thead>
				<tr>
					<th class="two wide">Projectnaam</th>
					<th class="two wide">Startdatum</th>
					<th class="two wide">Einddatum</th>
					<th class="seven wide">Omschrijving</th>
					<th class="three wide">
					</th> <!-- /.three /.wide -->
				</tr>
			</thead>

			<tbody>
				<?php foreach($projects as $project) : ?>
				<tr>
					<td><?php print $project->name;?></td>
					<td><?php print (new DateTime($project->start_date))->format('d-m-Y');?></td>
					<?php if($project->end_date) : ?>
					<td><?php print (new DateTime($project->end_date))->format('d-m-Y');?></td>
					<?php else : ?>
					<td>-</td>
					<?php endif;?>
					<td>
						<?php print $project->description;?>
					</td>
					<td>
						<a class="ui tiny labeled icon button" href="<?php print action('ProjectController@getDetails', [$project->id]);?>">
							<i class="search icon"></i>
							Details
						</a> <!-- /.ui /.tiny /.labeled /.icon /.button -->
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table> <!-- /.ui /.striped /.table -->
	<?php else : ?>
	<div class="ui message">
		<div class="header">Geen projecten</div>
		<p>Er zijn helaas nog geen projecten beschikbaar. Wil je er een toevoegen?</p>
		<a href="<?php print action('ProjectController@getCreate');?>" class="ui primary icon labeled button">
			<i class="plus icon"></i>
			Toevoegen
		</a> <!-- /.ui /.primary /.icon /.labeled /.button -->
	</div> <!-- /.ui /.message -->
	<?php endif;?>
</div> <!-- /.ui /.very /.padded /.basic /.segment /.container -->
