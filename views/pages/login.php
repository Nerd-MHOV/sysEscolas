<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/css/login.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<title>Login</title>
</head>
<body>
	<?php
		if(isset($_POST['ação'])){
			$user = $_POST['user'];
			$password = $_POST['password'];
			$sql = App\Support\MySql::connect()->prepare("SELECT * FROM `tb_admin.users` WHERE login = ? AND senha = ?");
			$sql->execute(array($user,$password));
			if($sql->rowCount() == 1){
				$info = $sql->fetch();
				//Logado com sucesso...
				$_SESSION['login'] = true;
				$_SESSION['user'] = $user;
				$_SESSION['password'] = $password;
				$_SESSION['cargo'] = $info['nivel'];
				$_SESSION['nome'] = $info['nome'];
				$_SESSION['id_user'] = $info['id'];
				App\Support\Painel::redirect(INCLUDE_PATH);
			}else{
			//Falhou
				echo '<div class="erro-box">Usuario ou senha incorretos!</div>';
			}
		}

	?>
	<div class="box-login">
		<h1><!-- Controle de Lavanderia --><img src="public/img/GrupoperaltasCompleto.png"></h1>
		<form method="post">
			<input type="text" name="user" placeholder="Login..." required>
			<input type="password" name="password" placeholder="Senha.." required>

			<input type="submit" name="ação" value="Login">
		</form>
	</div>
</body>
</html>