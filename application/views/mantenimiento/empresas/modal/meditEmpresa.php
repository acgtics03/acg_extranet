<div class="modal fade" id="mupdEmpresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar empresa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="upd_empresa" name="upd_empresa" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-lg-12">
              <label>RUC Empresa</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Ingrese su RUC" aria-label="Recipient's username" aria-describedby="button-addon2" id="mtxtUpdRUC" name="mtxtUpdRUC" required>
                <button class="btn btn-primary" type="button" id="btnBuscarRUC" name="btnBuscarRUC">Buscar</button>
                <input type="hidden" name="mtxtUpdId" id="mtxtUpdId">
              </div>
            </div>
          </div>
          <div class="d-flex flex-stack fs-4 py-3">
            <div class="fw-bolder rotate collapsible">Detalles de la empresa</div>           
          </div>
          <div class="separator"></div>
          <div class="row g-3">
            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Razón Social</label>
              <input type="text" class="form-control" id="mtxtUpdRS" name="mtxtUpdRS" required placeholder="Apellidos completos">
            </div>
            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">Dirección</label>
              <input type="text" class="form-control" id="mtxtUpdDir" name="mtxtUpdDir" required placeholder="Nombres completos">
            </div> 
            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">Ubigeo</label>
              <input type="text" class="form-control" id="mtxtUpdUbigeo" name="mtxtUpdUbigeo" required placeholder="Nombres completos">
            </div> 
            <div class="col-md-6">
              <label for="validationCustom02" class="form-label">Estado RUC</label>
              <input type="text" class="form-control" id="mtxtUpdEstRUC" name="mtxtUpdEstRUC" required placeholder="Nombres completos">
            </div> 
            <div class="col-md-6">
              <label for="validationCustom02" class="form-label">Condición RUC</label>
              <input type="text" class="form-control" id="mtxtUpdConRUC" name="mtxtUpdConRUC" required placeholder="Nombres completos">
            </div>                         
          </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar actualización</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
   $(document).ready(function() {

    $("button[name='btnBuscarRUC']").click(function(){ 
      var ndoc = document.getElementById("mtxtUpdRUC").value;

      if(ndoc.length == 11){
        $.ajax({
          url: '<?php echo base_url('Api_consulta/consultaRUC').'/';?>'+ndoc,
          type: "GET",
          dataType: "json",
          success:function(data){
            $("#mtxtUpdRS").val(data['rs']); 
            $("#mtxtUpdEstRUC").val(data['estado']); 
            $("#mtxtUpdConRUC").val(data['condicion']); 
            $("#mtxtUpdDir").val(data['direccion']); 
            $("#mtxtUpdUbigeo").val(data['ubigeo']);           
          }
        })
      }else{
        alertError('Verifique el RUC Ingresado y vuelva a intentarlo');
      }
    });

    $("form[name='upd_empresa']").submit(function(e) {
      var ndoc = document.getElementById("mtxtUpdRUC").value;
      var nrs = document.getElementById("mtxtUpdRS").value;
      var formData = new FormData($(this)[0]); 
      if (nrs == null || nrs == '') {
        alertError('Olvido buscar la empresa <br> Ingrese el RUC y preciona el boton buscar');
        return false;
      }            

      if(ndoc.length == 11){
        $.ajax({
          url: "<?php echo base_url('empresa/upd_empresa'); ?>",
          type: "POST",
          data: formData,
          async: false,
          beforeSend: function(){ $('#btnGuardar').attr('disabled', 'disabled'); },
          success: function (msg) {
            var str=msg.split("_");

            if (str[0] == 'si') {
              alertSuccess('La Empresa se guardo satsifactoriamente');
              $("form[name='upd_empresa']").find("input[type=text]").val("");
              setTimeout(function () {
                window.location.href="<?php echo base_url('empresa/gestion_overview'); ?>/"+str[1];
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
      }else{
        alertError('Verifique el RUC Ingresado y vuelva a intentarlo');
        return false;
      }
    });
  });
</script>
