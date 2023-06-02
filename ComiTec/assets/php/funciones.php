<?php
$opcion = $_GET['opcion'];
$user = $_GET['user'];
$pass = $_GET['pass'];
$response;

if($opcion == 1){
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    if( $conn === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    
    $sql = "SELECT  nombre ,correoE_Alumno, contrasenia FROM LoginAlumno as a, Alumno as b WHERE a.correoE_Alumno = '". $user ."'";
    $stmt = sqlsrv_query( $conn, $sql );
    
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
    
    $row_count = sqlsrv_num_rows( $stmt );
    
    if($row_count == null){
        $response = array(
            'mensaje' => false
        );
    }
    
    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
          //echo $row['NoControl'].", ".$row['nombre']."<br />";
          if($row['contrasenia'] == $pass){
            $response = array(
                'mensaje' => true,
                'usuarioLogueado' => $row['nombre']
            );
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
    $serverName = "ANTONIOCALDERON\SQL2014";
    $connectionInfo = array( "Database"=>"Comitec", "UID"=>"tec", "PWD"=>"123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    $sql = "SELECT motivoAcademico from Solicitud where alumno_NoControl = 19170736";
    $stmt = sqlsrv_query( $conn, $sql );
    
    while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
        $response = array(
            'mensaje' => true,
            'motivoAcademico' => $row['motivoAcademico'],
        );
    }
    
    sqlsrv_free_stmt( $stmt);
    echo json_encode($response);
}
?>