<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/home.php'); ?>

<div class="content">
	<h1>Inside Create Plan</h1>

	<div class="container">
		
		<form>

		  <div class="form-group row">
		    <label for="name" class="col-sm-2 col-form-label">Plan's Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="name" placeholder="Plan's Name">
		    </div>
		  </div>

		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" id="create_plan" class="btn btn-primary">Create</button>
		    </div>
		  </div>

		</form>

	</div>


</div>



<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/templates/footer.php');?>
