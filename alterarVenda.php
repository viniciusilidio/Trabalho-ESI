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
                            <?php
                                $hiddenvalues = explode ("|",$_POST["codigo"]);
                                $codigo = $hiddenvalues[0];
                                $cpf = $hiddenvalues[1];
                                $id_produto = $hiddenvalues[2];

                                echo "Alterar venda ".$codigo.": ".$cpf." ".$id_produto." ;"
                            ?>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                            <form role='form' action='alteracaoVenda.php' method='post'>

                            <div class='form-group'>
                                <label>CPF do Cliente:</label>
                                <select name="cpf_cliente" class="form-control" required>
                                    <?php
                                        include 'class.db.php';
                                        $C = new DB();
                                        // $query = "SELECT CPF, Nome, Sobrenome FROM Clientes WHERE CPF = '".$cpf."';";

                                        // $results = $C->get_results( $query );
                                        
                                        // echo "<option selected value='".$results[0][CPF]."'>".$results[0][CPF]." - ".$results[0][Nome]." ".$results[0][Sobrenome]."</option>";

                                        $query = "SELECT CPF, Nome, Sobrenome FROM Clientes;";

                                        $results = $C->get_results( $query );
                                        foreach( $results as $row ){
                                            if ($row[CPF] == $cpf) {
                                                echo "<option selected value='".$row[CPF]."'>".$row[CPF]." - ".$row[Nome]." ".$row[Sobrenome]."</option>";
                                            }
                                            else {
                                                echo "<option value='".$row[CPF]."'>".$row[CPF]." - ".$row[Nome]." ".$row[Sobrenome]."</option>";                                            
                                            }
                                        }
                                        
                                        //$C->disconnect();
                                    ?>
                                </select>
                            </div>

                            <div class='form-group'>
                                <label>Produto:</label>
                                <select name="id_produto" class="form-control" required>
                                    <?php
                                        //include 'class.db.php';
                                        //$C = new DB();
                                        
                                        $query = "SELECT Nome, ID, Descricao, Status FROM Produtos;";

                                        $results = $C->get_results( $query );
                                        foreach( $results as $row ){
                                            if ($row[ID] == $id_produto)
                                                echo "<option selected value='".$row[ID]."'>".$row[Nome]." (".$row[Status].")</option>";
                                            else 
                                                if ($row[Status]=='Disponível')
                                                    echo "<option value='".$row[ID]."'>".$row[Nome]." (".$row[Status].")</option>";
                                                else
                                                    echo "<option disabled value='".$row[ID]."'>".$row[Nome]." (".$row[Status].")</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descrições:</label>
                                <textarea name="descricao" class="form-control" placeholder="Ponto de referência, entregar nas mãos de certa pessoa, urgência..."><?php
                                    $query = "SELECT Descricao FROM Vendas WHERE Codigo = '".$codigo."';";

                                    $results = $C->get_results( $query );
                                    echo "".$results[0]["Descricao"]."" ;

                                    $C->disconnect();
                                ?></textarea>
                            </div>
                            <?php
                                echo "<button name='codigo' value='".$codigo."' type='submit' class='btn btn-default'>Enviar</button>";
                            ?>
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
