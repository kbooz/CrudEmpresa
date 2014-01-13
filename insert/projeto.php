<?php
	require_once("./database/conn.php");
	if ($method=="alter") {
		$query = mysql_query("SELECT * FROM projeto WHERE cod_projeto = $id");
		$tupla= mysql_fetch_object($query);
	}
?>
<div class='tabela'>
	<form action="./action.php" method="post">
		<table>
			<tr>
				<td>nome_projeto</td>
				<td><input name="nomeprojeto" type="text" <?php if ($method=="alter") echo "value=\"$tupla->nome_projeto\"";?>></td>
			</tr>
			<tr>
				<td>cod_chefe</td>
				<td><select name="codlider">
							<option value ="">Sem Líder</option>
							<?php
								$query = mysql_query("SELECT * FROM empregado");
								while($tupla= mysql_fetch_object($query))
								{
									echo "\t\t<option value=\"$tupla->cod_empregado\">($tupla->cod_empregado)$tupla->nome_empregado</option>\n";
								}
							?>
						</select></td>
			</tr>
			<tr>
				<td><input type="hidden" name="complete" value="1">
					<?php
						if ($method == "insert")
							echo "<input type=\"hidden\" name=\"method\" value=\"insert\">";
						if ($method == "alter")
							{
								echo "<input type=\"hidden\" name=\"method\" value=\"alter\">";
								echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
							}
						?><input type="hidden" name="table" value="projeto"></td>
				<td><input type="submit" value="Envia"></td>
			</tr>
		</table>
	</form>
</div>