<?php

class UsuarioDao {

    private $p;

    function __construct() {
        $this->p = new Conexao();
    }

    function autenticaUsuario($usuario, $senha) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM usuario WHERE usuario = ? AND senha = ? AND estado = '1' ");
            $stmt->bindValue(1, $usuario);
            $stmt->bindValue(2, $senha);

            $rs = 0;
            if ($stmt->execute() > 0) {
                $rs = 1;
            }

            $this->p = null;

            return $rs;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function getUsuario($id) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM usuario WHERE idusuario = ?");
            $stmt->bindValue(1, $id);

            $u = new Usuario();
            foreach ($stmt as $row) {
                $u->setAllAtributes($row['idusuario'], $row['nome'], $row['senha'], $row['tipo'], $row['estado']);
            }

            $this->p = null;

            return $u;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

}
