<?php

class Veiculo {
	private $Placa;
	private $Tipo;
	private $Data_aq;
	private $Descricao;
	private $Status;

	public function Veiculo($placa,$tipo,$data_aq,$descricao,$status){
		$this->Placa = $placa;
		$this->Tipo = $tipo;
		$this->Data_aq = $data_aq;
		$this->Descricao = $descricao;
		$this->Status = $status;
	}

	public function AlteraVeiculo($C, $Placa_antiga){
		$query = "UPDATE Veiculos SET Tipo='".$this->Tipo."', Placa='".$this->Placa."', Data_aq='".$this->Data_aq."', Descricao='".$this->Descricao."', Status='".$this->Status."' WHERE Placa = '".$Placa_antiga."';";

		if ($C->query($query))
			echo "<p>$this->Placa atualizado com sucesso!</p>";

		$C->disconnect();
	}

	public function InsereVeiculo($C){
		$query = "INSERT INTO Veiculos (Placa, Tipo, Data_aq, Descricao, Status) VALUES ('".$this->Placa."', '".$this->Tipo."', '".$this->Data_aq."', '".$this->Descricao."','".$this->Status."');";
		
		if ($C->query($query))
            echo "<p>$this->Placa inserido com sucesso!</p>";

        $C->disconnect();
	}

	public function RemoveVeiculo($C,$placa){
		$query = "DELETE FROM Veiculos WHERE Placa = '".$placa."';";

		if ($C->query($query))
			echo "<p>$placa removido com sucesso!</p>";

		$C->disconnect();
	}
}

class Encomenda {
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

	public function Encomenda($cpf_remetente, $cpf_destinatario, $veiculo, $peso, $dimensao, $data_envio, $data_entrega, $status, $descricao) {
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

	public function AlteraEncomenda($C,$Codigo){
		$query = "UPDATE Encomendas SET Veiculo='".$this->Veiculo."', Peso=".$this->Peso.", Dimensao='".$this->Dimensao."', Descricao='".$this->Descricao."', Status='".$this->Status."' WHERE Codigo = ".$Codigo.";";

		if ($C->query($query))
			echo "<p>Encomenda $this->Codigo atualizada com sucesso!</p>";
		
		$C->disconnect();
	}

	public function InsereEncomenda($C){
		$query = "INSERT INTO Encomendas (CPF_Remetente,CPF_Destinatario,Veiculo,Peso,Dimensao,Data_envio, Data_entrega, Status,Descricao) VALUES ('".$this->CPF_Remetente."','".$this->CPF_Destinatario."','".$this->Veiculo."',".$this->Peso.",'".$this->Dimensao."','".$this->Data_envio."','".$this->Data_entrega."','".$this->Status."','".$this->Descricao."');";

		if ($C->query($query))
			echo "<p>Encomenda cadastrada com sucesso!</p>";

		$C->disconnect();
	}

	public function RemoveEncomenda($C, $Codigo){
		$query = "DELETE FROM Encomendas WHERE Codigo = '".$Codigo."';";

		if ($C->query($query))
			echo "<p>Encomenda $Codigo excluída com sucesso!</p>";

		$C->disconnect();
	}
}

class Pessoa {
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

	public function Pessoa($nome, $sobrenome, $rua, $numero, $complemento, $bairro, $cidade, $uf, $cep, $cpf, $telefone) {
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

	public function AlteraPessoa($C, $CPF_Antigo){
		$query = "UPDATE Pessoas SET Nome='".$this->Nome."', Sobrenome='".$this->Sobrenome."', Rua='".$this->Rua."', Numero=".$this->Numero.", Complemento='".$this->Complemento."', Bairro='".$this->Bairro."', Cidade='".$this->Cidade."', UF='".$this->UF."', CEP='".$this->CEP."', CPF='".$this->CPF."', Telefone='".$this->Telefone."'  WHERE CPF = '".$CPF_Antigo."';";

		if ($C->query($query))
			echo "<p>$this->Nome $this->Sobrenome atualizado(a) com sucesso!</p>";

		$C->disconnect();
	}

	public function InserePessoa($C){
		$query = "INSERT INTO Pessoas (Nome,Sobrenome,Rua,Numero,Complemento,Bairro,Cidade,UF,CEP,CPF,Telefone) VALUES ( '".$this->Nome."','".$this->Sobrenome."','".$this->Rua."',".$this->Numero.",'".$this->Complemento."','".$this->Bairro."','".$this->Cidade."','".$this->UF."','".$this->CEP."','".$this->CPF."','".$this->Telefone."');";

		if ($C->query($query))
			echo "<p>$this->Nome $this->Sobrenome cadastrado(a) com sucesso!</p>";

		$C->disconnect();
	}

	public function RemovePessoa($C, $cpf){
		$query = "DELETE FROM Pessoas WHERE CPF = '".$cpf."';";

		if ($C->query($query))
			echo "<p>$cpf removido com sucesso!</p>";

		$C->disconnect();
	}
}
?>
