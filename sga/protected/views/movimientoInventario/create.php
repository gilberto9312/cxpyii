

  <script type="text/javascript">
function redireccionar(){
  document.getElementById('id01').style.display='block';
} 
setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
</script>
  <div id="id01" whith="200" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Opcion</h2>
      </header>
      <div class="w3-container">
        <p>  <a href="cargo" button class="w3-button w3-black">Cargo</a>
        <a href="descargo" button class="w3-button w3-black">Descargo</a></p>
      </div>
      <footer class="w3-container w3-teal">
        <p>Los Araguaneyes</p>
      </footer>
    </div>
  </div>
</div>