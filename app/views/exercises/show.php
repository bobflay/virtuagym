<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/home.php'); ?>

<div class="content">
	<h1>Details of <?php echo($exercise->toArray()['name']); ?> </h1>

<input type="hidden" id="exercise_id" value=<?php echo($exercise->toArray()['id']); ?> >

	<button href="#addDaysAccordion" id="openDaysBtn" >Add Days</button>

	<div class="container">
		<h2>List of exercise days</h2>

		<table class="table">
			<tr>
				<th>id</th>
				<th>Name</th>
				<th>Controls</th>
			</tr>
			
			<?php 
				foreach($exercise->days()->toArray() as $day)
				echo("<tr>
					<td>".$day['day_id']."</td>
					<td>".$day['name']."</td>
					<td><a href='/days/".$day['day_id']."'>View</a>
					</tr>"
				);
			?>

			
		</table>

	</div>


	<div id="daysModal" class="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Add Days</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <select class="form-control" id="days_select">
	        	
	        </select>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" id="attachDayExercise" class="btn btn-primary">Attach</button>
	      </div>
	    </div>
	  </div>
	</div>

</div>

</div>



<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/templates/footer.php');?>
