<div class="modal fade" id="maddAnio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR CARPETAS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="add_anio" name="add_anio" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label>NOMBRE AÑO</label>
              <input type="text" class="form-control" id="mtxtAddAnio" name="mtxtAddAnio" placeholder="AGREGAR AÑO">
              <input type="hidden" name="isIdEmpp" id="isIdEmpp" value="<?php echo $emp->PK_EX_EMPRESA; ?>" >
              <input type="hidden" name="txtTRep" id="txtTRep" value="<?php echo $emp->EX_EMP_TIPO_REPOSITORIO; ?>" >
              <input type="hidden" name="isSucursal" id="isSucursal" value="<?php echo $emp->EX_EMP_IS_SUCURSAL; ?>">
            </div>
          </div>
          <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    var x = $("#isSucursal").val();
    $("form[name='add_anio']").submit(function(e) {
      var formData = new FormData($(this)[0]);     
        $.ajax({
          url: "<?php echo base_url('empresa/add_anio'); ?>",
          type: "POST",
          data: formData,
          async: false,
         // beforeSend: function(){ $('#btnGuardar').attr('disabled', 'disabled'); },
          success: function (msg) {
            var str=msg.split("_");

            if (str[0] == 'si') {
              alertSuccess('La año se guardo satsifactoriamente');
              $("form[name='add_anio']").find("input[type=text]").val("");
              if (x == '1') {
                setTimeout(function () {
                  window.location.href="<?php echo base_url('empresa/view_empresa_sucursal'); ?>/"+str[1];
                }, 2000);  
              }else{
                setTimeout(function () {
                  window.location.href="<?php echo base_url('empresa/gestion_overview'); ?>/"+str[1];
                }, 2000);
              }
              
            }else{
              alertError(msg);
            }
          },
          cache: false,
          contentType: false,
          processData: false
        });
        e.preventDefault();
    });
  });
</script>