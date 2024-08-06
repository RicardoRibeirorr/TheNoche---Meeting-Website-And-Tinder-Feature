@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row mb-4">

        <div class="col-12 mb-sm-6 d-none d-sm-block">
            <p class="border-bottom text-muted text-center">Escolha entre duas pessoas clicando no coração a baixo e
                abilite-se a uma <b>Combinação</b>.</p>
        </div>
                <shuffle-profile ></shuffle-profile>
        {{-- End Item --}}

        <div class="col-12 mt-6">
            <div class="row justify-content-center py-4">
                <div class="col-3 mx-1 border">
                    <img src="https://m.media-amazon.com/images/I/71zto62z2oL._AC_UL320_ML1_.jpg"
                        style="max-height:150px" ></div>
                <div class="col-3 mx-1 border">
                    <img src="https://m.media-amazon.com/images/I/61xRZVXHYDL._AC_UL320_ML1_.jpg"
                        style="max-height:150px" ></div>
                <div class="col-3 mx-1 border">
                    <img src="https://m.media-amazon.com/images/I/91qA6tYD3SL._AC_UL320_ML1_.jpg"
                        style="max-height:150px" ></div>
            </div>
        </div>
    </div>

    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3 pr-0"><img src="https://image.ibb.co/f5Kehq/bio-image.jpg"
                                class="img-fluid img-circle" ></div>
                        <div class="col-9">
                            <h3 class="m-0">Joana Silsa</h3>
                            <address class="small text-grey ">Torres Novas, 18 anos</address>
                            <p class="m-0">Sou conversadora e adoro muito muito conhecer gente nova!</p>
                            <button class="close position-absolute" style="top:0; right:15px" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{-- take the border top and right out --}}
                        <div class="col-4 text-center border-right border-top border-bottom  pt-3 mt-4">
                            <span class="font-weight-bold">Since</span>
                            <p class="text-muted">1 year</p>
                        </div>
                        <div class="col-4 text-center border-right border-top border-bottom  pt-3 mt-4">
                            <span class="font-weight-bold">Gender</span>
                            <p class="text-muted">Femail</p>
                        </div>
                        <div class="col-4 text-center border-top  border-bottom  pt-3 mt-4">
                            <span class="font-weight-bold">Looking for</span>
                            <p class="text-muted ">Male</p>
                        </div>
                        <div class="col-6  border-right  pt-4">
                            <ul class="list-unstyled text-center text-muted">
                                <li class=" font-weight-bold text-dark mb-2">Interests & hobbies</li>
                                <li>Sport and gym</li>
                                <li>Law and politic</li>
                                <li>Summer and beatchs</li>
                            </ul>
                        </div>
                        <div class="col-6    pt-4">
                            <ul class="list-unstyled text-center text-muted">
                                <li class="font-weight-bold text-dark mb-2">Likes people</li>
                                <li>Very masculine</li>
                                <li>Strong and non smoker</li>
                                <li>Single</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
