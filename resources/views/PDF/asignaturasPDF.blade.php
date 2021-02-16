<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TABLA DE ASIGNATURAS</title>
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
            <h5 style="text-align: center"><strong>TABLA DE ASIGNATURAS</strong></h5>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Id asignatura</th>
                        <th scope="col">Nombre asignatura</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Rut del profesor</th>
                        <th scope="col">Id del estudiante</th>
                        <th scope="col">N° de estudiantes</th>

                    </tr>
                </thead>
               <tbody>
                @foreach($asignaturas as $asignatura)
                    <tr>
                        <td>{{$asignatura->id}}</td>
                        <td>{{$asignatura->nombre_Asignatura}}</td>
                        <td>{{$asignatura->descripcion}}</td>
                        <td>{{$asignatura->rut_profesor}}</td>
                        <td>{{$asignatura->id_estudiante}}</td>
                        <td>{{$asignatura->num_estudiantes}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>