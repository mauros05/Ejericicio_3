<div class="container table-users mt-5">
	<table class="table">
	  <thead>
		<tr class='table-dark'>
		  <th scope="col">Nombre</th>
		  <th scope="col">Apellido Paterno</th>
		  <th scope="col">Apellido Materno</th>
		  <th scope="col">Email</th>
		  <th scope="col">Etatus</th>
		  <th scope="col">Acciones</th>
		</tr>
	  </thead>
	  <tbody>
	  
	  <?php
		for($i=0; $i<count($res['nombres']); $i++){
	  ?>
		<tr class='table-light'>
		  <td><?php echo $res['nombres'][$i]; ?></td>
		  <td><?php echo $res['ap_pat'][$i]; ?></td>
		  <td><?php echo $res['ap_mat'][$i]; ?></td>
		  <td><?php echo $res['email'][$i]; ?></td>
		  <td><?php echo $res['status'][$i]; ?></td>
		  <td><a href="usuario.php?ac=m&&i=<?php echo $res['id_usuario'][$i] ?>" class="btn btn-primary">Editar</a></td>
		</tr>
	  <?php } ?>



	 </tbody>
	</table>
</div>