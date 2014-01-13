<?php
	require_once("./database/conn.php");
	if ($method=="alter") {
		$query = mysql_query("SELECT * FROM empregado WHERE cod_empregado = $id");
		$tupla= mysql_fetch_object($query);
	}
?>
<div class='tabela'>
	<form action="./action.php" method="post">
		<table>
			<tr>
				<td>nome_empregado</td>
				<td><input name="nomeempregado" type="text" <?php if ($method=="alter") echo "value=\"$tupla->nome_empregado\"";?>></td>
			</tr>
			<tr id='par'>
				<td>salario</td>
				<td><input name="salario" type="text" <?php if ($method=="alter") echo "value=\"$tupla->salario\"";?>></td>
			</tr>
			<tr>
				<td>cod_departamento</td>
				<td><select name="coddepartamento">
							<?php
								$query = mysql_query("SELECT * FROM departamento");
								while($tupla= mysql_fetch_object($query))
								{
									echo "\t\t<option value=\"$tupla->cod_departamento\">($tupla->cod_departamento)$tupla->nome_departamento</option>\n";
								}
							?>
						</select></td>
			</tr>
			<tr id='pe'>
				<td><input type="hidden" name="complete" value="1">
					<?php
						if ($method == "insert")
							echo "<input type=\"hidden\" name=\"method\" value=\"insert\">";
						if ($method == "alter")
							{
								echo "<input type=\"hidden\" name=\"method\" value=\"alter\">";
								echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
							}
						?><input type="hidden" name="table" value="empregado"></td>
				<td><input type="submit" value="Envia"></td>
			</tr>
		</table>
	</form>
</div>
