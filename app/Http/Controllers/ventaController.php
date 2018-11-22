<?php

namespace SisVentas\Http\Controllers;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\EscposImage;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use function MongoDB\BSON\toJSON;
use SisVentas\detalle_venta;
use SisVentas\Producto;
use SisVentas\venta;

class ventaController extends Controller
{
    public function index(){

        return view('Venta.venta');

    }
    public function cargar(){
   $produ=Input::get('texto');
   $resulta=array();
   /**
   $query=DB::table('producto')
       ->where('codigo', 'LIKE', '%'.$produ.'%')
       ->select('Precio_Pro','nombre_pro','codigo','idproducto')
       ->orWhere('nombre_pro', 'LIKE', '%'.$produ.'%')
       ->take(5)->get();
*/
   $query=DB::select("SELECT p.idproducto,p.nombre_pro,p.Precio_Pro, p.codigo,p.stock,p.idproducto
            from producto as p WHERE( p.nombre_pro LIKE '%".$produ."%' Or p.codigo LIKE '%".$produ."%') and p.stock>=5");
        foreach ($query as $quer)
        {
            $resulta[] = [ 'precio' => $quer->Precio_Pro, 'value' =>$quer->nombre_pro,'codigo' =>$quer->codigo, 'cantidad' =>$quer->stock,'idproducto'=>$quer->idproducto];
        }
        $data=array('hecho'=>'si','list_cliente'=>$resulta);

        echo json_encode($data);
    }
    public function cargarClie(){
        $produ=Input::get('texto');
        $resulta=array();
        $query=DB::select("SELECT p.nombre ,p.Apellido_pat,p.Apellido_Materno,p.idtipoPersona,
        c.idcliente FROM cliente as c , tipopersona as p 
        WHERE c.tipoPersona_idtipoPersona=p.idtipoPersona 
        and p.nombre LIKE '%".$produ."%' AND p.Apellido_pat LIKE '%".$produ."%'
        AND p.Apellido_Materno LIKE '%".$produ."%' and c.clien_estado='Activado'");

        foreach ($query as $quer)
        {
            $resulta[] = [ 'id' => $quer->idcliente, 'value' =>$quer->nombre.' '.$quer->Apellido_pat.' '.$quer->Apellido_Materno];
        }

        $data=array('hecho'=>'si','list_cliente'=>$resulta);

        echo json_encode($data);
    }

    public function RegistrarProductos(){

        $model = new detalle_venta();
        $data = $_POST['array1'];

        $dataProducto = json_decode($data);
        $idproducto= $dataProducto->{"idproducto"};
        $cantidad= $dataProducto->{"cantidad"};
        $monto= $dataProducto->{"monto"};
        $model->id_producto=$idproducto;
        $model->cantidad=$cantidad;
        $model->precio_venta=$monto;
        $model->idventa=1;
        $model->save();
    }

    public function RegistrarVenta(){
        $model = new venta();
        $data =$_POST['array2'];
        $dataVenta = json_decode($data);

        $totalventa=$dataVenta->{"ventatotal"};
        $cliente_idcliente=$dataVenta->{"idcliente"};

        $model->total_venta=$totalventa;
        $model->cliente_idcliente=$cliente_idcliente;
        $model->save();
    }

    public function ImprimirBoleta(){

        /*
            Aquí, en lugar de "POS-58" (que es el nombre de mi impresora)
            escribe el nombre de la tuya. Recuerda que debes compartirla
            desde el panel de control
        */

        $nombre_impresora = "POS-58";


        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);


        /*
            Vamos a imprimir un logotipo
            opcional. Recuerda que esto
            no funcionará en todas las
            impresoras

            Pequeña nota: Es recomendable que la imagen no sea
            transparente (aunque sea png hay que quitar el canal alfa)
            y que tenga una resolución baja. En mi caso
            la imagen que uso es de 250 x 250
        */

# Vamos a alinear al centro lo próximo que imprimamos
        $printer->setJustification(Printer::JUSTIFY_CENTER);

        /*
            Intentaremos cargar e imprimir
            el logo

        try{
            $logo = EscposImage::load("logo.png", false);
            $printer->bitImage($logo);
        }catch(Exception $e){/*No hacemos nada si hay error}*/

        /*
            Ahora vamos a imprimir un encabezado
        */

        $printer->text("Yo voy en el encabezado" . "\n");
        $printer->text("Otra linea" . "\n");
#La fecha también
        $printer->text(date("Y-m-d H:i:s") . "\n");


        /*
            Ahora vamos a imprimir los
            productos
        */

# Para mostrar el total


        /*
            Terminamos de imprimir
            los productos, ahora va el total
        */
        $printer->text("--------\n");
        $printer->text("TOTAL: $51551");


        /*
            Podemos poner también un pie de página
        */
        $printer->text("Muchas gracias por su compra\nparzibyte.me");



        /*Alimentamos el papel 3 veces*/
        $printer->feed(3);

        /*
            Cortamos el papel. Si nuestra impresora
            no tiene soporte para ello, no generará
            ningún error
        */
        $printer->cut();

        /*
            Por medio de la impresora mandamos un pulso.
            Esto es útil cuando la tenemos conectada
            por ejemplo a un cajón
        */
        $printer->pulse();

        /*
            Para imprimir realmente, tenemos que "cerrar"
            la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
        */
        $printer->close();
    }

}
