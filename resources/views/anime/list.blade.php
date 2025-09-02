<x-layout>
    <div class="container">
        <div class="row">
            <h2 class="display-4 text-center my-5">
                Tutti gli anime del genere "{{$genre_name}}"
            </h2>
            @foreach($animes as $anime)
            <div class="col-12 col-md-3 mb-5">
                <div class="card">
                    <img src="{{$anime['image']}}" class="card-img-top" alt="poster di {{$anime['title']}}" style="height: 30rem;">
                    <div class="car-body">
                        <h5 class="card-title">
                            {{$anime['title']}}
                        </h5>
                        <p class="card-text text-truncate">
                            {{$anime['synopsis']}}
                        </p>
                        <p class="small fst-italic text-muted">
                            Anno:  {{$anime['year']}}
                        </p>
                        <a href="{{route('anime.show',['anime_id'=>$anime['id']])}}" class="btn btn-primary">Vai al dettaglio</a>
                    </div>
                </div>            
            </div>
            @endforeach
        </div>
    </div>


</x-layout>