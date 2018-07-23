@extends ('layouts.app')

@section ('content')


    <div class="container">
        <button type="button" class="btn btn-primary" onclick="window.history.back()">Back</button>


        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://uwm.edu/studentinvolvement/wp-content/uploads/sites/260/2015/05/start.png" alt="First slide">
                </div>

                    @foreach ($cards as $card)

                        <div class="carousel-item">
                            <div class="card m-2 text-center d-block">
                                <div class="card-header">{{ $card->term }}</div>
                                <div class="card-body" style="background-color: #ff6666; height: 520px">{{ $card->definition }}</div>
                            </div>
                        </div>

                    @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


@endsection
