<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TABLA DE PROFESORES</title>
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
            <h5 style="text-align: center"><strong>TABLA DE PROFESORES</strong></h5>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Asignatura</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Rut</th>
                        <th scope="col">Correo</th>
                    </tr>
                </thead>
               <tbody>
                @foreach($profesores as $profesor)
                    <tr>
                        <td>{{ $profesor->asignatura }}</td>                        
                        <td>{{$profesor->nombre}} {{$profesor->A_paterno}} {{$profesor->A_materno}}</td>
                        <td>{{ $profesor->rut }}</td>
                        <td>{{ $profesor->correo }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>