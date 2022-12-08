<div class="container table-users mt-5">
	<table class="table">
	  <thead>
		<tr class='table-dark'>
		  <th scope="col">Folio</th>
		  <th scope="col">Fecha</th>
		  <th scope="col">Etatus</th>
		  <th scope="col">Urgencia</th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
		</tr>
	  </thead>
	  <tbody>
        <?php
            for($i=0; $i<count($resSolicitudes['folio']); $i++){
        ?>
            <tr class='table-light'>
                <td><?php echo $resSolicitudes['folio'][$i]; ?></td>
                <td><?php echo $resSolicitudes['fecha'][$i]; ?></td>
                <td><?php echo $resSolicitudes['status'][$i]; ?></td>
                <td><?php echo $resSolicitudes['urgencia'][$i]; ?></td>
                <td>
                    <a href="usuario.php?ac=m&&i=<?php echo $res['id_usuario'][$i] ?>" class="btn btn-primary">Ver</a>  
                </td>
                <td>
                    <a href="usuario.php?ac=m&&i=<?php echo $res['id_usuario'][$i] ?>" class="btn btn-warning">Autorizar</a>
                </td>
                <td>
                    <a href="usuario.php?ac=m&&i=<?php echo $res['id_usuario'][$i] ?>" class="btn btn-danger">Cancelar</a>
                </td>
            </tr>
        <?php } ?>
	 </tbody>
	</table>
</div>