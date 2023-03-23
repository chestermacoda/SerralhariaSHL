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
        public function SaidaAutomaticaFinalSemana(){

            $data = date('Y-m-d');
            $cmd =  $this->pdo->prepare("SELECT * FROM presenca where data != '$data' and Entrada IS NOT NULL AND DiaSemana = 'Sat' OR DiaSemana = 'Sun'");
            $cmd->execute();
            $dados = $cmd->fetchAll();

            if ($cmd->rowCount() > 0) {
                foreach ($dados as $d) {
                    $id = $d['id'];
                    $presenca =  '12:04:30';
                    $cmd = $this->pdo->query("UPDATE presenca SET Saida = '$presenca' where id = '$id'");
                }
            }

        }
        public function FormatarDiaSemana(){

            // $data = date('Y-m-d');
            $cmd =  $this->pdo->prepare("SELECT id,data FROM presenca where  DiaSemana IS NULL ");
            $cmd->execute();
            $dados = $cmd->fetchAll();

            if ($cmd->rowCount() > 0) {
                foreach ($dados as $d) {
                    $id = $d['id'];
                    $data = $d['data'];

                    $valor = date("D", strtotime($data));
                    
                    $cmd = $this->pdo->query("UPDATE presenca SET DiaSemana = '$valor' where id = '$id' and data = '$data'");
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

        public function Domingos(){
            $cmd =  $this->pdo->prepare("SELECT * FROM presenca where DiaSemana = 'Sun' and Entrada IS NULL;");
            $cmd->execute();
            $dados = $cmd->fetchAll();

            if ($cmd->rowCount() > 0) {
                foreach ($dados as $d) {
                    $id = $d['id'];
                    $cmd = $this->pdo->query("DELETE FROM presenca where id = '$id'");
                }
            }

        }
        public function CustodiaAuxilio(){

            // =====================================================================================================================
            $cmd =  $this->pdo->prepare("SELECT * FROM presenca where DiaSemana = 'Sat' and Entrada IS NULL and id_funcionario = 19");
            $cmd->execute();
            $dados = $cmd->fetch();

            if ($cmd->rowCount() > 0) {
                    $id = $dados['id'];
                    $cmd = $this->pdo->query("DELETE FROM presenca where id = '$id'");
            }

            // ======================================================================================================================
            $cmd =  $this->pdo->prepare("SELECT * FROM presenca where DiaSemana = 'Sat' and Entrada IS NULL and id_funcionario = 17");
            $cmd->execute();
            $dados = $cmd->fetch();

            if ($cmd->rowCount() > 0) {
                    $id = $dados['id'];
                    $cmd = $this->pdo->query("DELETE FROM presenca where id = '$id'");
            }

            

        }

    
}

?>