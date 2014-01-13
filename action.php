<?php include 'template/header.php';?>
<?php
	// Arquivo de conexão
	require_once("database/conn.php");
	$method = $_POST["method"];
	if($method==NULL)
		$method='search';

	// Decide o método
	if($method=="delete")
	{
		$id = $_POST["id"];
		$table = $_POST["table"];

		if($table=="empregado")
		{
			$query = mysql_query("DELETE FROM empregado WHERE cod_empregado=".$id);
			doAction("deletar");
		}

		if($table=="departamento")
		{
			$query = mysql_query("DELETE FROM departamento WHERE cod_departamento=".$id);
			doAction("deletar");
		}

		if($table=="projeto")
		{
			$query = mysql_query("DELETE FROM projeto WHERE cod_projeto=".$id);
			doAction("deletar");
		}

		if($table=="participa")
		{
			$id2 = $_POST["id2"];
			$query = mysql_query("DELETE FROM participa WHERE cod_projeto=$id AND cod_empregado=$id2");
			doAction("deletar");
		}

	}

	if($method=="insert")
	{
		$table = $_POST["table"];
		$complete = $_POST["complete"];

		if($complete == "0")
		{
			if($table=="empregado")
			{
				include 'insert/empregado.php';
				$method = "insert";
			}

			if($table=="departamento")
			{
				include 'insert/departamento.php';
				$method = "insert";
			}

			if($table=="projeto")
			{
				include 'insert/projeto.php';
				$method = "insert";
			}

			if($table=="participa")
			{
				include 'insert/participa.php';
				$method = "insert";
			}

			if($table=="participa2")
			{
				include 'insert/participa2.php';
				$method = "insert";
			}
		}

		if($complete == "1")
		{
			if($table=="empregado")
			{
				$nomeemp = $_POST["nomeempregado"];
				$salario = $_POST["salario"];
				$coddept = $_POST["coddepartamento"];
				$query = mysql_query("INSERT INTO empregado VALUES (DEFAULT,\"$nomeemp\",$salario,$coddept);");
			}
			if($table=="departamento")
			{
				$nomedept = $_POST["nomedepartamento"];
				$codchefe = $_POST["codchefe"];
				if ($codchefe=="") {
					$codchefe='NULL';
				}
				$query = mysql_query("INSERT INTO departamento VALUES (DEFAULT,\"$nomedept\",$codchefe);");
			}
			if($table=="projeto")
			{
				$nomeproj = $_POST["nomeprojeto"];
				$codlider = $_POST["codlider"];
				if ($codlider=="") {
					$codlider='NULL';
				}
				$query = mysql_query("INSERT INTO projeto VALUES (DEFAULT,\"$nomeproj\",$codlider);");
			}
			if($table=="participa")
			{
				$codproj = $_POST["codproj"];
				$codemp = $_POST["codemp"];
				$horas = $_POST["horas"];
				$bonus= $_POST["bonus"];
				$query = mysql_query("INSERT INTO participa VALUES ($codproj,$codemp,$bonus,$horas);");
			}
			doAction("inserir");
		}
	}

	if($method=="alter")
	{
		$table = $_POST["table"];
		$id = $_POST["id"];
		$complete = $_POST["complete"];
		
		if($complete == "0")
		{
			if($table=="empregado")
			{
				include 'insert/empregado.php';
				$method = "alter";
			}
			if($table=="departamento")
			{
				include 'insert/departamento.php';
				$method = "alter";
			}
			if($table=="projeto")
			{
				include 'insert/projeto.php';
				$method = "alter";
			}
			if($table=="participa")
			{
				$id2 = $_POST["id2"];
				include 'insert/projeto.php';
				$method = "alter";
			}
		}

		if($complete == "1")
		{
			if($table=="empregado")
			{
				$nomeemp = $_POST["nomeempregado"];
				$salario = $_POST["salario"];
				$coddept = $_POST["coddepartamento"];
				$query = mysql_query("UPDATE empregado SET nome_empregado = '$nomeemp', salario = $salario, cod_departamento = $coddept WHERE cod_empregado = $id;");
			}
			if($table=="departamento")
			{
				$nomedept = $_POST["nomedepartamento"];
				$codchefe = $_POST["codchefe"];
				if ($codchefe=="") {
					$codchefe='NULL';
				}
				$query = mysql_query("UPDATE departamento SET nome_departamento = '$nomedept', cod_chefe = $codchefe WHERE cod_departamento = $id;");
			}
			if($table=="projeto")
			{
				$nomeproj = $_POST["nomeprojeto"];
				$codlider = $_POST["codlider"];
				if ($codlider=="") {
					$codlider='NULL';
				}
				$query = mysql_query("UPDATE projeto SET nome_projeto = '$nomeproj', cod_lider = $codlider WHERE cod_projeto = $id;");
			}
			if($table=="participa")
			{
				$codproj = $_POST["codproj"];
				$codemp = $_POST["codemp"];
				$horas = $_POST["horas"];
				$bonus= $_POST["bonus"];
				$query = mysql_query("UPDATE participa SET cod_projeto = $codproj, cod_empregado = $codemp,bonus = $bonus,horas = $horas WHERE cod_projeto = $id AND cod_empregado = $id2;");
			}
			doAction("alterar");
		}
	}

	if($method=="search")
	{
		if(($emp=$_REQUEST['codemp']))
		{
			include 'search/empregado.php';
		}
	}

	function doAction($action)
	{
		global $query;
		// Se realizou com sucesso
		if ($query) {
			echo "\n\t\t";
			echo "A ação \"$action\" foi realizada com sucesso";
			echo "\n";
		} 
		// Se houver algum erro
		else {
			echo mysql_error();
			echo "\n<br>\t\t";
			echo "Não foi possível realizar a ação \"$action\".";
			echo "\n";
		}
	}
?>
		<br>
		<br>
		<div class="button">
			<a href="index.php">Voltar</a>
		</div>
<?php include 'template/foot.php';?>