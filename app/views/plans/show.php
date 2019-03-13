<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/home.php'); ?>

<div class="content">
	<h1>Details of <?php echo($plan->toArray()['name']); ?> </h1>
	<input type="hidden" id="plan_id" value=<?php echo($plan->toArray()['id']); ?> >
	<button href="#addDaysAccordion" id="openDaysBtn" @click="openDaysAccordion()">Add Days</button>

	<div class="container">
		<h2>List of Plan's Days</h2>

		<table class="table">
			<tr>
				<th>id</th>
				<th>Name</th>
				<th>Controls</th>
			</tr>
			
			<?php 
				foreach($plan->days()->toArray() as $day)
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
        <h5 class="modal-title">Add days</h5>
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
        <button type="button" id="attachDay" class="btn btn-primary">Attach</button>
      </div>
    </div>
  </div>
</div>


</div>



<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/templates/footer.php');?>
