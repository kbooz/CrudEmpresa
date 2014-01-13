<?php
	require_once("./database/conn.php");
	if ($method=="alter") {
		$query = mysql_query("SELECT * FROM projeto WHERE cod_projeto = $id AND cod_empregado = $id2");
		$tupla= mysql_fetch_object($query);
	}
?>
<div <div class='tabela'>>
	<form action="./action.php" method="post">
		<table>
			<tr>
				<td>cod_projeto</td>
				<td><select name="codproj">
							<?php
								$query = mysql_query("SELECT * FROM projeto");
								while($tupla= mysql_fetch_object($query))
								{
									echo "\t\t<option value=\"$tupla->cod_projeto\">($tupla->cod_projeto)$tupla->nome_projeto</option>\n";
								}
							?>
						</select></td>
			</tr>
			<tr>
				<td>cod_empregado</td>
				<td><select name="codemp">
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
				<td>bonus</td>
				<td><input name="bonus" type="text" <?php if ($method=="alter") echo "value=\"$tupla->bonus\"";?>></td>
			</tr>
			<tr>
				<td>horas</td>
				<td><input name="horas" type="text" <?php if ($method=="alter") echo "value=\"$tupla->horas\"";?>></td>
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
								echo "<input type=\"hidden\" name=\"id2\" value=\"$id2\">";
							}
						?><input type="hidden" name="table" value="participa"></td>
				<td><input type="submit" value="Envia"></td>
			</tr>
		</table>
	</form>
</div>