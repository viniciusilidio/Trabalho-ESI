<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

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
                        <a href="javascript:;" data-toggle="collapse" data-target="#produtos"><i class="fa fa-fw fa-cutlery"></i> Produtos <i class="fa fa-fw fa-caret-down"></i></a>
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
                            Alterar produto:
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-10">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tipo</th>
                                        <th>Nome</th>
                                        <th>Status</th>
                                        <th>Descrição</th>
                                        <th>Opção</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        include 'class.db.php';
                                        $C = new DB();

                                        $id = $_POST['id'];

                                        $query = "SELECT ID, Tipo, Nome, Status, Descricao FROM produtos WHERE ID = '".$id."';";

                                        $results = $C->get_results($query);

                                        foreach( $results as $row ){
                                            echo "<form action='alteracaoProduto.php' method='post'>";
                                            if ($row['Status']=='Disponível')
                                                echo "<tr class='success'>";
                                            if ($row['Status']=='Não disponível')
                                                echo "<tr class='danger'>";
                                            echo "<td><input class='form-control' type='text' name='id' size='8' value=".$row['ID']."></td>";
                                            echo "<td><select name='tipo' class='form-control'>
                                                    <option>".$row['Tipo']."</option>
                                                    <option>Pizza</option>
                                                    <option>Lanche</option>
                                                    <option>Comida Japonesa</option>
                                                    <option>Variados</option>
                                                </select></td>";
                                            echo "<td><input class='form-control' type='text' name='nome' size='10' value=".$row['Nome']."></td>";
                                            echo "<td><select name='status' class='form-control'>
                                                    <option>".$row['Status']."</option>
                                                    <option>Disponível</option>
                                                    <option>Não disponível</option>
                                                </select></td>";
                                            echo "<td><input class='form-control' type='text' name='descricao' value=".$row['Descricao']."></td>";
                                            echo "<td><button name='id' value='$id' type='submit' class='btn btn-xs btn-primary'>Salvar</button>
                                            </form></td></tr>";
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
