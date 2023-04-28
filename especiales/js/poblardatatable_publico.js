$(document).ready(function() {
	//alert("publico");
	listar();
});

var listar = function(){
	var table = $("#dt_especiales").DataTable({
		ajax:{
			type:"json",
			url:"listar.php"
			//alert(response);
		},
		columns:[
		{data:"modificar"},
		{data:"eliminar"},
		{data:"matricula"},
		{data:"nombre"},
		{data:"carrera"},
		{data:"grado"},
		{data:"estatus"},
		{data:"email"},
		{data:"telefono"},
		{data:"observaciones"},
		{data:"cve_mat"},
		{data:"materia"}
		],
		paging: false,
		info: false,
		searching: false
	});
}