<?php
	require_once("./database/conn.php");
	$query = mysql_query("SELECT * FROM empregado WHERE cod_empregado = $emp");
	$tupla= mysql_fetch_object($query);
?>
<div class='tabela'>
	<form action="./action.php" method="post">
		<table>
			<tr>
				<td id="topo" colspan='2'>Projetos do Empregado</td>
			</tr>
			<tr>
				<td>nome_empregado</td>
				<td><?php echo "$tupla->nome_empregado";?></td>
			</tr>
			<tr id='par'>
				<td>salario</td>
				<td><?php echo "$tupla->salario";?></td>
			</tr>
			<tr>
				<td colspan='2'><b>Projetos</b></td>
			</tr>
			<tr>
				<td colspan='2' id='par'>
					<?php
						$query = mysql_query("SELECT * FROM participa WHERE cod_empregado = $emp");
						while ($tupla = mysql_fetch_object($query)) {
							echo "<form action='./action' method='post' >\n";
							echo "\t\t\t\t\t\t<input type='hidden' name='id' value='$tupla->cod_projeto'>\n";
							echo "\t\t\t\t\t\t<input type='hidden' name='id2' value='$emp'>\n";
							$name = mysql_fetch_object(mysql_query("SELECT * FROM projeto WHERE cod_projeto = $tupla->cod_projeto"));
							echo "\t\t\t\t\t\t<input type='hidden' name='table' value='participa'>\n";
							echo "\t\t\t\t\t\t($name->cod_projeto)$name->nome_projeto";
							echo " <input type=\"image\" src=\"img/del.png\" name=\"method\" value=\"delete\" >\n";
							echo "\t\t\t\t\t</form>\n";
						}
					?>
				</td>
			</tr>
			<tr id="pe">
				<td colspan='2'>
					<for
				</td>
			</tr>
		</table>
	</form>
</div>
