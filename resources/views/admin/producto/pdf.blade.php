<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table{
            width: 100%;
            border: 1px solid #000;
        }
        td {
            border: 1px solid black;
            page-break-inside: auto;
        }
    
        th {
            color: #000000;
            background-color: #ADD8E6;
            border: 1px solid black;
            page-break-inside: auto;
        }
        
        @page {
            margin-left: 2.54cm;
            margin-right: 2.54cm;
            margin-top: 2.00cm;
            margin-bottom: 2.00cm;
        }
    
    </style>
</head>
<body>
    <h1>REGISTRO DE PRODUCTOS</h1>
    <table id="usuarios" class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Categoria</th>
        </thead>
        <tbody>
            @foreach ($producto as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->codigo}}</td>
                    <td>{{$producto->nombre}}</td>
                    @foreach ($categoria as $category)
                    @if ($producto->categoria_id == $category->id)
                    <td>{{$category->nombre}}</td>
                    @endif 
                    @endforeach              
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>