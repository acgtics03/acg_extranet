<div class="modal fade" id="mUpdFile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR AÑO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="upd_file" name="upd_file" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label>NOMBRE CARPETA</label>
              <input type="text" class="form-control" id="mtxtUpdNomFile" name="mtxtUpdNomFile">
              <input type="hidden" name="mtxtUpdIdFile" id="mtxtUpdIdFile">
              <input type="hidden" name="mtxtUpdIdMes" id="mtxtUpdIdMes">
              <input type="hidden" name="mtxtUpdIdAnio" id="mtxtUpdIdAnio" value="<?php echo $anio->PK_EX_ANIO; ?>" >
              <input type="hidden" name="mtxtUpdIdEmpresa" id="mtxtUpdIdEmpresa" value="<?php echo $emp->PK_EX_EMPRESA; ?>" >
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label>ESTADO</label>
              <select class="form-control" name="mcboUpdFile" id="mcboUpdFile">
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
              </select>
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
    $("form[name='upd_file']").submit(function(e) {
      var formData = new FormData($(this)[0]);     
        $.ajax({
          url: "<?php echo base_url('empresa/upd_file'); ?>",
          type: "POST",
          data: formData,
          async: false,
         // beforeSend: function(){ $('#btnGuardar').attr('disabled', 'disabled'); },
          success: function (msg) {
            var str=msg.split("_");

            if (str[0] == 'si') {
              alertSuccess('La carpeta se actualizo satsifactoriamente');
              $("form[name='add_anio']").find("input[type=text]").val("");
              setTimeout(function () {
                window.location.href="<?php echo base_url('empresa/view_file'); ?>/"+str[1];
              }, 2000);
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