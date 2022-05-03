<div class="modal fade" id="maddfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR CARPETA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="add_file" name="add_file" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label>NOMBRE CARPETA</label>
              <input type="text" class="form-control" id="mtxtAddFile" name="mtxtAddFile" placeholder="AGREGAR NOMBRE DE LA CARPETA">
              <input type="hidden" name="mtxtIdEmpresa" id="mtxtIdEmpresa" value="<?php echo $emp->PK_EX_EMPRESA; ?>" >
              <input type="hidden" name="mtxtIdAnio" id="mtxtIdAnio" value="<?php echo $anio->PK_EX_ANIO; ?>">
              <input type="hidden" name="mtxtIdMes" id="mtxtIdMes" value="<?php echo $idmes; ?>">
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
    $("form[name='add_file']").submit(function(e) {
      var formData = new FormData($(this)[0]);     
        $.ajax({
          url: "<?php echo base_url('empresa/add_file'); ?>",
          type: "POST",
          data: formData,
          async: false,
          success: function (msg) {
            var str=msg.split("_");

            if (str[0] == 'si') {
              alertSuccess('La carpeta se guardo satisfactoriamente');
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