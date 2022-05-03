<div class="modal fade" id="maddSede" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR SEDE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="add_sede" name="add_sede" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label>NOMBRE SEDE</label>
              <input type="text" class="form-control" id="mtxtAddNomSede" name="mtxtAddNomSede" required>
              <input type="hidden" name="mtxtAddId" value="<?php echo $emp->PK_EX_EMPRESA; ?>" >
            </div>
            <div class="col">
              <label>DIRECCIÓN</label>
              <input type="text" class="form-control" id="mtxtAddDirSede" name="mtxtAddDirSede" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <label>NOMBRE CONTACTO</label>
              <input type="text" class="form-control" id="mtxtAddNomContacto" name="mtxtAddNomContacto" required>
            </div>
            <div class="col">
              <label>EMAIL CONTACTO</label>
              <input type="email" class="form-control" id="mtxtAddEmailContacto" name="mtxtAddEmailContacto" required>
            </div>
            <div class="col">
              <label>CELULAR CONTACTO</label>
              <input type="text" class="form-control" id="mtxtAddCelContacto" name="mtxtAddCelContacto" required>
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
    $("form[name='add_sede']").submit(function(e) {
      var formData = new FormData($(this)[0]);     
        $.ajax({
          url: "<?php echo base_url('empresa/add_sede'); ?>",
          type: "POST",
          data: formData,
          async: false,
          beforeSend: function(){ $('#btnGuardar').attr('disabled', 'disabled'); },
          success: function (msg) {
            var str=msg.split("_");

            if (str[0] == 'si') {
              alertSuccess('La sede se guardo satsifactoriamente');
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