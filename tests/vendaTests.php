<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers Email
 */
final class EmailTest extends TestCase
{
    public function testNovoProduto()
    {   
        $produto = new Produto("50","Pizza","TESTE","Teste","Disponível");
        $this->assertInstanceOf(
            Produto::class,
            $produto
        );
    }

    public function testNovoProdutoBD()
    {   
        $produto = new Produto("582","Pizza","TESTE","Teste","Disponível");

        include 'tests/class.db.php';
		$C = new DB();

        $produto->InsereProduto($C);

        $query = "SELECT ID, Tipo, Nome, Status, Descricao FROM produtos WHERE ID = '582';";
        $results = $C->get_results($query);

        $C->disconnect();

        $this->assertEquals('582',$results[0][ID]);
    }

}

?>