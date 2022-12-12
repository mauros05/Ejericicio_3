l<div class="login-container">
  <div class="container login">
    <form action="" method="post" id="formu">
      <h1 class="mb-3 mt-5">Log In</h1>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="text" name="usuario" class="form-control" id="email" aria-describedby="emailHelp" value='<?= isset($dato['usuario'])? $dato['usuario'] : '' ?>'>
        <div id="validationUser" style="color: red;" class="mb-3" hidden>
          Hola User
        </div>
      </div>
      
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" value='<?= isset($dato['password'])? $dato['password'] : '' ?>'>
        <div id="validationPassword" style="color: red;" class="mb-3" hidden>
          Hola Password
        </div>
      </div>
      
      <button type="submit" name="enviar" class="btn btn-dark" id="Login">Submit</button>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="div-message">
        ...
      </div>
    </div>
  </div>
</div>


<style>
  .login-container {
    display: flex;
    justify-content: center;
    align-content: center;
  }

  .login{
    margin-top: 100px;
    height: 500px;
    width: 500px;
  }

</style>
