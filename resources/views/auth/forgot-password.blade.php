@extends('frontend.layouts.master')

@section('content')
    <!--============================
            BREADCRUMB START
        ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>forget password</h4>
                        <ul>
                            <li><a href="#">login</a></li>
                            <li><a href="#">forget password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            BREADCRUMB END
        ==============================-->


    <!--============================
            FORGET PASSWORD START
        ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__forget_area">
                        <span class="qiestion_icon"><i class="fal fa-question-circle"></i></span>
                        <h4>Mot de passe oublié?</h4>
                        <p>Veuillez entrer votre adresse e-mail associée à votre compte afin de procéder à la réinitialisation de votre mot de passe.</p>
                        <div class="wsus__login">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="wsus__login_input">
                                    <i class="fal fa-envelope"></i>
                                    <input id="email" type="email" name="email" value="{{old('email')}}" placeholder="Your Email">
                                </div>

                                <button class="common_btn" type="submit">Envoyer</button>
                            </form>
                        </div>
                        <a class="see_btn mt-4" href="{{route('login')}}">Retour à la connexion</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            FORGET PASSWORD END
        ==============================-->
@endsection
