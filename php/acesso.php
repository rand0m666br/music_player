<?php
require("conexao.php");

class Pessoa
{
    public $email;
    public $nome;
    public $desc;
    protected $con = null;

    public function __construct($conexao)
    {
        $this->con = $conexao;
    }
}

class Verifica extends Pessoa
{
    // Função pra validar se já existe um usuário com o mesmo nome ou email no bd
    public function verificaUser($email, $nome, $tabela, $info)
    {
        $conexao = $this->con->conectar();
        $sql = "SELECT COUNT(*) FROM $tabela WHERE  $info = ? OR nome = ?";
        $query = $conexao->prepare($sql);
        $query->execute(array($email, $nome));
        return $query->fetchColumn() > 0;
    }
}

class Usuario extends Pessoa
{
    private $senha;
    private $senhaConfirma;

    // Atribuir valor a senha
    public function setSenha($senha, $senhaConfirma)
    {
        $this->senha = $senha;
        $this->senhaConfirma = $senhaConfirma;
    }

    // Retornar valor da senha
    public function getSenha()
    {
        return $this->senha;
    }

    public function getConfirma()
    {
        return $this->senhaConfirma;
    }

    // Função de cadastro
    public function cadastro()
    {
        $tabela = 'usuarios';
        $info = 'email';
        $verifica = new Verifica($this->con);
        $verifica->verificaUser($this->email, $this->nome, $tabela, $info);
        if ($verifica->verificaUser($this->email, $this->nome, $tabela, $info)) {
            session_start();
            $_SESSION["msg"] = "Erro: o usuário já existe!";
            header("location: ../login.php");
            // var_dump($this->nome, $this->email);
        } else {
            $conexao = $this->con->conectar();
            $sql = "INSERT INTO `usuarios`(`nome`, `email`, `senha`) VALUES (?, ?, ?)";
            $query = $conexao->prepare($sql);
            $cripto = password_hash($this->senha, PASSWORD_ARGON2ID); // Criptografar a senha do user
            if ($this->senha == $this->senhaConfirma) {
                $query->execute(array($this->nome, $this->email, $cripto));

                session_start();
                $_SESSION["msg"] = "Usuário cadastrado com sucesso!";
                header("location: ../login.php");
            }
        }
    }

    // Função de login
    public function login()
    {
        $conexao = $this->con->conectar();
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $query = $conexao->prepare($sql);
        $query->execute(array($this->email));
        if ($query->rowCount()) {
            $dados = $query->fetch(PDO::FETCH_ASSOC);
            if (password_verify($this->senha, $dados["senha"])) {
                // Caso a senha confira
                session_start();
                $_SESSION["usuario"] = array($dados["nome"], $dados["id_usuario"], $dados["nivel"]);
                header("location: ../index.php");
            } else {
                session_start();
                $_SESSION["msg"] = "Usuário ou senha inválido";
                header("location: ../login.php");
            }
        } else {
            session_start();
            $_SESSION["msg"] = "Usuário ou senha inválido";
            header("location: ../login.php");
        }
    }
}

class Artista extends Pessoa
{
    public $imagem;
    public $imgSize;
    public $imgName;

    public function cadArtista()
    {
        session_start();
        $tabela = "artistas";
        $info = "descricao";
        $link = 0;
        $verifica = new Verifica($this->con);
        $verifica->verificaUser($this->desc, $this->nome, $tabela, $info);
        if ($verifica->verificaUser($this->desc, $this->nome, $tabela, $info)) {
            echo "<script>alert('O artista já existe!')</script>";
        } else {
            $dir = "../data/imgs/" . $this->imagem;
            $conexao = $this->con->conectar();
            $sql = "INSERT INTO `artistas`(`nome`, `descricao`, `link_foto`) VALUES (?, ?, ?)";
            $query = $conexao->prepare($sql);
            $query->execute(array($this->nome, $this->desc, $this->imagem));
            move_uploaded_file($this->imgName, $dir);
            header("location: ../index.php");
        }
    }
}

// Cadastro de album foi removido para simplificar o código
/*
class Album extends Pessoa {
    public $artista;

    public function cadAlbum() {
        $conexao = $this->con->conectar();
        $link = 0;
        $data = 2008;
        $sql = "INSERT INTO `albuns`(`id_artista`, `nome`, `link_capa`, `ano_lancamento`) VALUES (?, ?, ?, ?)";
        $query = $conexao->prepare($sql);
        $query->execute(array($this->artista, $this->nome, $link, $data));
        header("location: ../index.php");
    }
}*/

class Musica extends Pessoa
{
    // public $album;
    public $artista;
    public $musica;
    public $tamanho;
    public $tmp_nome;

    public function cadMusica()
    {
        $conexao = $this->con->conectar();
        $pasta = "../data/" . $this->musica;
        $link = 0;
        $sql = "INSERT INTO `musicas`(`nome`, `link_arquivo`, `compositor`, `id_artista`) VALUES (?, ?, ?, ?)";
        $query = $conexao->prepare($sql);
        $query->execute(array($this->nome, $this->musica, $link, $this->artista));
        move_uploaded_file($this->tmp_nome, $pasta);
        header("location: ../index.php");
    }
}

$conexao = new Conexao();
?>
