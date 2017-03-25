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
                            Vendas:
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
                                
                                $query = "SELECT Codigo, Descricao, Data_pedido, ID_produto, Tipo, Nome_Produto,CPF_Cliente, Nome_Cliente, Sobrenome, Rua, Numero, Complemento, Bairro, Cidade, UF, CEP, Telefone FROM vendas NATURAL JOIN (SELECT CPF CPF_Cliente, Nome Nome_Cliente, Sobrenome, Rua, Numero, Complemento, Bairro, Cidade, UF, CEP, Telefone from clientes) as T1 NATURAL JOIN (SELECT ID ID_produto, Tipo, Nome Nome_produto, preco FROM produtos) as T2";

                                $results = $C->get_results( $query );
                                foreach( $results as $row ){
                                    echo "<table class='table table-bordered table-hover table-striped'>";
                                    echo "
                                    <div class='panel panel-green'>
                                        <div class='panel-heading'>
                                            <h3 class='panel-title'><strong>Código: </strong>".$row['Codigo']."</h3>
                                        </div>
                                        <div class='phpanel-body'>
                                            <div class='row'>
                                                <div class='col-sm-4'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>ID do Produto:</strong> ".$row['ID_produto']."</h3>
                                                    </div>
                                                </div>
                                                <div class='col-sm-4'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>Tipo do Produto:</strong> ".$row['Tipo']."</h3>
                                                    </div>
                                                </div>
                                                <div class='col-sm-4'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>Produto:</strong> ".$row['Nome_produto']."</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-sm-4'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>Data e hora do pedido:</strong> ".$row['Data_pedido']."</h3>
                                                    </div>
                                                </div>
                                                <div class='col-sm-4'>
                                                    <div class='panel-heading'>
                                                        <h3 class='panel-title'><strong>Descrição:</strong> ".$row['Descricao']."</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-sm-9'>
                                                    <div class='panel panel-green'>
                                                        <div class='panel-body'>
                                                            <strong>Remetente:</strong> ".$row['Nome_Cliente']." ".$row['Sobrenome']."<br>
                                                            <strong>CPF: </strong> ".$row['CPF_Cliente']."<br>
                                                            <strong>Endereço: </strong>".$row['Rua'].", ".$row['Numero'].".  Bairro ".$row['Bairro'].".<br>
                                                            <strong>Complemento: </strong>".$row['Complemento']." <br>
                                                            <strong>Cidade: </strong>".$row['Cidade']." - ".$row['UF']."<br>
                                                            <strong>CEP: </strong>".$row['CEP']."<br>
                                                            <strong>Telefone: </strong>".$row['Telefone']."<br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-sm-6' align='right'>
                                                    <form action='alterarVenda.php' method='post'>
                                                        <button name='codigo' value=".$row['Codigo']." type='submit' class='btn btn-primary'>Alterar</button>
                                                    </form>
                                                </div>
                                                <div class='col-sm-6'>
                                                    <form action='removerVenda.php' method='post'>
                                                        <button name='codigo' value=".$row['Codigo']." type='submit' class='btn btn-danger'>Remover</button>
                                                    </form>
                                                    <br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </table>";
                                }
                                
                                $C->disconnect();
                            ?>
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

