<?php

$ciudad = $_POST["ciudad"];
$tipo = $_POST["tipo"];
$precio = $_POST["precio"];


$data = file_get_contents("data-1.json");

if (($ciudad == "") && ($tipo == ""))
  regresa_propiedades("","",$precio);
elseif (($ciudad != "") && ($tipo == ""))
  regresa_propiedades($ciudad,"",$precio);
elseif (($ciudad == "") && ($tipo != ""))
  regresa_propiedades("",$tipo,$precio);
else
  regresa_propiedades($ciudad,$tipo,$precio);




function regresa_propiedades($ciudads,$tipos,$precios)
{

$data = file_get_contents("data-1.json");
$rprecio = explode(";",$precios);

$preciomin = $rprecio[0];
$preciomax = $rprecio[1];

//$data = json_decode($json)
$propiedades = json_decode(($data));
//$propiedades = json_decode($data,true);

//$respuesta = new stdclass();
//$arrayOfproperties = array(Item:"",Id:"",Direccion:"",Ciudad:"",Telefono:"",Codigo_Postal:"", Tipo:"", Precio:"");
$arrPropiedades = array();
//$respuesta->Id = "";
//$respuesta->Direccion = "";
//$respuesta->Ciudad = "";
//$respuesta->Telefono = "";
//$respuesta->Codigo_Postal = "";
//$respuesta->Tipo = "";
//$respuesta->Precio = "";
//$strpropiedades="";

foreach($propiedades->propiedades as $propiedad)
{

  if($ciudads != "" && $tipos != "")
    if(($propiedad->Ciudad == $ciudads) && ($propiedad->Tipo == $tipos))
      if(str_replace(",","",substr($propiedad->Precio,1)) >= $preciomin && str_replace(",","",substr($propiedad->Precio,1)) <= $preciomax)
      echo "{",'"Id"',":",$propiedad->Id,',"Direccion"',':','"',$propiedad->Direccion,'"',',"Ciudad"',':','"',$propiedad->Ciudad,'"',',"Telefono"',':','"',$propiedad->Telefono,'"',',"Tipo"',':','"',$propiedad->Tipo,'"',',"Precio"',':','"',$propiedad->Precio,'"',"},";
      //echo "Id: ",$propiedad->Id, 'Direccion: ',$propiedad->Direccion, 'Ciudad: ',$propiedad->Ciudad, 'Telefono: ',$propiedad->Telefono, 'Codigo_Postal: ', $propiedad->Codigo_Postal, ' Tipo: ',$propiedad->Tipo, 'Precio: ', $propiedad->Precio,' ';
  if($ciudads != "" && $tipos == "")
    if(($propiedad->Ciudad == $ciudads))
      if(str_replace(",","",substr($propiedad->Precio,1)) >= $preciomin && str_replace(",","",substr($propiedad->Precio,1)) <= $preciomax)
        echo "{",'"Id"',":",$propiedad->Id,',"Direccion"',':','"',$propiedad->Direccion,'"',',"Ciudad"',':','"',$propiedad->Ciudad,'"',',"Telefono"',':','"',$propiedad->Telefono,'"',',"Tipo"',':','"',$propiedad->Tipo,'"',',"Precio"',':','"',$propiedad->Precio,'"',"},";
        //echo $propiedad->Id, ' ',$propiedad->Direccion, ' ',$propiedad->Ciudad, ' ',$propiedad->Telefono, ' ', $propiedad->Codigo_Postal, ' ',$propiedad->Tipo, ' ', $propiedad->Precio,'   ';
  if($ciudads == "" && $tipos != "")
    if(($propiedad->Tipo == $tipos))
      if(str_replace(",","",substr($propiedad->Precio,1)) >= $preciomin && str_replace(",","",substr($propiedad->Precio,1)) <= $preciomax)
        echo "{",'"Id"',":",$propiedad->Id,',"Direccion"',':','"',$propiedad->Direccion,'"',',"Ciudad"',':','"',$propiedad->Ciudad,'"',',"Telefono"',':','"',$propiedad->Telefono,'"',',"Tipo"',':','"',$propiedad->Tipo,'"',',"Precio"',':','"',$propiedad->Precio,'"',"},";
        //echo $propiedad->Id, ' ',$propiedad->Direccion, ' ',$propiedad->Ciudad, ' ',$propiedad->Telefono, ' ', $propiedad->Codigo_Postal, ' ',$propiedad->Tipo, ' ', $propiedad->Precio,'   ';
  if($ciudads == "" && $tipos == "")
      if(str_replace(",","",substr($propiedad->Precio,1)) >= $preciomin && str_replace(",","",substr($propiedad->Precio,1)) <= $preciomax)
      echo "{",'"Id"',":",$propiedad->Id,',"Direccion"',':','"',$propiedad->Direccion,'"',',"Ciudad"',':','"',$propiedad->Ciudad,'"',',"Telefono"',':','"',$propiedad->Telefono,'"',',"Tipo"',':','"',$propiedad->Tipo,'"',',"Precio"',':','"',$propiedad->Precio,'"',"},";
      //echo $propiedad->Id, ' ',$propiedad->Direccion, ' ',$propiedad->Ciudad, ' ',$propiedad->Telefono, ' ', $propiedad->Codigo_Postal, ' ',$propiedad->Tipo, ' ', $propiedad->Precio,'   ';
}

//$json = json_encode($respuesta);
//echo $json;
//$json = json_encode($strpropiedades);
//echo $strpropiedades;
//echo "La Ciudad es: ".$ciudads." el tipo es: ".$tipos." y el precio minimo es: ".$preciomin." y el precio maximo es: ".$preciomax;

}

?>
