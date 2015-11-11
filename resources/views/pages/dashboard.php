<div class="ui container">
	<div class="ui basic segment">
		<h2 class="ui header">Hallo <em><?php print Auth::user()->name;?></em></h2>
		<p>Hier komt je profiel, met een korte beschrijving van jezelf.</p>
	</div> <!-- /.ui /.basic /.segment -->

	<div class="ui horizontal divider">Je projecten</div>

	<div class="ui basic segment">
		<?php if($projects->count() == 0) : ?>
		<p>Je hebt nog geen projecten. Wil je er een aanmaken?</p>
		<a href="#" class="ui primary labeled icon button">
			<i class="plus icon"></i>
			Project aanmaken
		</a> <!-- /.ui /.primary /.labeled /.icon /.button -->
		<?php else : ?>
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
		<?php endif;?>
	</div> <!-- /.ui /.basic /.segment -->
</div> <!-- /.ui /.container -->
