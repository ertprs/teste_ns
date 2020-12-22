<?php require("validacao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Painel de administrativo</title>
    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css?id=<?php echo time(); ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <!-- Calendario -->
    <link href="css/calender.css" rel="stylesheet">
    <link href="css/card.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link href="calendario/fullcalendar.css" rel="stylesheet" />
<link href="calendario/fullcalendar.print.css" rel="stylesheet" media="print" />
<link href="css/daterangepicker.css" rel="stylesheet">
<link href="css/jquery-clockpicker.min.css" rel="stylesheet">
<link href="css/bootstrap-timepicker.min.css" rel="stylesheet">

<link href="css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-select.min.css" rel="stylesheet" />
<link href="css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="css/switchery.min.css" rel="stylesheet" />
<link href="css/bootstrap-select.min.css" rel="stylesheet" />
<link href="css/bootstrap-tagsinput.css" rel="stylesheet" />
<link href="css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">

        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">                 
                     <span>                       
                        <img src="images/hc_logo.png" class="img-fluid" width="200">
                    </span>
                </a>
            </div>
            <div class="navbar-collapse">                  
                <ul class="navbar-nav mr-auto mt-md-0 pt-3 pl-3">

                    <h3 class="text-white">Sistema HC - notícia e jornal</h3>

                    
                </ul>
                <ul class="navbar-nav my-lg-15">
                    <li class="nav-item dropdown">
                        <span class="titulo-ola">Bem-vindo <?php echo $nome; ?>!</span>
                    </li>
                    <li>
                        <a href="logout.php" data-original-title="Sair do sistema">
                            <i class="mdi mdi-power fa-2x"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li>
                        <a href="index.php" class="waves-effect"><i class="fa fa-dashboard m-r-10" aria-hidden="true"></i>Painel Inicial</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o m-r-10" aria-hidden="true"></i>Jornal HC</a>
                        <ul>
                         <li>
                            <a href="lista-ver-todos.php" class="waves-effect"><i class="fa fa-newspaper-o m-r-10" aria-hidden="true"></i>Criar Jornal</a>
                        </li>
                        <li>
                            <a href="noticia-lista.php" class="waves-effect"><i class="fa fa-newspaper-o m-r-10" aria-hidden="true"></i>Ambiente de Notícias</a>
                        </li>
                        
                        <li>
                            <a href="adicionar-emails.php" class="waves-effect"><i class="fa fa-envelope-o m-r-10" aria-hidden="true"></i>E-mails </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="noticia-loop-lista.php" class="waves-effect"><i class="fa fa-picture-o m-r-10" aria-hidden="true"></i>Imagem Loop - siteHC </a>
                </li>                        

            </ul>
        </nav>
        <div class="sidebar-footer">
            <center>
               <small>Tecnologia Limão Cravo</small>
           </center>
       </div>
   </div>
</aside>

