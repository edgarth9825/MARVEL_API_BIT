@extends('layouts.app')
@section('content-body')
<div class="my-5">
    <div class="container bg-white rounded shadow-sm p-4">
        <h1 class="text-center text-secondary font-weight-bold my-3">Actualizar sucursal</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('successI'))
            {{ session('successI') }}
        @endif
        <div>
            <form action="{{ route('update.sucursales', $sucursal->id_sucursales) }}" method="POST">
                @csrf @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12 my-2">
                            <label for="name">Nombre de la sucursal</label>
                            <input type="text" class="form-control" name="name" id="name" required placeholder="Nombre de la sucursal" value="{{ $sucursal->name }}">
                        </div>
                        <div class="col-md-12 my-2">
                            <label for="location">Ubicación de la sucursal</label>
                            <input type="text" class="form-control" name="location" id="location" required placeholder="Eje: Galerias Toluca" value="{{ $sucursal->location }}">
                        </div>
                        <div class="col-md-12 my-2">
                            <label for="phone">Teléfono</label>
                            <input type="number" class="form-control" name="phone" id="phone" required placeholder="Eje: 7222222222" value="{{ $sucursal->phone }}">
                        </div>
                        <div class="col-md-4 my-2">
                            <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="comic">Comics para marcar</label>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comics2 as $comic)
                                    <tr>
                                        <td>{{ $comic['title'] }}</td>
                                        <td><input type="checkbox" name="comics[]" value="{{ $comic['title'] }}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
            <div class="col-md-12">
                <h3 class="text-center text-secondary font-weight-bold my-3">Comics disponibles en la sucursal</h3>
                <div>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nombre del comic</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventory as $inv)
                                <tr>
                                    <td>{{ $inv->name_comic }}</td>
                                    <td>
                                        <form action="{{ route('delete.inventory', $inv->id_inventory) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection