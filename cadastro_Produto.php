<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon-truck.ico">


    <title>Cadastrar veículo</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Transportadora Transportadora</a>
            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-home"></i> Página Inicial</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#pessoas"><i class="fa fa-fw fa-users"></i> Pessoas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="pessoas" class="collapse">
                            <li>
                               <a href="cadastrarPessoa.html"><i class="fa fa-fw fa-edit"></i>Registrar Pessoas</a>
                            </li>
                            <li>
                             <a href="Pessoas.php"><i class="fa fa-fw fa-bars"></i>Consultar Pessoas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#encomendas"><i class="fa fa-fw fa-archive"></i> Encomendas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="encomendas" class="collapse">
                            <li>
                               <a href="cadastrarEncomenda.html"><i class="fa fa-fw fa-edit"></i>Nova Encomenda</a>
                            </li>
                            <li>
                             <a href="Encomendas.php"><i class="fa fa-fw fa-bars"></i>Listar Encomendas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#veiculos"><i class="fa fa-fw fa-truck"></i> Veículos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="veiculos" class="collapse">
                            <li>
                               <a href="cadastrarVeiculo.html"><i class="fa fa-fw fa-edit"></i>Cadastrar Veículo</a>
                            </li>
                            <li>
                             <a href="Veiculos.php"><i class="fa fa-fw fa-bars"></i>Listar Veículos</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Cadastrar veículo:
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
						<?php
                            include 'Classes.php';
                            $p = $_POST;

                            $V = new Veiculo($p['placa'],$p['tipo'],$p['data_aq'],$p['descricao'],$p['status']);     

                            include 'class.db.php';
                            $C = new DB();
                            $V->InsereVeiculo($C); 
						?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
