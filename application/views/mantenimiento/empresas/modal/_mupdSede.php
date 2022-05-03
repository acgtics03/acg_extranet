<div class="modal fade" id="mUpdSede" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR DATOS DE LA SEDE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="upd_sede" name="upd_sede" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label>NOMBRE SEDE</label>
              <input type="text" class="form-control" id="mtxtUpdNomSede" name="mtxtUpdNomSede" required>
              <input type="hidden" name="mtxtUpdId" value="<?php echo $emp->PK_EX_EMPRESA; ?>" >
              <input type="hidden" name="mtxtUpdIdSede" id="mtxtUpdIdSede">
            </div>
            <div class="col">
              <label>DIRECCIÓN</label>
              <input type="text" class="form-control" id="mtxtUpdDirSede" name="mtxtUpdDirSede" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <label>NOMBRE CONTACTO</label>
              <input type="text" class="form-control" id="mtxtUpdNomContacto" name="mtxtUpdNomContacto" required>
            </div>
            <div class="col">
              <label>EMAIL CONTACTO</label>
              <input type="email" class="form-control" id="mtxtUpdEmailContacto" name="mtxtUpdEmailContacto" required>
            </div>
            <div class="col">
              <label>CELULAR CONTACTO</label>
              <input type="text" class="form-control" id="mtxtUpdCelContacto" name="mtxtUpdCelContacto" required>
            </div>
          </div>
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
    $("form[name='upd_sede']").submit(function(e) {
      var formData = new FormData($(this)[0]);     
        $.ajax({
          url: "<?php echo base_url('empresa/upd_sede'); ?>",
          type: "POST",
          data: formData,
          async: false,
          beforeSend: function(){ $('#btnGuardar').attr('disabled', 'disabled'); },
          success: function (msg) {
            var str=msg.split("_");

            if (str[0] == 'si') {
              alertSuccess('La sede se actualizo satsifactoriamente');
              //$("form[name='add_empresa']").find("input[type=text]").val("");
              setTimeout(function () {
                window.location.href="<?php echo base_url('empresa/gestion_sede'); ?>/"+str[1];
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