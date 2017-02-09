<?php

class OptionConfigDao {

    // ira receber uma conexao
    private $p = null;

    // construtor
    public function OptionConfigDao() {
        $this->p = new Conexao();
    }

    public function addOptionConfig(OptionConfig $op) {
        try {
            $stmt = $this->p->prepare("INSERT INTO `options_config` (`idoptions_config`, `option_nome`, `option_valor`, `autoload`) VALUES (NULL, ?, ?, ?)");
            $stmt->bindValue(1, $op->getOption_nome());
            $stmt->bindValue(2, $op->getOption_valor());
            $stmt->bindValue(3, $op->getAutoload());

            // executo a query preparada
            $stmt->execute();

            // fecho a conexao
            $this->p = null;

            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function editOptionConfig($nome, $valor) {
        try {
            $stmt = $this->p->prepare("UPDATE `options_config` SET `option_valor` = ? where `option_nome` LIKE ?");
            $stmt->bindValue(1, $valor);
            $stmt->bindValue(2, $nome);

            // executo a query preparada
            $stmt->execute();

            // fecho a conexao
            $this->p = null;

            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function getOptionConfig() {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `options_config`");
            $stmt->execute();
            
            $rs = array();
            foreach ($stmt as $row) {
                $rs[$row['option_nome']] = $row['option_valor'];
            }
            
            // fecho a conexao
            $this->p = null;

            //retorna categoria
            return $rs;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function verificaOptionConfig($option_nome) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `options_config` WHERE `option_nome` LIKE ? ");
            $stmt->bindValue(1, $option_nome);

            $stmt->execute();

            $rs = 0;
            foreach ($stmt as $row) {
                $rs++;
            }

            // fecho a conexao
            $this->p = null;

            //retorna categoria
            return $rs;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

}

?>
