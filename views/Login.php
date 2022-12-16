<div class="login-container">
  <div class="container login">
    <h1>Sistema de Compras 
      <span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="fill:blueviolet; height:90px; width:90px">
          <path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"/>
        </svg>
      </span>
    </h1>
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
