@extends('layouts.app')
@section('content-body')
<div class="my-5">
    <div class="container bg-white rounded shadow-sm p-4">
        <h1 class="text-center text-secondary font-weight-bold my-3">Listado de sucursales</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <a href="{{ route('create.sucursales') }}" class="btn btn-success my-5"><i class="fa-solid fa-plus"></i> Agregar sucursal</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Teléfono</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sucursales as $sucursal)
                        <tr>
                            <td>{{ $sucursal->id_sucursales }}</td>
                            <td>{{ $sucursal->name }}</td>
                            <td>{{ $sucursal->location }}</td>
                            <td>{{ $sucursal->phone }}</td>
                            <td>
                                <div class="row">
                                    <form action="{{ route('delete.sucursales', $sucursal->id_sucursales) }}" method="POST">
                                        @method('DELETE') @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash" onclick="return confirm('¿Quieres borrar')"></i></button>
                                    </form>
                                    <a href="{{ route('details.sucursales', $sucursal->id_sucursales) }}" class="btn btn-info text-white mx-2"><i class="fa-solid fa-circle-info"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection