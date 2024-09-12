<style>
	body{
		font-size: 20px
	}
	.bg-shework{
		background-color: #fff !important;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
	.navbar-brand{
		font-size: 40px
	}
	.navbar-toggler {
		padding: var(--bs-navbar-toggler-padding-y) var(--bs-navbar-toggler-padding-x);
		font-size: var(--bs-navbar-toggler-font-size);
		line-height: 1;
		color: rgb(255 255 255);
		background-color: white;
		border: var(--bs-border-width) solid rgb(206 0 255 / 15%);
		border-radius: var(--bs-navbar-toggler-border-radius);
		transition: var(--bs-navbar-toggler-transition);
	}
    .titulo{
        color: #000;
        font-size: 40px
    }
    .titulo span{
        color: #861AD2;
        font-size: 50px
    }
    .navbar-desktop li a{
        color: #000;
        text-decoration: none;
    }
    .navbar-desktop li a:hover{
        color: #861AD2;
        text-decoration: underline;
    }
    .btn-criar-conta{
        padding: 10px 40px;
        border-radius: 15px;
        color: #fff !important;
        background-color: #861AD2;
    }
    .btn-criar-conta:hover{
        background-color: 
    }
    .btn-login i{
        margin-left: 2px
    }
    .btn-login, .btn-login i{
        color: #861AD2 !important;
        font-weight: 600
    }
    
</style>

<nav class="navbar fixed-top bg-shework">
  <div class="container-fluid">
   
    <div class="d-flex justify-content-between w-100 align-items-center">
        <div>
            <a class="titulo" href="index.php"><h2><span><strong style="font-size: 34px">SHE</strong></span>work</h2></a>
        </div>
         <!--  NAVBAR DO DESKTOP AQUI  -->
        <div>
            <div class="esconder-mobile">
                <ul class="d-flex list-unstyled justidy-content-around gap-3 mb-0 navbar-desktop">
                    <li><a href="index.php">Início</a></li>
                    <li><a href="painel.php?go=sobre-nos">Quem somos</a></li>
                    <li><a href="painel.php?go=colaborador">Seja colaborador</a></li>
                    <li><a href="painel.php?go=config">Serviços</a></li>
                    <li><a href="painel.php?go=contato">Contato</a></li>
                    <li><a href="painel.php?go=login" class="btn-login">Login<i class="fal fa-sign-in-alt"></i></a></li>
                    <li><a href="painel.php?go=signup" class="btn-criar-conta">Criar Conta</a></li>
                </ul>  
            </div>
        </div>
        <!--    FIM DA NAVBAR    -->
        <div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navegação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/tecnologia">Profissão</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="painel.php?go=contato">Contato</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
        </div>
    </div>
  </div>
</nav>