@extends('welcome')

@section('content')
    <label class="label-warning">Ultima Actualizacion: 14/Mayo/2018</label><br>
<center>
  <label>LOGO DEL SISTEMA.
  </label><br>
  <img src="{!! asset('img/gano4.png') !!}" height="200px"><br><br>

<label class="label-success">
  MODULOS Y ACCIONES YA PROGRAMADAS, Y ACTUALIZADAS.<br><br>
  <span style="color:black"> 1- Modulo de Condominio</span> <br>
    1.1 Registrar Codominio(Pantalla arreglada)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.2 Buscar Condominio <br>
    1.3 Ver Condominio<br>
    1.4 Modificar Condomine(Modificacion de pagos a futuros recibos)(Pantalla arreglada)<br>
    1.5 Eliminar Condominio <br>
    1.6 Generador de Pagos desde años antiguos hasta la actualidad<br>
    1.7 Agregar nuevos pagos, no comunes como lo son administrativo y parque.<br><br>
    <span style="color:black"> 2- Modulo de pago diario</span> <br>
    2.1 Buscar Condomine para pago&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    2.2 Realizar pago de varios meses<br>
    2.2 Historial de pagos
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
    2.3 Realizar pago de un mes, Viendo el historial
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
    2.4 Agregar nuevos pagos, no comunes como lo son administrativo y parque.<br>
    Modificacion de Validaciones a la hora de pagos, y seleccion de Meses<br><br>
    <span style="color:black">3- Modulo de Facturacion</span> <br>
    3.1 Buscar Condomine para Facturacion(Emision de factura)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br>
    3.2 Modificar Datos antes de Facturar.<br>
    3.3 Ver Facturacion de ultimo mes emitida con datos correspondientes<br>
    3.4 Seleccion de Recibos a emitir, y mostrar datos correspondientes.<br>
    3.5 Generacion de Facturas, Dependiendo del concepto, o global<br>
    3.6 Impresion de Facturas con el formato dado por la empresa.<br>
    3.7 Aceptacion o aprobacion de Facturacion.<br> 
    3.8 Busqueda de Facturas por Condomine.<br>
    3.9 Imprimir Factura Individual por cada Concepto.<br>
    3.10 Listar todas las Facturas Por Concepto.<br>
    Esta en Proceso de arreglo el modulo de facturacion, y creacion de la factura para su impresion <br>
    , pendientes para la proxima actualizacion.<br>
    <span style="color:black">4-SEGURIDAD</span> <br>
    4.1- inicio de seccion correspondiente a lo que hacen.
    4.2- cerrar session
    <br>
    Pendientes en la Proxima actualizacion, se agregara mas detalles y <br>
    manejo de usuario, como las restricciones que debe tener cada uno
</label>
</center>
<br><br>

<label>Condiciones del servidor:<br>
1- El servidor es de pruebas por lo cual habran horas que se desabilitara para hacer las correspondientes actualizaciones y asi puedan visualizarlas despues.<br>
2- La configuracion del servidor ha sido hechas por mi persona, por el cual se asegura la credibilidad del sistema, y sus avances, para llegar a su entrega final.<br>
3- El enlace solo ha sido compartido a la empresa, para que puedan acceder a dicho servidor, y solo ellos sabran como o a quienes distribuirlo para puedan asi acceder.<br>
4- El servidor fue creado, configurado con el fin de que la empresa pueda ver su evolucion del sistema, y hacer las pruebas de dichos modulos ya programados.<br>
<br>
<br>
Ventajas:<br>
1- Interactividad inmediata del cliente-usuario al sistema en su etapa de desarrollo y asi puedan visualizar el avance o evolucion que va teniendo dicho sistema.<br>
2- Podra acceder a dicho servidor de cualquier dipostivo que tenga accesso a internet, esto evitando tediosas configuraciones.<br>
3- El servidor es administrado, monitoriado por mi persona asi evitar perdida de informacion, o clonacion del sistema, teniendo un registro detallado de los accesos, horas, tiempo y acciones que han hecho en el sistema.<br>
4- Evitar inconvenientes cuando se haga una entrega final, ya que el cliente-usuario ya va teniendo interaccion con el sistema asi poder evitar lo mas minimo de errores.<br>
5-Capacitacion personalizada, al tener el sistema en este caso el enlace del servidor donde se aloja el sistema, el cliente-usuario podra interactuar con el y asi poder acostumbrarse, como aprendender del sistema.<br>
<br><br>
Aclaraciones: Por este medio se estan asiendo las pruebas de sistema, por lo cual al finalizar el sistema el servidor estara 7 dias activo mas, asi puedan acceder a el hacer las pruebas o correcciones que la empresa solicite, <br>
luego de ese tiempo se va a coordinar con el area administrativa para la instalacion, <br>
configuracion, he implementacion de sistema a nivel local(Solo la empresa podra acceder a el),<br>
y del servidor sera eliminado los archivos del sistema, como dicho servidor. Asi no tener ningun inconvenientes y facilitar la instalacion ,rapida adaptacion del sistema y Uso de dicho sistema sin ningun inconveniente<br>
</label>
  </div>
  
@endsection