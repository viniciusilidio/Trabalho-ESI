<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon-truck.ico">

    <title>Ranga Aqui!</title>

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="./css/sb-admin.css" rel="stylesheet" type="text/css">
    <!-- Morris Charts CSS -->
    <link href="./css/plugins/morris.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                <a class="navbar-brand" href="index.html">Ranga Aqui!</a>
            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-home"></i> Página Inicial</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#clientes"><i class="fa fa-fw fa-users"></i> Clientes <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="clientes" class="collapse">
                            <li>
                               <a href="cadastrarCliente.html"><i class="fa fa-fw fa-edit"></i>Cadastrar Clientes</a>
                            </li>
                            <li>
                             <a href="Clientes.php"><i class="fa fa-fw fa-bars"></i>Consultar Clientes</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#vendas"><i class="fa fa-fw fa-archive"></i> Vendas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="vendas" class="collapse">
                            <li>
                               <a href="cadastrarVenda.php"><i class="fa fa-fw fa-edit"></i>Nova Venda</a>
                            </li>
                            <li>
                             <a href="Vendas.php"><i class="fa fa-fw fa-bars"></i>Listar Vendas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#produtos"><i class="fa fa-fw fa-truck"></i> Produtos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="produtos" class="collapse">
                            <li>
                               <a href="cadastrarProduto.html"><i class="fa fa-fw fa-edit"></i>Cadastrar Produto</a>
                            </li>
                            <li>
                             <a href="Produtos.php"><i class="fa fa-fw fa-bars"></i>Listar Produtos</a>
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
                            Alterar venda:
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <?php 
                                include 'class.db.php';
                                $C = new DB();

                                $codigo = $_POST['codigo'];

                                $query = "SELECT Codigo, Status, Veiculo, Peso, Dimensao, Data_entrega, Data_envio, Descricao FROM Vendas WHERE Codigo = '".$codigo."';";

                                //echo "QUERY: $query";

                                $results = $C->get_results($query);

                                foreach( $results as $row ){
                                    echo "
                                    <form action='alteracaoVenda.php' method='post'>
                                        <table class='table table-bordered table-hover table-striped'>";
                                        if ($row['Status']=='Entregue')
                                            $tstatus = "panel-green";
                                        if ($row['Status']=='A caminho')
                                            $tstatus = "panel-primary";
                                        if ($row['Status']=='Erro')
                                            $tstatus = "panel-red";
                                        if ($row['Status']=='Em preparação')
                                            $tstatus = "panel-yellow";
                                        echo "
                                        <div class='panel ".$tstatus."'>
                                            <div class='panel-heading'>
                                                <h3 class='panel-title'><strong>Código: </strong>".$row['Codigo']."</h3>
                                            </div>
                                            <div class='phpanel-body'>
                                            <div class='row'>
                                                <div class='col-sm-4'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>Status:</strong>
                                                        <select name='status' class='form-control'>
                                                            <option>".$row['Status']."</option>
                                                            <option>Em preparação</option>
                                                            <option>A caminho</option>
                                                            <option>Entregue</option>
                                                            <option>Erro</option>
                                                        </select></h3>
                                                    </div>
                                                </div>
                                                <div class='col-sm-4'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>Veículo:</strong> <input class='form-control' type='text' name='veiculo' size='10' value=".$row['Veiculo']."></h3>
                                                    </div>
                                                </div>
                                                <div class='col-sm-2'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>Peso:</strong> <input class='form-control' type='text' name='peso' size='10' value=".$row['Peso']."></h3>
                                                    </div>
                                                </div>
                                                <div class='col-sm-2'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>Dimensão:</strong>
                                                            <select name='dimensao' class='form-control'>
                                                                <option>".$row['Dimensao']."</option>
                                                                <option>Carta/Envelope</option>
                                                                <option>XP</option>
                                                                <option>P</option>
                                                                <option>M</option>
                                                                <option>G</option>
                                                                <option>XG</option>
                                                                <option>Tubo</option>
                                                            </select>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-sm-4'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>Data do envio:</strong> ".$row['Data_envio']."</h3>
                                                    </div>
                                                </div>
                                                <div class='col-sm-4'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>Data da entrega:</strong> <input class='form-control' type='text' name='data_entrega' size='10' value=".$row['Data_entrega']."></h3>
                                                    </div>
                                                </div>
                                                <div class='col-sm-4'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>Descrição:</strong> <input class='form-control' type='text' name='descricao' size='10' value=".$row['Descricao']."></h3>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row' align='center'>
                                            <button name='codigo' value='".$row['Codigo']."' type='submit' class='btn btn-primary'>Salvar</button>
                                            </div>
                                            </table>
                                        </form>
                                    </div>";
                                }

                            ?>
                                </tbody>
                            </table>
                        </div>
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
