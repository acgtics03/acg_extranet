/*!
 APP 2022 MICHAEL
 */
 function isEmpty(str){
 	return !str.replace(/\s+/, '').length;
 }

 function soloNumeros(e){
 	var key = window.Event ? e.which : e.keyCode;
 	console.log(key);
 	return (key >= 48 && key <= 57 || key == 8 || key == 46)
 }

 function soloNumerosE(e){
 	var key = window.Event ? e.which : e.keyCode;
 	console.log(key);
 	return (key >= 48 && key <= 57 || key == 8)
 }

 function AllMayuscula(str){
    //return str.charAt(0).toUpperCase() + str.substring(1); //SOLO LA PRIMERA LETRA
    str.value = str.value.toUpperCase();
 }

 function alertError(str){
 	Swal.fire('Error', str, 'error')
 }

 function alertSuccess(str){
 	Swal.fire('Correcto!', str, 'success')
 }

 $(document).ready(function() {
 	$(".table_api").DataTable({    
 		"language": {
         "processing": "Procesando...",
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "emptyTable": "Ningún dato disponible en esta tabla",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "search": "Buscar:",
          "infoThousands": ",",
          "loadingRecords": "Cargando...",
          "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
          },
          "aria": {
            "sortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
          },
          "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
 			//"lengthMenu": "Ver _MENU_",
 		},
 		"dom":
 		"<'row'" +
 		"<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
 		"<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
 		">" +

 		"<'table-responsive'tr>" +

 		"<'row'" +
 		"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
 		"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
 		">"
 	});
 });