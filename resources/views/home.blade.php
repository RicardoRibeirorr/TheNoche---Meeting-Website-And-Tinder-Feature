@extends('layouts.blank')

@section('content')
<div class="h-100  bg-gradient">
    <div class="flex-center h-xs-100-vh" style="min-height:60vh"> {{-- Mudar para 70 --}}
        <div class="container container-max text-center">
            <h1 class="font-family-pacific text-red font-60px font-weight-light w-100">TheNoche</h1>
            <p class="text-white font-18px px-3"> Junte-se à <b
                    class="font-family-pacific text-red font-weight-light ">TheNoche</b> e
                entre num mundo de infinitas possibilidades, converse, conheça e divirta-se!</p>
            <button
                class="btn btn-lg py-2 btn-light btn-rounded font-family-pacific anim-heartbeat mt-1vh"
                data-toggle="modal" data-target="#lne-m">Iniciar conta</button>
        </div>
    </div>
    <div class="mb-5" style="min-height:20vh;"> {{-- tirar margem em vh --}}
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-4 text-center my-3">
                    <div class=" anim-push">
                        <h4 class="font-family-pacific  text-light">Publicar</h4>
                        <p class="text-muted-1">Junte-se a festas ou convide todos para sair! <br> <b
                                class="text-light">Quem
                                quer, que apareça!</b></p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 text-center my-3">
                    <div class=" anim-push">
                        <h4 class="font-family-pacific  text-light">Embaralhar</h4>
                        <p class="text-muted-1">Selecção de bombinações para descobrir o seu companheiro certo! <br> <b
                                class="text-light">Eu gosto, tu gostas = combinação!</b></p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 text-center my-3">
                    <div class=" anim-push">
                        <h4 class="font-family-pacific  text-light">Explorar</h4>
                        <p class="text-muted-1">Escolha a partir de uma selecção vasta e a seu critério! <br> <b
                                class="text-light">Eu escolhi-te, queres vir?</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5" style="min-height:20vh">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-4 text-center my-3">
                    <div class="anim-push">
                        <h4 class="font-family-pacific  text-light">Grátis</h4>
                        <p class="text-muted-1">Sem necessidade de pagamentos nem dados bancarios! <br></p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 text-center my-3">
                    <div class=" anim-push">
                        <h4 class="font-family-pacific  text-light">Moeda Justa</h4>
                        <p class="text-muted-1">Converse com pessoas e ganhe moedas para gastar como desejar!</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 text-center my-3">
                    <div class=" anim-push">
                        <h4 class="font-family-pacific  text-light">Seguro e anonimo</h4>
                        <p class="text-muted-1">Protejemos os seus dados e autorizamos nomes falsos!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<autentification lang="{{__("auth.login")}}">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row">
            <div class="col-8 offset-2 ">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Senha</span>
                    </div>
                    <input type="hidden" name="email" id="lne-i"> 
                    <input class="form-control" type="password" name="password"
                        aria-label="password">
                </div>
            </div>
            <div class="col-8 offset-2 text-left mt-2">
                <a href="#" class="text-muted">Esqueceu-se da senha?</a>
            </div>
            <div class="col-12 text-right mt-3">
                <button class="btn btn-sm btn-red btn-rounded border-red font-14px" type="submit">Iniciar Sessão</button>
            </div>
        </div>
    </form>
</autentification>
    
</div>
@endsection
