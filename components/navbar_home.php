<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<nav class="navbar bg-body-tertiary">
    <div onclick="voltaHome()">
        <h2 class="titulo" style="cursor: pointer;"><span><strong style="font-size: 34px">
                SHE</strong></span>work
        </h2>
    </div>
    <div class="nav-item dropdown">
        <button class="btn btn-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Olá <b><?= $_SESSION['user']['name'] ?>!</b>
        </button>
        <ul class="dropdown-menu dropdown-menu">
            <li><a class="dropdown-item d-flex gap-2 align-items-center" href="../pages/profile.php"><i
                            style="color: #3F3F3F"
                            class="fa-solid fa-pen-to-square"></i>Editar
                    perfil</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item d-flex gap-2 align-items-center" href="../backend/logout.php"><i
                            style="color: #3F3F3F"
                            class="fa-solid fa-right-from-bracket"></i>Sair</a>
            </li>
        </ul>
    </div>
</nav>

<script>
    function voltaHome() {
        window.location.href = "/pit/pages/home.php"
    }
</script>
