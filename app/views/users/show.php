<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/home.php'); ?>

<div class="content">
	<h1>Details of <?php echo($user->toArray()['first_name']. ' '.$user->toArray()['last_name']); ?> </h1>
	<input type="hidden" id="user_id" value=<?php echo($user->toArray()['id']); ?> >
	
	<div class="container">
		<div class="jumbotron">
			<form>
				<div class="form-group row">
			    	<label for="first_name" class="col-sm-2 col-form-label">First Name</label>
			    	<div class="col-sm-10">
			      		<input type="text" class="form-control" id="first_name" value=<?php echo $user->toArray()['first_name'] ?> readonly>
			    	</div>
			  	</div>
				<div class="form-group row">
			    	<label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
			    	<div class="col-sm-10">
			      		<input type="text" class="form-control" id="last_name" value=<?php echo $user->toArray()['last_name'] ?> readonly>
			    	</div>
			  	</div>

			  	<div class="form-group row">
			    	<label for="mobile_number" class="col-sm-2 col-form-label">Mobile Number</label>
			    	<div class="col-sm-10">
			      		<input type="text" class="form-control" id="mobile_number" value=<?php echo $user->toArray()['mobile_number'] ?> readonly>
			    	</div>
			  	</div>

			  	<div class="form-group row">
			    	<label for="email" class="col-sm-2 col-form-label">Email</label>
			    	<div class="col-sm-10">
			      		<input type="text" class="form-control" id="email" value=<?php echo $user->toArray()['email'] ?> readonly>
			    	</div>
			  	</div>
			</form>	
		</div>
	</div>

	<button href="#addPlansAccordion" id="openPlansBtn" @click="openPlansAccordion()">Add Plans</button>

	<div class="container">
		<h2>List of Users Plan</h2>

		<table class="table">
			<tr>
				<th>id</th>
				<th>Name</th>
				<th>Controls</th>
			</tr>
			
			<?php 
				foreach($user->plans()->toArray() as $plan)
				echo("<tr>
					<td>".$plan['plan_id']."</td>
					<td>".$plan['name']."</td>
					<td><a href='/plans/".$plan['plan_id']."'>View</a>
					</tr>"
				);
			?>

			
		</table>
	</div>


	<div id="plansModal" class="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Add Plans</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <select class="form-control" id="plans_select">
	        	
	        </select>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" id="attachPlan" class="btn btn-primary">Attach</button>
	      </div>
	    </div>
	  </div>
	</div>

</div>



<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/templates/footer.php');?>
