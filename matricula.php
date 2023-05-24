<?php





function select($url){
    require('conexion.php');
    try{
$consult=$base->prepare($url);
$consult->execute(array());
$usuario=$consult->fetch(PDO::FETCH_ASSOC);
}catch(Exception $e){
$e->getMessage();
}
return $usuario;
}

function incidence($f1,$f2){
    
    $sql[0]="select a.nombre,a.apellidoP,a.apellidoM,incidencia,fecha from incidencia_al inner join   //sql_al_prof_se
    alumno a on a.id=incidencia_al.id_alumno union all select p.nombre,p.apellidoP,p.apellidoM,incidencia, fecha from 
    incidencia_prof inner join profesor p on p.id_profesor=incidencia_prof.id_profesor union all select s.nombre,
    s.apellidoP,s.apellidoM,incidencia,fecha from incidencia inner join servicios_escolares s on s.id_services=
    incidencia.id_incidencia where fecha between '$f1' and '$f2' ;";
    $sql[1]=" select a.nombre,a.apellidoP,a.apellidoM,incidencia,fecha from incidencia_al inner join    //sql_al_prof
    alumno a on a.id=incidencia_al.id_alumno union all select p.nombre,p.apellidoP,p.apellidoM,incidencia,
    fecha from incidencia_prof inner join profesor p on p.id_profesor=incidencia_prof.id_profesor
      where fecha between '$f1' and '$f2' ;";
    
      $sql[2]="select p.nombre,p.apellidoP,p.apellidoM,incidencia, fecha from incidencia_prof inner join profesor p //sql_prof_se
      on p.id_profesor=incidencia_prof.id_profesor union all select s.nombre,s.apellidoP,s.apellidoM,incidencia,fecha from 
      incidencia inner join servicios_escolares s on s.id_services=incidencia.id_incidencia where fecha between '$f1' and '$f2'  ;";
      $sql[3]="select a.nombre,a.apellidoP,a.apellidoM,incidencia,fecha from incidencia_al inner join alumno a on a.id=     //sql_al_se
      incidencia_al.id_alumno  union all select s.nombre,s.apellidoP,s.apellidoM,incidencia,fecha from incidencia inner join
       servicios_escolares s on s.id_services=incidencia.id_incidencia where fecha between '$f1' and '$f2'  ;";

       $sql[4]="select s.nombre,s.apellidoP,s.apellidoM,incidencia,fecha from incidencia inner join servicios_escolares s on   
       s.id_services=incidencia.id_incidencia where fecha between '$f1' and '$f2'  ;";
       $sql[5]="select a.nombre,a.apellidoP,a.apellidoM,incidencia,fecha from incidencia_al inner join alumno a on a.id=       
       incidencia_al.id_alumno  where fecha between '$f1' and '$f2'  ;";
       $sql[6]="select p.nombre,p.apellidoP,p.apellidoM,incidencia, fecha from incidencia_prof inner join profesor p on       
       p.id_profesor=incidencia_prof.id_profesor  where fecha between '$f1' and '$f2' ;";
    
       return $sql;
}
  function incidenceMatr($f1,$f2,$matr){
    $sql[0]=" select a.nombre,a.apellidoP,a.apellidoM,incidencia,fecha from incidencia_al inner join alumno a on a.id=
    incidencia_al.id_alumno  where fecha between '$f1' and '$f2' and a.matricula='$matr' ;";
    $sql[1]="select p.nombre,p.apellidoP,p.apellidoM,incidencia, fecha from incidencia_prof inner join profesor p on 
    p.id_profesor=incidencia_prof.id_profesor  where fecha between '$f1' and '$f2' and  p.matricula='$matr' ;";
    $sql[2]="select s.nombre,s.apellidoP,s.apellidoM,incidencia,fecha from incidencia inner join servicios_escolares s on 
    s.id_services=incidencia=id_se where fecha between '$f1' and '$f2' ";
    return $sql;
  }

?>