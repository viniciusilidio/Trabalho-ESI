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
	private $CPF_Remetente;
	private $CPF_Destinatario;
	private $Veiculo;
	private $Peso;
	private $Dimensao;
	private $Data_envio;
	private $Data_entrega;
	private $Status;
	private $Descricao;
	private $Codigo;

	public function Venda($cpf_remetente, $cpf_destinatario, $veiculo, $peso, $dimensao, $data_envio, $data_entrega, $status, $descricao) {
		$this->CPF_Remetente = $cpf_remetente;
		$this->CPF_Destinatario = $cpf_destinatario;
		$this->Veiculo = $veiculo;
		$this->Peso = $peso;
		$this->Dimensao = $dimensao;
		$this->Data_envio = $data_envio;
		$this->Data_entrega = $data_entrega;
		$this->Status = $status;
		$this->Descricao = $descricao;
	}

	public function AlteraVenda($C,$Codigo){
		$query = "UPDATE Vendas SET Veiculo='".$this->Veiculo."', Peso=".$this->Peso.", Dimensao='".$this->Dimensao."', Descricao='".$this->Descricao."', Status='".$this->Status."' WHERE Codigo = ".$Codigo.";";

		if ($C->query($query))
			echo "<p>Venda $this->Codigo atualizada com sucesso!</p>";
		
		$C->disconnect();
	}

	public function InsereVenda($C){
		$query = "INSERT INTO Vendas (CPF_Remetente,CPF_Destinatario,Veiculo,Peso,Dimensao,Data_envio, Data_entrega, Status,Descricao) VALUES ('".$this->CPF_Remetente."','".$this->CPF_Destinatario."','".$this->Veiculo."',".$this->Peso.",'".$this->Dimensao."','".$this->Data_envio."','".$this->Data_entrega."','".$this->Status."','".$this->Descricao."');";

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
