<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Area</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<section id="Login" class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Iniciar sesión</h2>
              
              <form action="?controller=usuario&action=verificaLogin" method="post">

                <div class="form-outline form-white mb-4">
                  <input type="text" name="email" class="form-control form-control-lg" required/>
                  <label class="form-label" for="typeEmailX">Email</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" name="password" class="form-control form-control-lg" required/>
                  <label class="form-label" for="typePasswordX">Contraseña</label>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Ha olvidado su contraseña?</a></p>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Iniciar sesión</button>
              </form>


              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">No tienes cuenta? <a href="?controller=Dashboard&action=addUsuario" class="text-white-50 fw-bold">Registrate</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


</section>
</body>
</html>

