@extends('layouts.app')
@section('content-body')
    <div class="container" style="margin-top: 10rem">
        <div class="d-flex justify-content-center align-items-center">
            <div class="d-flex justify-content-center align-items-center row p-5">
                <a href="{{ route('list.comics') }}" class="col-md-12 btn btn-danger my-3">Listado de comics</a>
                <a href="{{ route('list.sucursales') }}" class="col-md-12 btn btn-danger my-3">Ver sucursales</a>
            </div>
        </div>
    </div>
@endsection