<style>
    .cta {
        background-image: url(../assets/img/banner-1.jpg);
        height: 80vh;
        background-size: cover;
    }

    .card-cta {
        background-color: #861AD2;
        padding: 20px;
        border-radius: 25px;
    }

    .grupo-quemsomos {
        text-align: center
    }

    .swiper-slide {
        background-color: #861AD2;
        padding: 20px;
        border-radius: 25px;
    }

    .swiper-slide-active {
        background-color: #fff !important;
        transition: all ease-in 2s;
        transform: scale(1.2)
    }

    .img-grupo-quemsomos {
        border-radius: 20%;
    }
</style>


<section class="cta d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="titulo-sobre text-white">Nosso time!</h2>
                <p class="text-white text-sobre">Na SheWork, oferecemos um ambiente de trabalho acolhedor e seguro para
                    mulheres. Nossa equipe feminina realiza serviços gerais de qualidade, atendendo a todas as
                    necessidades. Se precisar de algo que ainda não fazemos, é só nos avisar! Junte-se à SheWork e
                    ajude-nos a empoderar mulheres por toda parte!</p>
            </div>
            <div class="col-md-4 col-0"></div>
            <div class="col-md-8 mt-5">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="grupo-quemsomos">
                                <img src="../assets/img/foto-ceo.jpeg"
                                     width="100"
                                     heigth="100"
                                     class="img-grupo-quemsomos mt-2" alt="">
                                <h5 class="mt-3 cor-primaria"><strong>CEO</strong><br>Luisa Carvalho</h5>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="grupo-quemsomos">
                                <img src="../assets/img/pablo.jpeg"
                                     width="100"
                                     heigth="100"
                                     class="img-grupo-quemsomos mt-2" alt="">
                                <h5 class="mt-3 cor-primaria"><strong>DEV</strong><br>Pablo Silva</h5>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="grupo-quemsomos">
                                <img src="../assets/img/pedro.jpeg"
                                     width="100"
                                     heigth="100"
                                     class="img-grupo-quemsomos mt-2" alt="">
                                <h5 class="mt-3 cor-primaria"><strong>DEV</strong><br>Pedro Henrique</h5>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="grupo-quemsomos">
                                <img src="../assets/img/eduarda.jpeg"
                                     width="100"
                                     heigth="100"
                                     class="img-grupo-quemsomos mt-2" alt="">
                                <h5 class="mt-3 cor-primaria"><strong>CTO</strong><br>Eduarda Santos</h5>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>


                </div>
            </div>
            <div class="col-md-4 col-0"></div>

        </div>
    </div>
</section>