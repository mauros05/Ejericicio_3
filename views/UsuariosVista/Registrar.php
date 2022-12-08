<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <h1 class="mb-3">Agregar Usuario</h1>
			
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres:</label>
            <input type="text"  class="form-control" name="nombres" id="nombres" value='<?= isset($dato['nombres'])? $dato['nombres'] : '' ?>'/>
        </div>
		<?php if(isset($respuesta['nombre'])) {?>
			<div id="validationServer04Feedback" style="color: red;" class="mb-3">
			  <?php echo $respuesta['nombre']; ?>
			</div>
		<?php }?>

        <div class="mb-3">
            <label for="ap_pat" class="form-label">Apellido Paterno:</label>
            <input type="text" name="ap_pat" class="form-control" id="ap_pat" value='<?= isset($dato['ap_pat'])? $dato['ap_pat'] : '' ?>'/>
        </div>
		<?php if(isset($respuesta['ap_pat'])) {?>
			<div id="validationServer04Feedback" style="color: red;" class="mb-3">
			  <?php echo $respuesta['ap_pat']; ?>
			</div>
		<?php }?>
        
        <div class="mb-3">
            <label for="ap_mat" class="form-label">Apellido Materno:</label>
            <input type="text" name="ap_mat" class="form-control" id="ap_mat" value='<?= isset($dato['ap_mat'])? $dato['ap_mat'] : '' ?>'/>
        </div>
		<?php if(isset($respuesta['ap_mat'])) {?>
			<div id="validationServer04Feedback" style="color: red;" class="mb-3">
			  <?php echo $respuesta['ap_mat']; ?>
			</div>
		<?php }?>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" id="email" value='<?= isset($dato['email'])? $dato['email'] : '' ?>'/>
        </div>
		<?php if(isset($respuesta['email'])) {?>
			<div id="validationServer04Feedback" style="color: red;" class="mb-3">
			  <?php echo $respuesta['email']; ?>
			</div>
		<?php }?>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" id="password" value='<?= isset($dato['password'])? $dato['password'] : '' ?>'/>
        </div>
		<?php if(isset($respuesta['password'])) {?>
			<div id="validationServer04Feedback" style="color: red;" class="mb-3">
			  <?php echo $respuesta['password']; ?>
			</div>
		<?php }?>
		
		<?php if(isset($respuesta['mysql_error'])) {?>
			<div class="alert alert-danger d-flex align-items-center" role="alert">
			  <div>
				 <?php echo $respuesta['mysql_error']; ?>
			  </div>
			</div>
		<?php } ?>

		<?php if(isset($respuesta['mysql_success'])) {?>
			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<?php echo $respuesta['mysql_success']; ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Understood</button>
					</div>
					</div>
				</div>
			</div>
		<?php }?>
 
        <input type="submit" value="Agregar Usuario" name="submitNewUsuario" class="btn btn-primary"/>
    </form>
</div>

