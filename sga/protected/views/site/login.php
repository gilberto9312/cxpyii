  <script type="text/javascript">
function redireccionar(){
  document.getElementById('id01').style.display='block';
} 
setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
</script>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>

        <img src="../../../images/img_avatar4.png" alt="Avatar" style="width:10%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" method="post">
        <div class="w3-section">
          <label><b>Username</b></label>
           <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Usuario" name="LoginForm[username]" required>

          <label><b>Password</b></label>

          <input class="w3-input w3-border" type="password" placeholder="Contraseña" name="LoginForm[password]" required>

          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submitButton"=login value="login" >Iniciar Sesion</button>

          <input class="w3-check w3-margin-top" type="checkbox" name="LoginForm[rememberMe]" value="1"> Recordarme
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>

      </div>

    </div>
  </div>
