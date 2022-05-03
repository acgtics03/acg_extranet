<div class="modal fade" id="mupdMes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR MES</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="upd_mes" name="upd_mes" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label>NOMBRE MES</label>
              <input type="text" class="form-control" id="mtxtUpdNomMes" name="mtxtUpdNomMes" placeholder="NOMBRE MES">
              <input type="hidden" name="mtxtUpdIdMes" id="mtxtUpdIdMes">
              <input type="hidden" name="isidAnio" id="isidAnio">
              <input type="hidden" name="isIdEmpp" id="isIdEmpp" value="<?php echo $emp->PK_EX_EMPRESA; ?>" >
              <input type="hidden" name="txtTRep" id="txtTRep" value="<?php echo $emp->EX_EMP_TIPO_REPOSITORIO; ?>" >
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label>ESTADO</label>
              <select class="form-control" name="mcboUpdEstado" id="mcboUpdEstado">
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
              </select>
              <input type="hidden" name="isIdEmpp" id="isIdEmpp" value="<?php echo $emp->PK_EX_EMPRESA; ?>" >
              <input type="hidden" name="txtTRep" id="txtTRep" value="<?php echo $emp->EX_EMP_TIPO_REPOSITORIO; ?>" >
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
    $("form[name='upd_mes']").submit(function(e) {
      var formData = new FormData($(this)[0]);     
        $.ajax({
          url: "<?php echo base_url('empresa/mUpdMes'); ?>",
          type: "POST",
          data: formData,
          async: false,
         // beforeSend: function(){ $('#btnGuardar').attr('disabled', 'disabled'); },
          success: function (msg) {
            var str=msg.split("_");

            if (str[0] == 'si') {
              alertSuccess('La año se actualizo satsifactoriamente');
              $("form[name='add_anio']").find("input[type=text]").val("");
              setTimeout(function () {
                window.location.href="<?php echo base_url('empresa/view_month'); ?>/"+str[1];
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