<?php
session_start();
$opcion = $_GET['opcion'];
$response;

if($opcion == 1){
    $user = $_GET['user'];
    $pass = $_GET['pass'];
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    if( !$conn ) {
        die( print_r( sqlsrv_errors(), true));
    }
    
    $sql = "SELECT  NoControl, nombre ,correoE_Alumno, contrasenia FROM LoginAlumno as a, Alumno as b WHERE a.correoE_Alumno = b.CorreoAlumno and a.correoE_Alumno = '". $user ."'";
    $stmt = sqlsrv_query( $conn, $sql );
    
    if( !$stmt) {
        die( print_r( sqlsrv_errors(), true) );
    }
    
    $row_count = sqlsrv_num_rows( $stmt );
    
    if($row_count == null){
        $response = array(
            'mensaje' => false
        );
    }
    $responese=array();
    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
          //echo $row['NoControl'].", ".$row['nombre']."<br />";
          if($row['contrasenia'] == $pass){
            $response = array(
                'mensaje' => true,
                'usuarioLogueado' => $row['nombre'],
                'NoControl' => $row['NoControl']
            );

            $_SESSION['sesion_iniciada'] = true; //asignarle null no causará error?
            $_SESSION['nombre']       = $row['nombre'];
            $_SESSION['NoControl']    = $row['NoControl'];

          }else{
            $response = array(
                'mensaje' => false
            );
          }
    }

    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}

if($opcion == 2){
    $matricula = $_GET['matricula'];
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $sql = "SELECT solicitudID,motivoAcademico FROM Solicitud where alumno_NoControl = ".$matricula;
    $stmt = sqlsrv_query( $conn, $sql );
    
    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
        $motivoAcademico[] = $row['motivoAcademico'];
        $solicitudID[] = $row['solicitudID'];
    }

    $response = array(
        'mensaje' => true,
        'motivoAcademico' => $motivoAcademico,
        'solicitudID' => $solicitudID,
    );
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}

if($opcion == 3){
    $matricula = $_GET['matricula'];
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $sql = "SELECT solicitudID,motivoAcademico FROM Solicitud WHERE alumno_NoControl = ".$matricula." AND estatusSolicitudID = 3";
    $stmt = sqlsrv_query( $conn, $sql );
    
    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
        $motivoAcademico[] = $row['motivoAcademico'];
        $solicitudID[] = $row['solicitudID'];
    }

    $response = array(
        'mensaje' => true,
        'motivoAcademico' => $motivoAcademico,
        'solicitudID' => $solicitudID,
    );
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}

if($opcion == 4){
    $matricula = $_GET['matricula'];
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $sql = "SELECT solicitudID,motivoAcademico FROM Solicitud WHERE alumno_NoControl = ".$matricula." AND estatusSolicitudID = 2";
    $stmt = sqlsrv_query( $conn, $sql );

    if (sqlsrv_has_rows($stmt)) {
        while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
            $motivoAcademico[] = $row['motivoAcademico'];
            $solicitudID[] = $row['solicitudID'];
        }
    } else {
        $motivoAcademico['motivoAcademico'][0] = 'Vacio';
        $solicitudID['solicitudID'][0] = 'Vacio';
    }

    $response = array(
        'mensaje' => true,
        'motivoAcademico' => $motivoAcademico,
        'solicitudID' => $solicitudID,
    );
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}

if($opcion == 5){
    $matricula = $_GET['matricula'];
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $sql = "SELECT solicitudID,motivoAcademico FROM Solicitud WHERE alumno_NoControl = ".$matricula." AND estatusSolicitudID = 1";
    $stmt = sqlsrv_query( $conn, $sql );
    
    if (sqlsrv_has_rows($stmt)) {
        while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
            $motivoAcademico[] = $row['motivoAcademico'];
            $solicitudID[] = $row['solicitudID'];
        }
    } else {
        $motivoAcademico['motivoAcademico'][0] = 'Vacio';
        $solicitudID['solicitudID'][0] = 'Vacio';
    }

    $response = array(
        'mensaje' => true,
        'motivoAcademico' => $motivoAcademico,
        'solicitudID' => $solicitudID,
    );
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}

