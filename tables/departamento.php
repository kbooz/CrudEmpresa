<?php require_once("./database/conn.php");?>
<div class="tabela" >
			<table width="500px" >
				<tr>
					<td id="topo" colspan="4">Departamento</td>
				</tr>
				<tr id="subtopo">
					<td>cod_departamento</td>
					<td>nome_departamento</td>
					<td>cod_chefe</td>
					<td>Ação</td>
				</tr>
<?php	
	$count=1;
	$query = mysql_query("SELECT * FROM departamento ORDER BY cod_departamento ASC");

	while($tupla= mysql_fetch_object($query)) {
		if($count%2==0)
			echo "\n\t\t\t\t<tr id=\"par\">\n";
		else
			echo "\t\t\t\t<tr>\n";
		echo "\t\t\t\t\t<form action=\"./action.php\" method=\"post\">\n";
		echo "\t\t\t\t\t\t<td>$tupla->cod_departamento</td>\n";
		echo "\t\t\t\t\t\t<td>$tupla->nome_departamento</td>\n";
		if ($tupla->cod_chefe== NULL) {
			echo "\t\t\t\t\t\t<td>Sem chefe</td>\n";
		}
		else
		{
			echo "\t\t\t\t\t\t<td>$tupla->cod_chefe</td>\n";
		}
		echo "\t\t\t\t\t\t<input type=\"hidden\" name=\"id\" value=\"$tupla->cod_departamento\">\n";
		echo "\t\t\t\t\t\t<input type=\"hidden\" name=\"table\" value=\"departamento\">\n";
		echo "\t\t\t\t\t\t<input type=\"hidden\" name=\"complete\" value=\"0\">\n";
		echo "\t\t\t\t\t\t<td><input type=\"image\" src=\"img/del.png\" name=\"method\" value=\"delete\" >\n";
		echo "\t\t\t\t\t\t\t<input type=\"image\" src=\"img/edit.png\" name=\"method\" value=\"alter\" ></td>\n";
		echo "\t\t\t\t\t</form>\n";
		echo "\t\t\t\t</tr>\n";
		$count++;
	}
	echo "\t\t\t\t<tr>\n";
	echo "\t\t\t\t\t<form action=\"./action.php\" method=\"post\">\n";
	echo "\t\t\t\t\t\t<input type=\"hidden\" name=\"table\" value=\"departamento\">\n";
	echo "\t\t\t\t\t\t<input type=\"hidden\" name=\"complete\" value=\"0\">\n";
	echo "\t\t\t\t\t\t<td id=\"pe\" colspan=\"5\" align=\"right\"><input type=\"submit\" name=\"method\" value=\"insert\"></td>\n";
	echo "\t\t\t\t\t</form>\n";
	echo "\t\t\t\t</tr>\n";
?>
			</table>
		</div>
