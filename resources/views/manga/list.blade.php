<x-layout>
    <div class="container">
        <div class="row">
            <h2 class="display-4 text-center my-5">
                Tutti i manga del genere "{{$genre_name}}"
            </h2>
            @foreach($mangas as $manga)
            <div class="col-12 col-md-3 mb-5">
                <div class="card">
                    <img src="{{$manga['image']}}" class="card-img-top" alt="poster di {{$manga['title']}}" style="height: 30rem;">
                    <div class="car-body">
                        <h5 class="card-title">
                            {{$manga['title']}}
                        </h5>
                        <p class="card-text text-truncate">
                            {{$manga['synopsis']}}
                        </p>
                        
                        <a href="" class="btn btn-primary">Vai al dettaglio</a>
                    </div>
                </div>            
            </div>
            @endforeach
        </div>
    </div>


</x-layout>