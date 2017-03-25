<?php

class Produto {
	private $ID;
	private $Tipo;
	private $Nome;
	private $Descricao;
	private $Status;

	public function Produto($id,$tipo,$nome,$descricao,$status){
		$this->ID = $id;
		$this->Tipo = $tipo;
		$this->Nome = $nome;
		$this->Descricao = $descricao;
		$this->Status = $status;
	}

	public function AlterarProduto($C, $ID){
		$query = "UPDATE Produtos SET Tipo='".$this->Tipo."', ID='".$this->ID."', Nome='".$this->Nome."', Descricao='".$this->Descricao."', Status='".$this->Status."' WHERE ID = '".$ID."';";

		if ($C->query($query))
			echo "<p>$this->ID atualizado com sucesso!</p>";

		$C->disconnect();
	}

	public function InsereProduto($C){
		$query = "INSERT INTO Produtos (ID, Tipo, Nome, Descricao, Status) VALUES ('".$this->ID."', '".$this->Tipo."', '".$this->Nome."', '".$this->Descricao."','".$this->Status."');";
		
		if ($C->query($query))
            echo "<p>$this->ID inserido com sucesso!</p>";

        $C->disconnect();
	}

	public function RemoveProduto($C,$id){
		$query = "DELETE FROM Produtos WHERE ID = '".$id."';";

		if ($C->query($query))
			echo "<p>$id removido com sucesso!</p>";

		$C->disconnect();
	}
}

class Venda {
	private $CPF_Cliente;
	private $ID_Produto;
	private $Data_pedido;
	private $Descricao;
	private $Codigo;

	public function Venda($cpf_cliente, $id_produto, $data_pedido, $descricao) {
		$this->CPF_Cliente = $cpf_cliente;
		$this->ID_Produto = $id_produto;
		$this->Data_pedido = $data_pedido;
		$this->Descricao = $descricao;
	}

	public function AlteraVenda($C,$Codigo){
		$query = "UPDATE Vendas SET ID_produto='".$this->ID_Produto."',Descricao='".$this->Descricao."' WHERE Codigo = ".$Codigo.";";

		if ($C->query($query))
			echo "<p>Venda $this->Codigo atualizada com sucesso!</p>";
		
		$C->disconnect();
	}

	public function InsereVenda($C){
		$query = "INSERT INTO Vendas (CPF_Cliente,ID_produto,Descricao) VALUES ('".$this->CPF_Cliente."','".$this->ID_Produto."','".$this->Descricao."');";

		if ($C->query($query))
			echo "<p>Venda cadastrada com sucesso!</p>";

		$C->disconnect();
	}

	public function RemoveVenda($C, $Codigo){
		$query = "DELETE FROM Vendas WHERE Codigo = '".$Codigo."';";

		if ($C->query($query))
			echo "<p>Venda $Codigo excluída com sucesso!</p>";

		$C->disconnect();
	}
}

class Cliente {
	private $Nome;
	private $Sobrenome;
	private $Rua;
	private $Numero;
	private $Complemento;
	private $Bairro;
	private $Cidade;
	private $UF;
	private $CEP;
	private $CPF;
	private $Telefone;

	public function Cliente($nome, $sobrenome, $rua, $numero, $complemento, $bairro, $cidade, $uf, $cep, $cpf, $telefone) {
		$this->Nome = $nome;
		$this->Sobrenome = $sobrenome;
		$this->Rua = $rua;
		$this->Numero = $numero;
		$this->Complemento = $complemento;
		$this->Bairro = $bairro;
		$this->Cidade = $cidade;
		$this->UF = $uf;
		$this->CEP = $cep;
		$this->CPF = $cpf;
		$this->Telefone = $telefone;
	}

	public function AlteraCliente($C, $CPF_Antigo){
		$query = "UPDATE Clientes SET Nome='".$this->Nome."', Sobrenome='".$this->Sobrenome."', Rua='".$this->Rua."', Numero=".$this->Numero.", Complemento='".$this->Complemento."', Bairro='".$this->Bairro."', Cidade='".$this->Cidade."', UF='".$this->UF."', CEP='".$this->CEP."', CPF='".$this->CPF."', Telefone='".$this->Telefone."'  WHERE CPF = '".$CPF_Antigo."';";

		if ($C->query($query))
			echo "<p>$this->Nome $this->Sobrenome atualizado(a) com sucesso!</p>";

		$C->disconnect();
	}

	public function InsereCliente($C){
		$query = "INSERT INTO Clientes (Nome,Sobrenome,Rua,Numero,Complemento,Bairro,Cidade,UF,CEP,CPF,Telefone) VALUES ( '".$this->Nome."','".$this->Sobrenome."','".$this->Rua."',".$this->Numero.",'".$this->Complemento."','".$this->Bairro."','".$this->Cidade."','".$this->UF."','".$this->CEP."','".$this->CPF."','".$this->Telefone."');";

		if ($C->query($query))
			echo "<p>$this->Nome $this->Sobrenome cadastrado(a) com sucesso!</p>";

		$C->disconnect();
	}

	public function RemoveCliente($C, $cpf){
		$query = "DELETE FROM Clientes WHERE CPF = '".$cpf."';";

		if ($C->query($query))
			echo "<p>$cpf removido com sucesso!</p>";

		$C->disconnect();
	}
}
?>
