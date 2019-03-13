<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/home.php'); ?>

<div class="content">
	<h1>List Exercises</h1>

	<div class="containter">
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Control</th>
			</tr>



			<?php 
				foreach($days as $day)

				echo("<tr>
					<td>".$day['id']."</td>
					<td>".$day['name']."</td>
					<td><a href='/days/".$day['id']."'>View</a>
					</tr>"
				);
			?>
		</table>		
	</div>

</div>


<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/templates/footer.php');?>
