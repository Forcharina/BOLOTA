<?php  
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>CADASTRO</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="CSS/estilo.css">
	</head>
	<body>
		<div id="corpo-form">
			<h1>Cadastrar</h1>
			<form method="POST">
				<input type="email" name="email"  placeholder="Usuário" maxlength="50">
				<input type="text" name="nome"  placeholder="Nome Completo" maxlength="50">
				<input type="text" name="telefone"placeholder="Telefone" maxlength="30">
				<input type="password" placeholder="Senha" name="senha" placeholder="password" maxlength="15">
				<input type="password" placeholder="Confirmar Senha" name="confsenha" placeholder="password" maxlength="15">
				<input type="submit" value="CADASTRAR">
			</form>
		</div>
		<?php
			//verificar se clicou no botão
			if (isset($_POST['nome'])) {
				$nome = addslashes($_POST['nome']);
				$telefone = addslashes($_POST['telefone']);
				$email = addslashes($_POST['email']);
				$senha = addslashes($_POST['senha']);
				$confirmarSenha = addslashes($_POST['confsenha']);
				//verificar se está prenchido
				if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($confirmarSenha)) {
					$u->conectar("login","localhost","root","");
					if ($u->$msgErro == "")//vazio esta OK
					{
						if ($senha == $confirmarSenha) {
							if ($u->cadastrar($nome,$telefone,$email,$senha)) {
								echo "Cadastrado com sucesso! Acesse para entrar!";
							}else{
								echo "Email já cadastrado!";
							}
						}else{
							echo "Senha e Confirmar Senha não correposndem!";
						}
					}else{
						echo "Erro: ".$u->msgErro;
					}
				}else{
					echo "Preencha todos os campos!";
				}
			}
		?>
	</body>
</html>