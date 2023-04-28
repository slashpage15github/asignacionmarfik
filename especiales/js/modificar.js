$(document).ready(function() {
  //alert("jquery listo");


            v_carrera=$("#clave").val();
            //v_matricula=$("#imatricula").val();
            
        if (v_carrera!='0'){

           $.ajax({
                url: './carga_materias_de_carrera.php',
                type: 'POST',
                data: {v_carrera: v_carrera},
                dataType: 'json',
            success: function (data) {

    //$('#cve_mat').append('<option value="0" selected="selected">Seleccione:</option>');
              $.each(data, function(clave, materia){
              $('#cve_mat').append( $('<option></option>').text(this.materia).val(this.clave) );
           });
          }
          });

        }
        else{
        $('#cve_mat').append('<option value="0" selected="selected">Seleccione:</option>');
        }
   
});