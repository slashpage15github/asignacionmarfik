<?php
//load the database configuration file
include 'dbConfig2.php';

if(isset($_POST['importSubmit'])){

    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){

            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            //skip first line
            fgetcsv($csvFile);

            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
              /*  $prevQuery = "SELECT id FROM ofertaacademica WHERE email = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                if($prevResult->num_rows > 0){
                    //update member data
                    $db->query("UPDATE ofertaacademica SET name = '".$line[0]."', phone = '".$line[2]."', created = '".$line[3]."', modified = '".$line[3]."', status = '".$line[4]."' WHERE email = '".$line[1]."'");
                }else{
                    */
                    //insert member data into database
                    //echo trim($line[0]).'<br>';
                    


                    $prevResult =$db->query("INSERT INTO ofertaacademica (alumnos,clave,materia,progra_grupo,grupo,expediente,maestro,horas,hilunes,hflunes,mlunes,slunes,himartes,hfmartes,mmartes,smartes,himiercoles,hfmiercoles,mmiercoles,smiercoles,hijueves,hfjueves,mjueves,sjueves,hiviernes,hfviernes,mviernes,sviernes,hisabado,hfsabado,msabado,ssabado,departamental,semestre,observacion)
            VALUES ('".trim($line[0])."','".trim($line[1])."','".trim($line[2])."','".trim($line[3])."','".trim($line[4])."','".trim($line[5])."','".trim($line[6])."','".trim($line[7])."','".trim($line[8])."','".trim($line[9])."','".trim($line[10])."','".trim($line[11])."','".trim($line[12])."','".trim($line[13])."','".trim($line[14])."','".trim($line[15])."','".trim($line[16])."','".trim($line[17])."','".trim($line[18])."','".trim($line[19])."','".trim($line[20])."','".trim($line[21])."','".trim($line[22])."','".trim($line[23])."','".trim($line[24])."','".trim($line[25])."','".trim($line[26])."','".trim($line[27])."','".trim($line[28])."','".trim($line[29])."','".trim($line[30])."','".trim($line[31])."','".trim($line[32])."','".trim($line[33])."','".trim($line[34])."')");




            }

            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

//redirect to the listing page
header("Location: index3.php".$qstring);
