<?php
//var_dump($_REQUEST['go']);
?>

<!doctype html>
<html>
<head>
    <?php include('./head.php') ?>
</head>

<body>
<?php include('../components/navbar.php'); ?>

<?php if ($_REQUEST['go'] == 'criar-sua-conta') { ?>
    <?php include('register.php') ?>
<?php } else if ($_REQUEST['go'] == 'sobre-nos') { ?>
    <?php include('quemsomos-sobre.php') ?>
    <?php include('cta.php') ?>

<?php } else if ($_REQUEST['go'] == 'login') { ?>
    <?php include('login.php') ?>
<?php } else if ($_REQUEST['go'] == 'colaborador') { ?>
    <?php include('tabs-colabotador.php') ?>
<?php } else if ($_REQUEST['go'] == 'contato') { ?>
    <?php include('contato.php') ?>

<?php } else if ($_REQUEST['go'] == 'signup') { ?>
    <?php include('sign-up.php') ?>
<?php } else if ($_REQUEST['go'] == 'construcao') { ?>
    <? include('construcao.php') ?>
<?php } ?>

<?php include('footer.php') ?>

<?php include('scripts.php') ?>
</body>
</html>