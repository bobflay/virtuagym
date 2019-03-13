<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/home.php'); ?>

<div class="content">
	<h1>Details of <?php echo($day->toArray()['name']); ?> </h1>
	<input type="hidden" id="day_id" value=<?php echo($day->toArray()['id']); ?> >
	<button href="#addExerciseAccordion" id="openExercisessBtn" >Add Exercises</button>


	<div class="container">
		<h2>List of Day Exercises</h2>

		<table class="table">
			<tr>
				<th>id</th>
				<th>Name</th>
				<th>Controls</th>
			</tr>
			
			<?php 
				foreach($day->exercises()->toArray() as $exercise)
				echo("<tr>
					<td>".$exercise['exercise_id']."</td>
					<td>".$exercise['name']."</td>
					<td><a href='/exercises/".$exercise['exercise_id']."'>View</a>
					</tr>"
				);
			?>

			
		</table>

	</div>


	<div id="exercisesModal" class="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Add Exercises</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <select class="form-control" id="exercises_select">
	        	
	        </select>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" id="attachExercise" class="btn btn-primary">Attach</button>
	      </div>
	    </div>
	  </div>
	</div>

</div>



<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/templates/footer.php');?>
