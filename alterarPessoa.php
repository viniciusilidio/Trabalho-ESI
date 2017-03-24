<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon-truck.ico">

    <title>Transportadora Transportadora</title>

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
                <a class="navbar-brand" href="index.html">Transportadora Transportadora</a>
            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-home"></i> Página Inicial</a>
                    </li>
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#pessoas"><i class="fa fa-fw fa-users"></i> Pessoas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="pessoas" class="collapse">
                            <li>
                               <a href="cadastrarPessoa.html"><i class="fa fa-fw fa-edit"></i>Cadastrar Pessoas</a>
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
                               <a href="cadastrarEncomenda.php"><i class="fa fa-fw fa-edit"></i>Nova Encomenda</a>
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
                            Alterar pessoa:
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
                                        <th>Nome</th>
                                        <th>Sobrenome</th>
                                        <th>Rua</th>
                                        <th>Número</th>
                                        <th>Complemento</th>
                                        <th>Bairro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        include 'class.db.php';
                                        $C = new DB();

                                        $cpf = $_POST["cpf"];

                                        $query = "SELECT Nome,Sobrenome,Rua,Numero,Complemento,Bairro,Cidade,UF,CEP,CPF,Telefone FROM Pessoas WHERE CPF =  '".$cpf."';";

                                        //echo "QUERYALTERARPESSOA: $query";

                                        $results = $C->get_results($query);

                                        foreach( $results as $row ){
                                            $CPF_Antigo = $row['CPF'];
                                            echo "<form action='alteracaoPessoa.php' method='post'>";
                                            echo "<tr>";
                                            echo "<td><input class='form-control' type='text' name='nome' value=".$row['Nome']."></td>";
                                            echo "<td><input class='form-control' type='text' name='sobrenome' value=".$row['Sobrenome']."></td>";
                                            echo "<td><input class='form-control' type='text' name='rua' value=".$row['Rua']."></td>";
                                            echo "<td><input pattern='[0-9]+$' class='form-control' type='text' name='numero' size='4' value=".$row['Numero']."></td>";
                                            echo "<td><input class='form-control' type='text' name='complemento' value=".$row['Complemento']."></td>";
                                            echo "<td><input class='form-control' type='text' name='bairro' value=".$row['Bairro']."></td>";
                                            echo "</tr>";
                                            echo "<tr>
                                                <th>Cidade</th>
                                                <th width='8%'>UF</th>
                                                <th>CEP</th>
                                                <th>CPF</th>
                                                <th>Telefone</th>
                                                <th>Opção</th>
                                            </tr>";
                                            echo "<tr>";
                                            echo "<td><input class='form-control' type='text' name='cidade' value=".$row['Cidade']."></td>";
                                            echo "<td><select name='uf' class='form-control'>
                                                    <option>".$row['UF']."</option>
                                                    <option>MG</option>
                                                    <option>SP</option>
                                                    <option>RJ</option>
                                                    <option>ES</option>
                                                    <option>AC</option>
                                                </select></td>";
                                            echo "<td><input pattern='[0-9]{5}\-[0-9]{3}' class='form-control' type='text' name='cep' value=".$row['CEP']."></td>";
                                            echo "<td><input pattern='[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}' class='form-control' type='text' name='cpfnovo' value=".$row['CPF']."></td>";
                                            echo "<td><input pattern='\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$' class='form-control' type='text' name='telefone' value=".$row['Telefone']."></td>";
                
                                            echo "<td><button name='cpfantigo' value='$CPF_Antigo' type='submit' class='btn btn-xs btn-primary'>Salvar</button>
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