if($opcion == 6){

    $idSolicitud = $_GET['idSolicitud'];
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $sql = "SELECT alumno_NoControl, b.nombre, b.apPaterno, b.apMaterno, b.CorreoAlumno, c.nombreCarrera , b.semestre, a.motivoAcademico, e.nombreStatus
    from Solicitud as a, Alumno as b, Carrera as c, estatusSolicitud as e
    WHERE b.NoControl = a.alumno_NoControl and b.carreraID = c.carreraID and a.estatusSolicitudID = e.estatusID AND a.solicitudID = ".$idSolicitud;
    $stmt = sqlsrv_query( $conn, $sql );
    
    if (sqlsrv_has_rows($stmt)) {
        while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
            $numeroControl[] = $row['alumno_NoControl'];
            $nombre[] = $row['nombre'].' '.$row['apPaterno'].' '.$row['apMaterno'];
            $CorreoAlumno[] = $row['CorreoAlumno'];
            $nombreCarrera[] = $row['nombreCarrera'];
            $semestre[] = $row['semestre'];
            $motivoAcademico[] = $row['motivoAcademico'];
            $nombreStatus[] = $row['nombreStatus'];
        }
    } else {
        $numeroControl['numeroControl'][0] = 'Vacio';
        $nombre['nombre'][0] = 'Vacio';
        $CorreoAlumno['CorreoAlumno'][0] = 'Vacio';
        $nombreCarrera['nombreCarrera'][0] = 'Vacio';
        $semestre['semestre'][0] = 'Vacio';
        $motivoAcademico['motivoAcademico'][0] = 'Vacio';
        $nombreStatus['nombreStatus'][0] = 'Vacio';
    }

    $response = array(
        'mensaje' => true,
        'numeroControl' => $numeroControl,
        'nombre' => $nombre,
        'CorreoAlumno' => $CorreoAlumno,
        'nombreCarrera' => $nombreCarrera,
        'semestre' => $semestre,
        'motivoAcademico' => $motivoAcademico,
        'nombreStatus' => $nombreStatus,
    );
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);

}

if($opcion == 7){

    $numControl = $_GET['numeroControl'];
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $sql = "SELECT b.NoControl, b.nombre, b.apPaterno, b.apMaterno, b.CorreoAlumno, c.nombreCarrera , b.semestre 
    FROM Alumno as b, Carrera as c
    WHERE b.carreraID = c.carreraID AND b.NoControl = ".$numControl;
    $stmt = sqlsrv_query( $conn, $sql );
    
    if (sqlsrv_has_rows($stmt)) {
        while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
            $numeroControl[] = $row['NoControl'];
            $nombre[] = $row['nombre'].' '.$row['apPaterno'].' '.$row['apMaterno'];
            $CorreoAlumno[] = $row['CorreoAlumno'];
            $nombreCarrera[] = $row['nombreCarrera'];
            $semestre[] = $row['semestre'];
        }
    } else {
        $numeroControl['numeroControl'][0] = 'Vacio';
        $nombre['nombre'][0] = 'Vacio';
        $CorreoAlumno['CorreoAlumno'][0] = 'Vacio';
        $nombreCarrera['nombreCarrera'][0] = 'Vacio';
        $semestre['semestre'][0] = 'Vacio';
    }

    $response = array(
        'mensaje' => true,
        'numeroControl' => $numeroControl,
        'nombre' => $nombre,
        'CorreoAlumno' => $CorreoAlumno,
        'nombreCarrera' => $nombreCarrera,
        'semestre' => $semestre,
    );
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);

}

if($opcion == 8){

    $numControl = $_GET['numeroControl'];
    $fecha = obtenerFecha();
    $motivoPersonal = $_GET['movitoSolicitudPersonal'];
    $motivoAcademico = $_GET['movitoSolicitudAcademico'];
    $estatus = $_GET['estatus'];

    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        $response = array(
            'mensaje' => false,
            'error' => sqlsrv_errors()
        );
    } else {
        $sql = "INSERT INTO solicitud(alumno_NoControl, trabajador_Matricula, firmaTrabajador, fechaSolicitud, motivoPersonal, motivoAcademico, estatusSolicitudID, Observaciones) VALUES (?, 1, 0, ?, ?, ?, ?, '')";
        $params = array($numControl, $fecha, $motivoPersonal, $motivoAcademico, $estatus);
        $stmt = sqlsrv_prepare($conn, $sql, $params);

        if ($stmt === false) {
            $response = array(
                'mensaje' => false,
                'error' => sqlsrv_errors()
            );
        } else {
            $result = sqlsrv_execute($stmt);

            if ($result === false) {
                $response = array(
                    'mensaje' => false,
                    'error' => sqlsrv_errors()
                );
            } else {
                $response = array(
                    'mensaje' => true
                );
            }
        }

        sqlsrv_free_stmt($stmt);
    }

    echo json_encode($response);

}

