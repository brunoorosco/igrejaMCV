<?php 

//ARQUIVO DE CONEXÃƒO COM O BANCO DE DADOS
include("../../php/conexao.php");

//FUNÃ‡Ã•ES MODULARES DO SISTEMA
include("../../php/modular.php");


// FUN��O PARA GUARDAR OS DADOS DO NOME DA AMOSTRA E O C�DIGO CORRESPONDENTE NO BANCO DE DADOS

if (isset($_GET['guardarDados'])) {
	
		
	
		//VERIFICANDO SE O MESMO ELEMENTO FOI SELECIONADO
		
		if (isset($_SESSION['CAIXAELEMENTHTML'])) {
		
			//VERIFICANDO SE O ELEMENTO SELECIONADO � DIFERENTE, EM CASO POSITIVO, MANTER O VALOR DA SESSION, SEM MODIFICAR
			if (($_GET['elementoHTML']) != ($_SESSION['CAIXAELEMENTHTML'])) {
				
				//ARMAZENANDO OS DADOS NAS VARI�VEIS DE SESS�O
				$_SESSION['NOMEAMOSTRAANT'] = $_SESSION['NOMEAMOSTRAENT'];
				$_SESSION['NOMEAMOSTRAENT'] = ($_GET['nomeAmostra']);
				$_SESSION['CODAMOSTRAENT'] = ($_GET['codAmostra']);
								
				echo $_SESSION['CAIXAELEMENTHTML'].";".$_SESSION['NOMEAMOSTRAENT'].";".$_SESSION['NOMEAMOSTRAANT'];
				
				$_SESSION['CAIXAELEMENTHTML'] = ($_GET['elementoHTML']);
				
			}
			else {
				
				
				//ARMAZENANDO OS DADOS NAS VARI�VEIS DE SESS�O
				$_SESSION['NOMEAMOSTRAENT'] = ($_GET['nomeAmostra']);
				$_SESSION['CODAMOSTRAENT'] = ($_GET['codAmostra']);
				
				echo $_SESSION['CAIXAELEMENTHTML'].";".$_SESSION['NOMEAMOSTRAENT'];
				
			}
			
		}
		else{
			
			$_SESSION['CAIXAELEMENTHTML'] = ($_GET['elementoHTML']);
			
			//ARMAZENANDO OS DADOS NAS VARI�VEIS DE SESS�O
			$_SESSION['NOMEAMOSTRAENT'] = ($_GET['nomeAmostra']);
			$_SESSION['CODAMOSTRAENT'] = ($_GET['codAmostra']);
		
			echo $_SESSION['CAIXAELEMENTHTML'].";".$_SESSION['NOMEAMOSTRAENT'];
			
		}
	
}

//--------------------------------------------------------------------------------------


//FUN��O PARA SALVAR OS DADOS

if (isset($_GET['salvarDados'])) {
	
	//ARMAZENANDO O C�DIGO DA VARI�VEL
	$codigo = $_SESSION['CODAMOSTRAENT'];
	
	$nomeAmostra = ($_GET['salvarDados']);
	
	//DEIXANDO AS LETRAS EM MA�USCULO
	$nomeAmostra = strtoupper($nomeAmostra);
	
	$_SESSION['NOMEAMOSTRAENT'] = $nomeAmostra;
	
	//ATUALIZANDO O NOME DA AMOSTRA NO BANCO DE DADOS
	$sql = "Update itemensaio set itemensaio.NomeArtigo = '$nomeAmostra' where Codigo = $codigo";
	mysql_query($sql);
	
}

//--------------------------------------------------------------------------------------

?>