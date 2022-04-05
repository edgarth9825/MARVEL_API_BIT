<div class="col-md-3 my-3">
    <div class="card w-100 h-100">
        <img class="card-img-top" src="{{ $img }}.{{ $extension }}" alt="{{ $title }}">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h5 class="card-title">{{ $title }}</h5>
                    <p class="card-text">Volumen: @if ($version != 0)
                        {{ $version }}
                    @else
                        Sin volumen
                    @endif</p>
                </div>
                <div class="col-12 mt-3">
                    <a href="{{ route('details.comics', $comic_id) }}" class="btn btn-primary">Más información</a>
                </div>
            </div>
        </div>
    </div>
</div>