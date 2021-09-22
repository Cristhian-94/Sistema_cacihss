<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte Solucionados por Departamento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
    <style>
    @page {
            margin: 0.5cm 0.5cm;
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
            height: 2.75cm;
            background-color: green;
            color: black;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: green;
            color: black;
            text-align: center;
            line-height: 35px;
        }
    <style>


        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: green;
          color: black;
        }
        </style>

<style>
	.page-break {
	    page-break-after: always;
	}
</style>






</head>
<body>
    <header >
        <main>
            <div class="container-fluid">
                <img  class=" float-left m-2 " src="https://cacihss.hn/wp-content/uploads/2021/04/logo-cooperativa.png2_-e1619626646259.png" alt="">
                <h1 class="text-center  m-4">Tickets Solucionados por Departamento </h1>
            </div>
        </main>
    </header>
    <main>
        <br>
        <div class="container-fluid">
            <h5>Generado Por: <b class="text-success" > {{ Auth::user()->name }}</h5>
            <h5>Generado el: <b class="text-success" > </h5>
        </div>
    <br>
    <br>
    <br>


            <table id="customers">
                     <tr>
                        <th>#</th>
                        <th>Nombre de Ticket</th>
                        <th>Enviado por:</th>
                        <th>Departamento:</th>
                        <th>Fecha  en que fue Recibido</th>
                        <th>Fecha Solucionado</th>
                     </tr>
                <tbody>
                    @foreach ($ticketsdepto as $ticketsdepto)

                    <tr>
                        <td>{{ $loop->iteration  }}</td>
                        <td>{{ $ticketsdepto->title }}</td>
                        <td> {{$ticketsdepto->user->name}} </td>
                        <td> {{$ticketsdepto->user->department->name}} </td>
                        
                        <td>{{ $ticketsdepto->created_at->format('d-m-Y  H:i a') }}</td>
                        <td>{{ $ticketsdepto->updated_at->format('d-m-Y  H:i a') }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


           <!--- Salto de Pagina--->
            {{-- <div class="page-break"></div> --}}

    </main>

        <footer>
            <h1 class="m-2" >Sistema Tickets-CACIHSS</h1>
        </footer>

        <script type="text/php">
            if ( isset($pdf) ) {
                $pdf->page_script('
                    $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                    $pdf->text(750, 550, " Pág. $PAGE_NUM de $PAGE_COUNT", $font, 14);
                ');
            }
            </script>
</body>
</html>
