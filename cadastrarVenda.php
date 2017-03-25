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
                            Nova encomenda:
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                            <form role='form' action='cadastro_Venda.php' method='post'>

                            <div class='form-group'>
                                <label>CPF do remetente:</label>
                                <select name="cpf_remetente" class="form-control" required>
                                    <option disabled selected value="">Remetente</option>
                                    <?php
                                        include 'class.db.php';
                                        $C = new DB();
                                        $query = "SELECT CPF, Nome, Sobrenome FROM Clientes;";

                                        $results = $C->get_results( $query );
                                        foreach( $results as $row ){
                                            echo "<option value='".$row[CPF]."'>".$row[CPF]." - ".$row[Nome]." ".$row[Sobrenome]."</option>";
                                        }
                                        
                                        //$C->disconnect();
                                    ?>
                                </select>
                            </div>

                            <div class='form-group'>
                                <label>CPF do destinatário:</label>
                                <select name="cpf_destinatario" class="form-control" required>
                                    <option disabled selected value="">Destinatário</option>
                                    <?php
                                        //include 'class.db.php';
                                        //$C = new DB();
                                        $query = "SELECT CPF, Nome, Sobrenome FROM Clientes;";

                                        $results = $C->get_results( $query );
                                        foreach( $results as $row ){
                                            echo "<option value='".$row[CPF]."'>".$row[CPF]." - ".$row[Nome]." ".$row[Sobrenome]."</option>";
                                        }
                                        
                                        //$C->disconnect();
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Peso:</label>
                                <input name="peso" class="form-control" placeholder="Peso" required>
                                <p class="help-block">Em quilogramas (15.20 kg)</p>
                            </div>

                            <div class="form-group">
                                <label>Dimensão:</label>
                                <select name="dimensao" class="form-control">
                                    <option disabled selected>Selecione</option>
                                    <option value="Carta/Envelope">Carta/Envelope</option>
                                    <option value="XP">XP</option>
                                    <option value="P">P</option>
                                    <option value="M">M</option>
                                    <option value="G">G</option>
                                    <option value="XG">XG</option>
                                    <option value="Tubo">Tubo</option>
                                </select>
                            </div>

                            <div class='form-group'>
                                <label>Veículo:</label>
                                <select name="veiculo" class="form-control" required>
                                    <option disabled selected value="">Veículos disponíveis</option>
                                    <?php
                                        //include 'class.db.php';
                                        //$C = new DB();
                                        $query = "SELECT Placa, Descricao, Status FROM Veiculos;";

                                        $results = $C->get_results( $query );
                                        foreach( $results as $row ){
                                            if ($row[Status]=='Livre')
                                                echo "<option value='".$row[Placa]."'>".$row[Placa]." - ".$row[Descricao]."</option>";
                                            else
                                                echo "<option disabled value='".$row[Placa]."'>".$row[Placa]." - ".$row[Descricao]." (".$row[Status].")</option>";
                                        }
                                        
                                        $C->disconnect();
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Data de envio:</label>
                                <input name="data_envio" class="form-control" placeholder="Data de envio">
                                <p class="help-block">Ex: dd/mm/aaaa</p>
                            </div>

                            <div class="form-group">
                                <label>Data de entrega:</label>
                                <input name="data_entrega" class="form-control" placeholder="Data de entrega">
                                <p class="help-block">Ex: dd/mm/aaaa</p>
                            </div>

                            <div class="form-group">
                                <label>Status:</label>
                                <select name="status" class="form-control">
                                    <option disabled selected>Selecione</option>
                                    <option>Em preparação</option>
                                    <option>A caminho</option>
                                    <option>Entregue</option>
                                    <option>Erro</option>
                                </select>
                            </div>

                            <!--<div class="form-group">
                                <label>Static Control</label>
                                <p class="form-control-static">email@example.com</p>
                            </div>-->


                            <div class="form-group">
                                <label>Observações:</label>
                                <textarea name="observacoes" class="form-control" rows="3" placeholder="Ponto de referência, entregar nas mãos de certa pessoa, urgência..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-default">Enviar</button>
                            <button type="reset" class="btn btn-default">Limpar</button>
                        </form>

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
