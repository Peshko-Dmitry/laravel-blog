    <!-- Slider -->
    <main>
        <div class="container-xxl bg-dark">
            <div class="row ">
                <div class="col-12 p-0">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                           
                           @foreach ($slider as $slide)
                               <div class="carousel-item @if($slide->id == $slider[0]->id) active @endif" data-interval="4000">
                                <img src="/storage/posts/{{$slide->thumbnail}}" class="d-block w-100" alt="...">
                                   <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$slide->title}}</h5>
                                    <p>{{$slide->preview}}</p>
                                </div>
                                <a href="/news/{{$slide->id}}" class="btn btn-primary btn-lg slider-btn ">Прочитать</a>
                            </div>
                           @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>