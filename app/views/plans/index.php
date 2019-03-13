<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/home.php'); ?>

<div class="content">
	<h1>Inside List Plan</h1>

	<div class="containter">
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>View</th>
			</tr>

			<?php 
				foreach($plans as $plan)
				echo("<tr>
					<td>".$plan['id']."</td>
					<td>".$plan['name']."</td>
					<td><a href='/plans/".$plan['id']."'>View</a>
					</tr>"
				);
			?>
		</table>		
	</div>

</div>



<?php require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/templates/footer.php');?>
