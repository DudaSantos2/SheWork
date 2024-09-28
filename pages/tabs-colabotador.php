        <style>
            .nav-pills .nav-link.active{
                background-color: transparent !important;
                color: #000;
             }
             .nav-pills .show>.nav-link {
                background-color: transparent !important;
                color: #000;
             }
            .nav-link2 {
                color: #000 !important;
                text-align: left;
                opacity: 0.7;
                font-size: 80px;
                font-weight: 600;
                text-align: left;
                background-color: transparent;
                border: none
            }
            .tab-pane {
                opacity: 0;
                visibility: hidden;
                height: 0;
                transition: ;
                padding-left: 20px
            }

            .tab-pane.show {
                opacity: 1;
                visibility: visible;
                height: auto;
                transition: ;
            }
            .mt-120{
                margin-top: 120px
            }
            .mb-120{
                margin-bottom: 120px
            }
            .titulo-vantagens{
                background-color: #861AD2;
                padding: 20px;
                border-radius: 15px;
                color: #fff;
                text-align: center
            }
        </style>
         
    <section class="mt-120 mb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-tabs">
                        <img src="../assets/img/img-vantagens.jpg"
                        width="100%"
                        alt="">
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <div class="align-items-start">
                        <h4 class="titulo-vantagens">
                            Vantagens do nosso ecossistema
                        </h4>
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <button class="nav-link2 active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Cliente</button>
                          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis cum necessitatibus itaque, error perferendis, molestias obcaecati nesciunt dolorum suscipit excepturi ex eligendi, id quasi. Sunt exercitationem accusantium autem repudiandae ab.</div>
                          <button class="nav-link2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Colaborador</button>
                          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci dicta accusamus deserunt, saepe ea veniam neque harum perferendis eligendi repudiandae quo deleniti quam commodi incidunt aliquam dolores quasi minus? Accusantium!</div>
                          <button class="nav-link2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
                          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam ipsa ipsam impedit aspernatur iure soluta libero possimus nostrum facilis velit quam atque vel cum est fuga, corrupti magni adipisci quaerat.</div>
                          <button class="nav-link2" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
                          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima ea rem voluptate, cum quaerat ipsa expedita, autem sapiente adipisci impedit iure ex at. Doloremque ex molestias sint nisi illo iste!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>