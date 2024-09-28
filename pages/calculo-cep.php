<style>
    .bg-cep{
        background-color: #4c0677
    }
    .btn-cep{
        background-color: transparent;
        border: none;
    }
    .mr-10{
        margin-right: 10px
    }
    .text-right{
        text-align: right !important;
    }
    .text-left{
        text-align: left !important;
    }
    .p-4-5{
        padding: 4.5rem !important;
    }
    .result{
        padding: 15px;
        border-radius: 5px;
        background: #fff;
        border: 2px solid #861AD2;
    }
</style>


<section class="bg-cep pb-5">
    <div class="container form-b p-4-5">
        <div class="row">
            <div class="col-md-7">
              <img src="assets/img/predio-sobre.jpeg"
                   width="80%"
                   alt="">
            </div>
            <div class="col-md-5">
            <h1>Consulte seu cep para usufruir da SheWork</h1>
              <form id="cepForm" class="text-right">
                    <div class="form-group text-left">
                    <label for="cep">Digite o CEP:</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite seu CEP" required>
                    </div>
                    <button type="submit" class="link-efeito btn-cep mr-10 mb-5">Consultar</button>
                <div id="result" class="mt-4 text-left"></div>
              </form>
            </div>
        </div>
    </div>
</section>

