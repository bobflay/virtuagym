<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/home.php'); ?>

<div class="content">
	<h1>Create Exercise</h1>

	<div class="container">
		
		<form>

		  <div class="form-group row">
		    <label for="name" class="col-sm-2 col-form-label">Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="name" placeholder="Name">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="calories" class="col-sm-2 col-form-label">Calories</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="calories" placeholder="Calories">
		    </div>
		  </div>
		  <div class="form-group form-check">
		    <input type="checkbox" class="form-check-input" id="free_weight">
		    <label class="form-check-label" for="free_weight">Free Weight</label>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" id="create_exercise" class="btn btn-primary">Create</button>
		    </div>
		  </div>

		</form>

	</div>


</div>



<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/templates/footer.php');?>