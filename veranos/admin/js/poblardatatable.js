$(document).on("ready", function(){
	listar();
})

var listar = function(){
	var table = $("#especiales").DataTable({
		"order": [[ 12, "asc" ]],
		dom: 'Bfrtip',
				buttons: [
				'excel'
				],
		ajax:{
			type:"POST",
			url:"listar.php"
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
		{data:"materia"},
		{data:"fecha"}
		]
	});
}