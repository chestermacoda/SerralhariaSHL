<?php

class Secretaria{
        private $pdo;
        
        public function __construct($dbname,$host,$usuario,$senha){
            try {
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$usuario,$senha);   
            } catch(PDOException $e) {
                echo "Erro com Base de dados" .$e->getMessage();
            }catch(Exception $e){
                echo "Erro na conexao a Base de dados" .$e->getMessage();
            }
        }
        public function user($id){
            $cmd = $this->pdo->prepare("SELECT * FROM usuarios where id = :n");
            $cmd->bindValue(":n",$id);
            $cmd->execute();
            $dados = $cmd->fetch();
            return $dados;
        }

        public function FuncioInfo($id){
            $cmd = $this->pdo->prepare("SELECT * FROM funcionarios where id = :n");
            $cmd->bindValue(":n",$id);
            $cmd->execute();
            $dados = $cmd->fetch();
            return $dados;
        }

        public function FuncioPre($id){
            $cmd = $this->pdo->prepare("SELECT * FROM presenca where id = :id");
            $cmd->bindValue(":id",$id);
            $cmd->execute();
            $dados = $cmd->fetch();
            return $dados;
        }
        public function PreseEntrada(){
            $cmd = $this->pdo->prepare("SELECT * FROM presenca where Entrada != ''");
            $cmd->execute();
            $dados = $cmd->fetchAll();
            return $dados;
        }

        public function SaidaAutomatica(){

            $data = date('Y-m-d');
            $cmd =  $this->pdo->prepare("SELECT * FROM presenca where data != '$data' and Entrada != '' and HorasExtras = ''");
            $cmd->execute();
            $dados = $cmd->fetchAll();

            if ($cmd->rowCount() > 0) {
                foreach ($dados as $d) {
                    $id = $d['id'];
                    $presenca =  '17:04:30';
                    $cmd = $this->pdo->query("UPDATE presenca SET Saida = '$presenca' where id = '$id'");
                }
            }

        }
        
        public function StatusFaltou(){

            $data = date('Y-m-d');
            $cmd =  $this->pdo->prepare("SELECT * FROM presenca where data != '$data' and Entrada = '' and Saida = '' ");
            $cmd->execute();
            $dados = $cmd->fetchAll();

            if ($cmd->rowCount() > 0) {
                foreach ($dados as $d) {
                    $id = $d['id'];
                    $presenca =  '0';
                    $cmd = $this->pdo->query("UPDATE presenca SET Status = '$presenca' where id = '$id'");
                }
            }

        }

        public function StatusPresenca(){

            $data = date('Y-m-d');
            $cmd =  $this->pdo->prepare("SELECT * FROM presenca where data != '$data' and Entrada != '' and Saida != ''");
            $cmd->execute();
            $dados = $cmd->fetchAll();

            if ($cmd->rowCount() > 0) {
                foreach ($dados as $d) {
                    $id = $d['id'];
                    $presenca =  '1';
                    $cmd = $this->pdo->query("UPDATE presenca SET Status = '$presenca' where id = '$id'");
                }
            }

        }

    
}

?>