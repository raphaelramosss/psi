
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Requisição de senha</title>
</head>
<body>
	<style>
	*{
		font-family:Arial;	
	}

	.title{
		color: #1c1c1c;
	}

	.header_box{
		padding: 1em;
		color: white;

	}

	.box_message{
		border-left:4px solid #1c1c1c;
		padding:2em;
	}

	.acces_code{
		background-color: #1dd1a4;
		padding:.5em;
		color: white;
		font-weight:bold;
	}
	</style>
	<div class="box_message">
		<div class="header_box">
			<h1 class="title">Olá, <?=$usuario[0]->username?></h1>
		</div>
		<div class="body_box">
			<p>Vimos que você solicitou uma alteração de senha.</p>
			<p>Seu código de ativação é: </p>
			<span class="acces_code"><?=$code_access?></span>
      	</div>
      	<footer>
			<p>Atenciosamente, <br> Equipe do sistema Psi (Prontuários Eletrônicos em um Sistema Inteligente)</p>  
		</footer>
	</div>
</body>
</html>