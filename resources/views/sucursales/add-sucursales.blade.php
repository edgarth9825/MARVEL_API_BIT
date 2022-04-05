@extends('layouts.app')
@section('content-body')
<div class="my-5">
    <div class="container bg-white rounded shadow-sm p-4">
        <h1 class="text-center text-secondary font-weight-bold my-3">Agregar sucursal</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <form action="{{ route('store.sucursales') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12 my-2">
                            <label for="name">Nombre de la sucursal</label>
                            <input type="text" class="form-control" name="name" id="name" required placeholder="Nombre de la sucursal">
                        </div>
                        <div class="col-md-12 my-2">
                            <label for="location">Ubicación de la sucursal</label>
                            <input type="text" class="form-control" name="location" id="location" required placeholder="Eje: Galerias Toluca">
                        </div>
                        <div class="col-md-12 my-2">
                            <label for="phone">Teléfono</label>
                            <input type="number" class="form-control" name="phone" id="phone" required placeholder="Eje: 7222222222">
                        </div>
                        <div class="col-md-4 my-2">
                            <button type="submit" class="btn btn-primary mt-4">Registrar</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="comic">Comics en la sucursal</label>
                        <table class="table">
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
                                        <td><input id="comic_title_{{ $comic['title'] }}" type="checkbox" name="comics[]" value="{{ $comic['title'] }}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection