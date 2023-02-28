<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <Style>
        .logo{
            margin-top: -30px;    
            margin-left: -30px;  
            width: 130px;
            height: 80px;
        }
        h2{
            text-decoration: underline;
            text-align: center;
            margin-top: -40px;
        }
        .codigo{
            color: red;
            text-align: right;
            margin-top: -50px;
            font-size: 20px;
        }
        .distribuidor{
            margin-top: 40px;
            margin-left: 20px;
            font-size: 14px;
        }
        .fecha{
            float: right;
            margin-top: -70px;
            font-size: 14px;
        }
        table{
            border-collapse: collapse;
            border: 1px solid black;
            text-align: center;
            margin-bottom: 20px;
        }
        td, th{
            border: 1px solid black;
        }
        thead{
            background-color: cornflowerblue;
        }
        label{
            background-color: cornflowerblue;
            border: 1px solid black;
        }
        .cn1 {
            width: 200px;
            font-size: 12px;
        }
        .cn2{
            width: 50px;
            background-color: white;
            font-size: 12px;
        }


        .n1{
            float: left; 
            width: 50%; 
        }
        .n2{
            margin-left: 50%; 
            width: 50%; 
        }
        .tc{
            margin-left: auto;
            margin-right: auto;
        }
        .carga{
            width: 200px;
            height: 150px;
        }
        .img{
            width: 150;
            height: 100;   
            margin-left: 250px; 
        }
        .firma{
            float: right;
            text-decoration: overline;
        }
        .firma1{
            float: left;
            text-decoration: overline;
        }

    </Style>
</head>

<body>
    <img src="vendor/adminlte/dist/img/logo.jpg" width="150" height="120" class="logo">
    <h2> NOTA DE DESPACHO DE ALMACEN</h2>

    @foreach ($despacho as $desp)
    @if ($desp->id == $id)
    <div  id="cont">
        <div id="head">       
            <p class="codigo">Nº {{$desp->codigo}}</p> 
                <div class="dist" style="display: flex">
                    @foreach ($distribuidores as $distribuidor)
                    @if ($desp->distribuidor_id == $distribuidor->id)
                    <div class="distribuidor">
                        <p>NOMBRE DEL DISTRIBUIDOR: {{$distribuidor->nombre}}</p>
                    </div>
                    @endif 
                    @endforeach    
                    <div class="fecha">
                        <p>FECHA: {{$desp->fecha}}</p>
                    </div>                   
                </div>
        </div> 
    </div>

    <div class="body">
        <table class="tc">
            <thead>
                <th>Cod</th>
                <th>Producto</th>
                <th>Salida</th>
                <th>fecha de Vencimiento</th>
                <th>Devol.</th>
            </thead>
            
            <tbody>
                
            @foreach ($detalle as $deta)
            @if($desp->id==$deta->despacho_id)
                    <tr>
                        @foreach ($producto as $produ) 
                        @if ($deta->producto_id == $produ->id)
                        <td>{{$produ->codigo}}</td>
                        <td>{{$produ->nombre}}</td>
                        @endif 
                        @endforeach 
                        <td>{{$deta->salida}}</td>
                        <td>{{$deta->fvencimiento}}</td>
                        <td>{{$deta->devoluciones}}</td>
                    </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        @endif
        @endforeach
    </div>


    <div class="footer">
        <div class="n1">
            <table>
                <thead>
                    <th class="cn1"> ENTRADA DE CANASTILLO</th>
                    <th class="cn2">{{$desp->entradacanasta}} </th>
                </thead>
            </table>
        </div>
        <div class="n2">
            <table>
                <thead>
                    <th class="cn1"> SALIDA DE CANASTILLO</th>
                    <th class="cn2">{{$desp->salidacanasta}}</th>
                </thead>
            </table>
        </div>
    </div>
    <p></p>
    <div >
        <img class="img" src="vendor/adminlte/dist/img/carga.jpg">
    </div>
    <p class="firma1"> ENTREGUE CONFORME</p>
    <p class="firma">RECIBI CONFORME</p>
</body>


</html>