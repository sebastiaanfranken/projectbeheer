<div class="ui very padded basic segment container">
	<div class="ui centered card">
		<div class="content">
			<div class="header">Weet je het zeker?</div>
		</div> <!-- /.content -->

		<div class="content">
			<div class="description">
				<p>Weet je zeker dat je het project <strong><?php print $project->name;?></strong> wilt verwijderen?</p>
			</div> <!-- /.description -->
		</div> <!-- /.content -->

		<div class="extra content">
			<form method="post" action="<?php print action('ProjectController@postDelete');?>">
				<?php print csrf_field();?>
				<input type="hidden" name="id" value="<?php print $project->id;?>" />
				<div class="ui fluid basic buttons">
					<a class="ui button" href="<?php print action('ProjectController@getUpdate', [$project->id]);?>">Nee</a>
					<button class="ui button" type="submit">Ja</button>
				</div> <!-- /.ui /.two /.center /.aligned /.buttons -->
			</form>
		</div> <!-- /.extra /.content -->
	</div> <!-- /.ui /.centered /.card -->
</div> <!-- /.ui /.very /.padded /.basic /.segment /.container -->
