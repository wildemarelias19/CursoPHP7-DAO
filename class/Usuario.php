<?php 

class Usuario{
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

//fazendo Getters and Setters
	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdsuario($value){
		$this->idusuario = $value;
	}

	public function getDesLogin(){
		return $this->deslogin;
	}

	public function setDesLogin($value){
		$this->deslogin = $value;
	}

	public function getDesSenha(){
		return $this->dessenha;
	}

	public function setDesSenha($value){
		$this->dessenha = $value;
	}

	public function getDtCadastro(){
		return $this->dtcadastro;
	}

	public function setDtCadastro($value){
		$this->dtcadastro = $value;
	}

	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID",array(
			":ID"=>$id
		));

		//carrega os dados do banco pro objeto
		if(count($results)>0){
			$row = $results[0];
			$this->setIdsuario($row['idusuario']);
			$this->setDesLogin($row['deslogin']);
			$this->setDesSenha($row['dessenha']);
			$this->setDtCadastro(new DateTime($row['dtcadastro']));
		}
	}


	//criando lista com todos os usuários que estão na tabela

	public static function getList(){
		$sql = new Sql();
		return $sql -> select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
		
	}

	//para buscar um usuário
	public static function search($login){

		$sql = new Sql();
		return $sql -> select ("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin",array(
			':SEARCH' => "%".$login."%"
		));
	}


	public function login($login,$password){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD",array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		//carrega os dados do banco pro objeto
		if(count($results)>0){
			$row = $results[0];
			$this->setIdsuario($row['idusuario']);
			$this->setDesLogin($row['deslogin']);
			$this->setDesSenha($row['dessenha']);
			$this->setDtCadastro(new DateTime($row['dtcadastro']));
		}else{
			throw new Exception("Login e/ou senha inválidos", 1);
			
		}
	}


	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDesLogin(),
			"dessenha"=>$this->getDesSenha(),
			"dtcadastro"=>$this->getDtCadastro()->format("d/m/Y H:i:s")
		));
	}

}




 ?>