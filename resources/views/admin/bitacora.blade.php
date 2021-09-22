@extends('layouts.plantillaadmin')

@section('title','Bitacora de Tickets')

@section('content')

<div class="container-fluid">
    <h1><b>
Bitácora
    </b> </h1>
    <div class="card">
        <div class="card-header bg-primary">
            <b>Bitácora de Tickets</b>
        </div>
        <div class="card-body">
            <table id="categories" class="table table-bordered">
                <thead class="bg-primary text-dark ">
                    <tr>
                        <th>No.</th>
                        <th>Acción</th>
                        <th>Descripcion</th>
                        <th>Fecha Creación </th>
                        <th>Fecha Actualización </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bitacora as $bitacora )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bitacora->action }}</td>
                        <td>{{ $bitacora->description }}</td>
                        <td>{{ $bitacora->created_at }}</td>
                        <td>{{ $bitacora->updated_at }}</td>

                    </tr>
                    @endforeach
                </tbody>



            </table>

        </div>
    </div>
</div>

@endsection