if($opcion == 9){
    $user = $_GET['user'];
    $pass = $_GET['pass'];
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    if( !$conn ) {
        die( print_r( sqlsrv_errors(), true));
    }
    
    $sql = "SELECT  Matricula, nombre ,correoE_Trabajador, contrasenia FROM LoginTrabajador as a, Trabajador as b WHERE a.correoE_Trabajador = b.correoTrabajador and a.correoE_Trabajador ='". $user ."'";
    $stmt = sqlsrv_query( $conn, $sql );
    
    if( !$stmt) {
        die( print_r( sqlsrv_errors(), true) );
    }
    
    $row_count = sqlsrv_num_rows( $stmt );
    
    if($row_count == null){
        $response = array(
            'mensaje' => false
        );
    }
    $responese=array();
    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
          //echo $row['NoControl'].", ".$row['nombre']."<br />";
          if($row['contrasenia'] == $pass){
            $response = array(
                'mensaje' => true,
                'usuarioLogueado' => $row['nombre'],
                'NoControl' => $row['Matricula']
            );

            $_SESSION['sesion_iniciada'] = true; //asignarle null no causará error?
            $_SESSION['nombre']       = $row['nombre'];
            $_SESSION['NoControl']    = $row['Matricula'];

          }else{
            $response = array(
                'mensaje' => false
            );
          }
    }

    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}

if($opcion == 10){
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $sql = "SELECT solicitudID,motivoAcademico FROM Solicitud";
    $stmt = sqlsrv_query( $conn, $sql );
    
    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
        $motivoAcademico[] = $row['motivoAcademico'];
        $solicitudID[] = $row['solicitudID'];
    }

    $response = array(
        'mensaje' => true,
        'motivoAcademico' => $motivoAcademico,
        'solicitudID' => $solicitudID,
    );
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}

if($opcion == 11){
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $sql = "SELECT solicitudID,motivoAcademico FROM Solicitud WHERE estatusSolicitudID = 1";
    $stmt = sqlsrv_query( $conn, $sql );
    
    if (sqlsrv_has_rows($stmt)) {
        while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
            $motivoAcademico[] = $row['motivoAcademico'];
            $solicitudID[] = $row['solicitudID'];
        }
    } else {
        $motivoAcademico['motivoAcademico'][0] = 'Vacio';
        $solicitudID['solicitudID'][0] = 'Vacio';
    }

    $response = array(
        'mensaje' => true,
        'motivoAcademico' => $motivoAcademico,
        'solicitudID' => $solicitudID,
    );
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}

if($opcion == 12){
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $sql = "SELECT solicitudID,motivoAcademico FROM Solicitud WHERE estatusSolicitudID = 3";
    $stmt = sqlsrv_query( $conn, $sql );
    
    if (sqlsrv_has_rows($stmt)) {
        while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
            $motivoAcademico[] = $row['motivoAcademico'];
            $solicitudID[] = $row['solicitudID'];
        }
    } else {
        $motivoAcademico['motivoAcademico'][0] = 'Vacio';
        $solicitudID['solicitudID'][0] = 'Vacio';
    }

    $response = array(
        'mensaje' => true,
        'motivoAcademico' => $motivoAcademico,
        'solicitudID' => $solicitudID,
    );
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}

if($opcion == 13){
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $sql = "SELECT solicitudID,motivoAcademico FROM Solicitud WHERE estatusSolicitudID = 2";
    $stmt = sqlsrv_query( $conn, $sql );
    
    if (sqlsrv_has_rows($stmt)) {
        while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
            $motivoAcademico[] = $row['motivoAcademico'];
            $solicitudID[] = $row['solicitudID'];
        }
    } else {
        $motivoAcademico['motivoAcademico'][0] = 'Vacio';
        $solicitudID['solicitudID'][0] = 'Vacio';
    }

    $response = array(
        'mensaje' => true,
        'motivoAcademico' => $motivoAcademico,
        'solicitudID' => $solicitudID,
    );
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}

if($opcion == 14){

    $idSolicitud = $_GET['idSolicitud'];
    $estatus = $_GET['estatus'];

    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        $response = array(
            'mensaje' => false,
            'error' => sqlsrv_errors()
        );
    } else {
        $sql = "UPDATE solicitud SET estatusSolicitudID = ".$estatus." where solicitudID = ".$idSolicitud;
        //$params = array($numControl, $fecha, $motivoPersonal, $motivoAcademico, $estatus);
        //$stmt = sqlsrv_prepare($conn, $sql, $params);
        $stmt = sqlsrv_query($conn, $sql);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }else{
            $response = array(
                'mensaje' => true
            );
        }

        sqlsrv_free_stmt($stmt);
    }

    echo json_encode($response);

}

function obtenerFecha(){
    date_default_timezone_set('America/Mexico_City');
    $fecha = date("Y-m-d");
    return $fecha;
}

if($opcion == "cerrarSesion"){
    session_destroy();

    $response = array(
        'mensaje' => true,
    );
    
    echo json_encode($response);
}

?>