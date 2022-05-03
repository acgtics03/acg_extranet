<style type="text/css">
  .divOculto {
    display: none;
  }
</style>
<div class="modal fade" id="addUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="add_usuario" name="add_usuario" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-5">
              <label for="validationCustom01" class="form-label">Tipo Documento</label>
              <select class="form-control" id="mtxtTipoDoc" name="mtxtTipoDoc">
                <option>Seleccione...</option>
                <?php foreach ($tdocs as $td): ?>
                  <option value="<?php echo $td->SYSITEM_NREGISTRO; ?>"><?php echo $td->SYSITEM_NOMBRE; ?></option>  
                <?php endforeach ?>                
              </select>
            </div>
            <div class="col-md-7" style="margin-top: 16px;">
              <label>N° Documento de identidad</label>
              <div class="input-group mb-3">
                <div class="col-lg-12">
                  <?php echo form_error('dni'); ?>
                  <div id="empleado_ajax">
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="N° Documento de identidad" aria-describedby="button-addon2" id="txtDocumento" name="txtDocumento" required>
                <button class="btn btn-primary" type="button" id="btnBuscar" name="btnBuscar">Buscar</button>
              </div>
            </div>                         
          </div> 
          <div class="d-flex flex-stack fs-4 py-3">
            <div class="fw-bolder rotate collapsible">Detalles del Usuario</div>           
          </div>
          <div class="separator"></div>
          <div class="row g-3">
            <div class="col-md-12 divOculto"  id="divRS">
              <label class="form-label">Nombres o RS</label>
              <input type="text" class="form-control" id="mtxtAddANomRS" name="mtxtAddANomRS" placeholder="Apellidos completos">
            </div>  
            <div class="col-md-6 divOculto" id="divApPat">
              <label class="form-label">Apellido Paterno</label>
              <input type="text" class="form-control" id="mtxtAddApPaterno" name="mtxtAddApPaterno" placeholder="Apellidos completos">
            </div>
            <div class="col-md-6 divOculto" id="divApMat">
              <label class="form-label">Apellido Materno</label>
              <input type="text" class="form-control" id="mtxtAddApMaterno" name="mtxtAddApMaterno" placeholder="Nombres completos">
            </div> 
            <div class="col-md-12 divOculto" id="divNom">
              <label class="form-label">Nombres</label>
              <input type="text" class="form-control" id="mtxtAddNombres" name="mtxtAddNombres" placeholder="Nombres completos">
            </div>                         
          </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Usuario</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
  //  $("#mtxtTipoDoc").on('change', function() {
    $('#mtxtTipoDoc').change(function(){
      var valorCambiado =$(this).val();
      $("#txtDocumento").val(''); 
      $("#mtxtAddApPaterno").val(''); 
      $("#mtxtAddApMaterno").val(''); 
      $("#mtxtAddNombres").val(''); 
      $("#mtxtAddANomRS").val('');   
      //alert(valorCambiado);
      if(valorCambiado == '1' || valorCambiado == '3'){
        $("#divRS").hide(); $("#divApPat").show(); $("#divApMat").show(); $("#divNom").show();        
        $("button[name='btnBuscar']").click(function(){ 

          var ndoc = document.getElementById("txtDocumento").value;
          // alert(ndoc);
            $.ajax({
              url: '<?php echo base_url('Api_consulta/consultaDNI').'/';?>'+ndoc,
              type: "GET",
              dataType: "json",
              success:function(data){
                $("#mtxtAddApPaterno").val(data['apPaterno']); 
                $("#mtxtAddApMaterno").val(data['apMaterno']); 
                $("#mtxtAddNombres").val(data['nombres']);         
              }
            })
        });
      }else if(valorCambiado == '2'){     
        $("#divRS").show(); $("#divApPat").hide(); $("#divApMat").hide(); $("#divNom").hide();      
        $("button[name='btnBuscar']").click(function(){ 
          var ndoc = document.getElementById("txtDocumento").value;
            $.ajax({
              url: '<?php echo base_url('Api_consulta/consultaRUC').'/';?>'+ndoc,
              type: "GET",
              dataType: "json",
              success:function(data){
                $("#mtxtAddANomRS").val(data['rs']);           
              }
            })
        }); 
      }
    });    

    $("form[name='add_usuario']").submit(function(e) {
     // alert('Hoola');
      //var ndoc = document.getElementById("txtDocumento").value;
      var formData = new FormData($(this)[0]); 
      $.ajax({
        url: "<?php echo base_url('usuario/add_usuario'); ?>",
        type: "POST",
        data: formData,
        async: false,
         // beforeSend: function(){ $('#btnGuardar').attr('disabled', 'disabled'); },
         success: function (msg) {
          var str=msg.split("_");

          if (str[0] == 'si') {
            alertSuccess('El usuario se guardo satsifactoriamente');
            $("form[name='add_usuario']").find("input[type=text]").val("");
            setTimeout(function () {
              window.location.href="<?php echo base_url('usuario'); ?>";
            }, 2000);
            $("#addUsuario").modal("hide");
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
