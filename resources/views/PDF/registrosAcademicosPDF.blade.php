<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TABLA DE LOS REGISTROS ACADEMICOS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @page {
            margin: 0cm 0cm;
            font-size: 1em;
        }
        body {
            margin: 3cm 2cm 2cm;
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #46C66B;
            color: white;
            text-align: center;
            line-height: 30px;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #46C66B;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <h5 style="text-align: center"><strong>TABLA DE LOS REGISTROS ACADEMICOS</strong></h5>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Id estudiante</th>
                        <th scope="col">Rut</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha inscripcion</th>
                        <th scope="col">Promedio</th>
                        <th scope="col">Observaciones</th>
                    </tr>
                </thead>
               <tbody>
                @foreach($registros_academicos as $registro_academico)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$registro_academico->id_estudiante}}</td>
                        <td>{{$registro_academico->rut}}</td>
                        <td>{{$registro_academico->nombre}} {{$registro_academico->A_paterno}} {{$registro_academico->A_materno}}</td>
                        <td>{{$registro_academico->fecha_inscripcion}}</td>
                        <td>{{$registro_academico->promedio}}</td>
                        <td>{{$registro_academico->observaciones}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>