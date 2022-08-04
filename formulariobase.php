<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="js/jquery-ui/jquery-ui.css"/>
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
<script type="text/javascript">
	$(function(){
		$('#buscar').autocomplete ({
			source : 'ajax.php',
			select : function(event, ui){
				$('#ident').html(
			//muestra el numero de identificacionerp en una caja de texto html	
			document.form1.numero_ident_erp.value= ui.item.ident_erp

				);
				}
			});
			
		
		});
</script>
<script>
function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        }
</script>
<script type="text/javascript">
  function validarLetras(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; // backspace
		if (tecla==32) return true; // espacio
		if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
		if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
		if (e.ctrlKey && tecla==88) { return true;} //Ctrl x
 
		patron = /[a-zA-Z]/; //patron
 
		te = String.fromCharCode(tecla); 
		return patron.test(te); // prueba de patron
	}
	
function habilitar(){//esta funcion desactiva el campo glosa mediante la opcion 
var selector=document.getElementById('selector');
var habilita=document.getElementById('habilita');
var selec=selector.value;

if(selec=='NO'){
	
	habilita.readOnly=true;
	}
else{
	habilita.readOnly=false;
	}
}

window.onmousemove=habilitar; 
</script>
<style type="text/css"> #cajaes{visibility:visible;} </style>
<title>Nuevo Registro</title>
</head>


<body>
<form id="form1" name="form1" method="post" action="nuevoregistro.php">

<div align="center" id="div">
<h1 align="left">Registro de Datos</h1>
<hr>
  <table width="1044" border="0" cellspacing="2">
    <tr>
      <td colspan="2" align="left" valign="middle"><table width="305" border="0" cellspacing="0">
        <tr>
          <th width="155" align="left" scope="row"><pre>Tipo de Registro</pre></th>
          <td width="146"><input name="tipo_registro" type="text" id="cajalectura" value="2" maxlength="1" readonly="readonly" /></td>
        </tr>
        <tr>
          <th align="left" scope="row"><pre>Nombre de la IPS</pre></th>
          <td><input name="nombre_ips" type="text" id="caja2" value="HOSPITAL OBANDO" readonly="readonly" /></td>
        </tr>
        <tr>
          <th align="left" scope="row"><pre>Tipo de Cobro</pre></th>
          <td><input name="tipo_cobro" type="text" id="cajalectura" value="F" maxlength="1" readonly="readonly" /></td>
        </tr>
        </table>
        <div class="divtipo" align="center">Tipo de Actualizacion&nbsp;&nbsp;&nbsp;    
          <select name="tipo_actualizacion" id="cajaescritura" title="Seleccione si, es una factura nueva o es una modificacion">
          <option value="0">Nuevo Registro</option>
          <option value="1">Modificacion</option>
      </select></div></td>
      <td>&nbsp;</td>
      <td width="310" align="left">&nbsp;</td>
      <td width="234">&nbsp;</td>
    </tr>
    <tr>
      <td width="301" align="left" valign="middle" bgcolor="#37A4D9">&nbsp;Nombre de la ERP</td>
      <td width="154"><input type="text" onkeypress="return validarLetras(event);" name="nombre_erp" id="buscar" required="required" title="Escriba el Nombre de la ERP" autofocus="autofocus" class="cajaerp"/></td>
      <td width="30"><input type="text" name="numero_ident_erp" id="cajalectura" style="visibility:hidden"
></td>
      <td align="left" bgcolor="#37A4D9">&nbsp; Fecha de Prestacion de la Factura</td>
      <td><input type="date" name="fecha_prestacion_factura" id="cajaescritura" required="required"/></td>
    </tr>
    <tr>
      <td align="left" valign="middle" bgcolor="#37A4D9">&nbsp; Prefijo de la Factura</td>
      <td><input name="prefijo_factura" type="text" id="cajaescritura" maxlength="6" title="Escriba el Prefijo de la Factura" onkeypress="return justNumbers(event)"/></td>
      <td>&nbsp;</td>
      <td align="left" bgcolor="#37A4D9">&nbsp; Fecha devolucion</td>
      <td><input name="fecha_devolucion" type="date" required="required" id="cajaescritura"/></td>
    </tr>
    <tr>
      <td align="left" valign="middle" bgcolor="#37A4D9">&nbsp; Numero de la Factura</td>
      <td><input name="numero_factura" type="text" required="required" id="cajaescritura" title="Escriba el Codigo de la Factura" onkeypress="return justNumbers(event)" maxlength="20"/></td>
      <td>&nbsp;</td>
      <td align="left" bgcolor="#37A4D9">&nbsp; Glosa  Respondida</td>
      <td><select  name="glosa_respuesta" id="selector" class="cajaescritura">
        <option value="NO" selected="selected">NO</option>
        <option value="SI">SI</option>
      </select></td>
    </tr>
    <tr>
      <td align="left" valign="middle" bgcolor="#37A4D9">&nbsp; Indicador de Actualizacion</td>
      <td><select name="indicador_actualizacion" id="cajaescritura" title="Seleccione Indicador de Actualizacion">
        <option value="I" selected="selected">I</option>
        <option value="A">A</option>
        <option value="E">E</option>
      </select></td>
  
      <td>&nbsp;</td>
      <td align="left" bgcolor="#37A4D9">&nbsp; Valor de la Glosa Vigente</td>
      <td><input type="text" name="valor_glosa" id="habilita" class="cajaescritura" title="Escriba el Valor de la Glosa" onkeypress="return justNumbers(event)"/i></td>
    </tr>
    <tr>
      <td align="left" valign="middle" bgcolor="#37A4D9">&nbsp; Valor de la Factura</span></td>
      <td><input name="valor_factura" type="text" required="required" id="cajaescritura" title="Digite el Valor de la Factura" onkeypress="return justNumbers(event)" maxlength="15" /></td>
      <td>&nbsp;</td>
      <td align="left" bgcolor="#37A4D9">&nbsp; Factura se Encuentra en Cobro Juridico</td>
      <td><select name="estado_juridico" id="cajaescritura">
        <option value="NO">NO</option>
        <option value="SI">SI</option>
      </select></td>
    </tr>
    <tr>
      <td align="left" valign="middle" bgcolor="#37A4D9">&nbsp; Fecha de Emision de la factura</td>
      <td><input name="fecha_emision_factura" type="date" required="required" id="cajaescritura"/></td>
      <td>&nbsp;</td>
      <td align="left" bgcolor="#37A4D9">&nbsp; Etapa de Proceso</td>
      <td><select name="etapa_procesos" id="cajaescritura" title="Seleccione Etapa del Proceso">
        <option value="0">0=No se encuentra en proceso</option>
        <option value="1">1=Admision de Demanda</option>
        <option value="2">2=Mandamiento de Pago</option>
        <option value="3">3=Audencia Previa de Conciliacion</option>
        <option value="4">4=Pruebas</option>
        <option value="5">5=Alegato de Conclusiones</option>
        <option value="6">6=Sentencia 1 Instancia</option>
        <option value="7">7=Reposicion y Apelacion</option>
        <option value="8">8=Sentencia 2 Instancia</option>
      </select></td>
    </tr>
    <tr>
      <td align="left" valign="middle">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" align="center" valign="middle"><input type="submit" name="enviar" class="btn-primario" value="Guardar" title="Oprima para Guardar el Registro" /> </td>
    </tr>
  </table>
</form>
  </div>
<p>&nbsp;</p>

</body>
</html>
