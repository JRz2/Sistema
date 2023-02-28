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
    <h1>REGISTRO DE DISTRIBUIDORES</h1>
    <table id="usuarios" class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Paterno</th>
            <th>Materno</th>
            <th>Celular</th>
        </thead>
        <tbody>
            @foreach ($distribuidor as $distribuidor)
                <tr>
                    <td>{{$distribuidor->id}}</td>
                    <td>{{$distribuidor->nombre}}</td>
                    <td>{{$distribuidor->paterno}}</td>
                    <td>{{$distribuidor->materno}}</td>
                    <td>{{$distribuidor->celular}}</td>             
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>