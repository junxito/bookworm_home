<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none';location.href='logout.php'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="../resgister.php" method="POST">
    <div class="panel panel-register panel2">
      <div class="panel-heading">
        <div class="row-register">
          <div class="col-md-6-register"> <!--Fase2: No debes crear la clase col-md-6-register -->
            <i class="fa-sharp fa-solid fa-user"></i>
          </div>
          <div class="col-md-6-register">
            <a href="#" class="active" id="register-form-link">CREAR CUENTA</a>
          </div>
        </div>
        <hr>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-12">
            <form id="register-form" action="" method="post" role="form" style="display: block;">
              <div class="form-group">
                <p>Correo electronico</p>
                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="@example.com" value="<?php echo $_SESSION['user_email_address']; ?>" required>
              </div>
              <div class="form-group">
                <p>Contraseña</p>
                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Al menos 6 caracteres" required pattern="^[A-Za-z\d.]+$">
              </div>
              <div class="form-group">
                <p>Confirma tu contrtaseña</p>
                <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmar contraseña" required>
              </div>
              <div class="form-group">
                <p>Nombre</p>
                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Nombre de usuario" value="<?php echo $_SESSION['user_first_name']; ?>" required>
              </div>
              <div class="form-group">
                <p>Apellido 1</p>
                <input type="text" name="lastname1" id="lastname1" tabindex="1" class="form-control" placeholder="Apellido 1" value="<?php echo $_SESSION['user_last_name']; ?>" required>
              </div>
              <div class="form-group">
                <p>Apellido 2</p>
                <input type="text" name="lastname2" id="lastname2" tabindex="1" class="form-control" placeholder="Apellido 2" required>
              </div>
              <div class="form-group">
                <p>Fecha de Nacimiento</p>
                <input type="date" name="birthdate" id="birthdate" tabindex="1" class="form-control" required>
              </div>
              <div class="form-group">
                <p>País</p>
                <input type="text" name="pais" id="pais" tabindex="1" class="form-control" placeholder="País" required>
              </div>
              <div class="form-group">
                <p>Código Postal</p>
                <input type="text" name="postalcode" id="postalcode" tabindex="1" class="form-control" placeholder="Código Postal del país" required>
              </div>
              <div class="form-group">
                <p>Teléfono</p>
                <input type="text" name="phone" id="phone" tabindex="1" class="form-control" placeholder="Teléfono de contacto" required>
              </div>
              <div class="form-group">
                <p>Rol</p>
                <select name="rol">
                  <option value="valorador">Valorador</option>
                  <option value="administrador">Administrador</option>
                  <option value="editor">Editor</option>
                </select>
              </div>
              <!--
              <div class="form-group">
                <label for="captcha">
                  <?php if (isset($_GET["captchaerror"]))
                    echo "<p>Captcha Inválido. Vuelva a introducirlo</p>";
                  else
                    echo "<p>Introduce el captcha: </p>";
                  ?>
                </label>
                    <img src="includes/captcha.php" alt="CAPTCHA" class="captcha-image">
                    <i class="text-white fa-lg fas fa-redo refresh-captcha" onclick="refreshCaptcha()"></i>
                    <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}">
                    <button class="g-recaptcha btn btn-outline-secondary rounded-3" data-sitekey="reCAPTCHA_site_key" data-callback='onSubmit' data-action='submit'>NO SOY UN ROBOT</button>
              </div>
              -->
              <div class="row-button">
                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-mediano" value="REGISTRARSE">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </form>
  <script>
    /*
  var refreshButton = document.querySelector(".refresh-captcha");
  refreshButton.onclick = function() {
    document.querySelector(".captcha-image").src = 'includes/generatecaptcha.php?' + Date.now();
  }*/
  </script>
</div>