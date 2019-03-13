<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/home.php'); ?>

<div class="content">
	<h1>List Exercises</h1>

	<div class="containter">
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Calories</th>
				<th>Free Weight</th>
				<th>View</th>
			</tr>



			<?php 
				foreach($exercises as $exercise)

				echo("<tr>
					<td>".$exercise['id']."</td>
					<td>".$exercise['name']."</td>
					<td>".$exercise['calories']."</td>
					<td>".(($exercise['free_weight']==1)?"True":"False")."</td>
					<td><a href='/exercises/".$exercise['id']."'>View</a>
					</tr>"
				);
			?>
		</table>		
	</div>

</div>



<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/templates/footer.php');?>
