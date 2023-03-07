<?php
 
class Armazem{
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
    public function AddMaterial($nome,$tipo,$medida,$cor,$quantidade){
        $cmd = $this->pdo->prepare("INSERT INTO produtos(nome,tipo,medida,cor,quantidade) values(:n,:t,:m,:c,:q)");
        $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":t",$tipo);
        $cmd->bindValue(":m",$medida);
        $cmd->bindValue(":c",$cor);
        $cmd->bindValue(":q",$quantidade);
        $cmd->execute();
        return true;
    }
    
    public function funcionarios(){
        $cmd = $this->pdo->prepare("SELECT * FROM funcionarios  where status = 'on'");
        $cmd->execute();
        $dados = $cmd->fetchAll();
        return $dados;
    }
    public function material(){
        // Material cadastrado no Sistema, limitado em 5 dados 
        $cmd = $this->pdo->prepare("SELECT * FROM material ");
        $cmd->execute();
        $dados = $cmd->fetchAll();
        return $dados;
    }
    public function updateQuantity($id_material,$quantity){
        $cmd = $this->pdo->prepare("UPDATE material SET quantidade = '$quantity' WHERE `material`.`id` = '$id_material';");
        $cmd->execute();
       
    }
    public function listarSaidas(){
        $data = date('d/m/y');
        $cmd = $this->pdo->prepare("SELECT sa.id,sa.quantidade,sa.data,m.NomeMaterial,f.nome FROM saidamaterial sa INNER JOIN material m ON m.id = sa.id_material INNER JOIN funcionarios f ON f.id = sa.id_funcionario where sa.data = '$data'");
        $cmd->execute();
        $dados = $cmd->fetchAll();
        return $dados;
    }
    public function EntradaInserir($id_material,$quantidade,$data){
        $cmd = $this->pdo->prepare("INSERT INTO entrada(id_material,quantidade,data) values(:m,:q,:d)");
        $cmd->bindValue(":m",$id_material);
        $cmd->bindValue(":q",$quantidade);
        $cmd->bindValue(":d",$data);       
        $cmd->execute();
    }
    public function ferramentas(){
        // ferramenta cadastrado no Sistema
        $cmd = $this->pdo->prepare("SELECT * FROM ferramenta ");
        $cmd->execute();
        $dados = $cmd->fetchAll();
        return $dados;
    }
    
    public function updateQuantityTools($id_ferramenta,$quantity){
        $cmd = $this->pdo->prepare("UPDATE ferramenta SET quantidade = '$quantity' WHERE `ferramenta`.`id` = '$id_ferramenta';");
        $cmd->execute();
    }
    public function NotificationTemp($nomeMaterial,$tipo,$funcionario,$ferramenta,$quantidade,$dataRetorno){
            $cmd = $this->pdo->prepare("INSERT INTO notificationtemp(id_material,tipo,id_funcionario,id_ferramenta,quantidade,dataRetorno) values(:m,:t,:f,:fe,:q,:d)");
            $cmd->bindValue(":m",$nomeMaterial);
            $cmd->bindValue(":t",$tipo);
            $cmd->bindValue(":f",$funcionario);
            $cmd->bindValue(":fe",$ferramenta);
            $cmd->bindValue(":q",$quantidade);
            $cmd->bindValue(":d",$dataRetorno);
            $cmd->execute();
    }
    public function user($id){
        $cmd = $this->pdo->prepare("SELECT * FROM usuarios where id = :n");
        $cmd->bindValue(":n",$id);
        $cmd->execute();
        $dados = $cmd->fetch();
        return $dados;
    }
    public function materialInfo($id){
        $cmd = $this->pdo->prepare("SELECT * FROM material where id = :n");
        $cmd->bindValue(":n",$id);
        $cmd->execute();
        $dados = $cmd->fetch();
        return $dados;
    }
     
    public function requisition($id){
        $cmd = $this->pdo->query("SELECT r.id,r.id_ferramenta,r.status, f.nome as ferramenta, fu.nome, r.quantidade, r.entregaData,r.retornoData, r.status, r.descricao FROM `requisitartools` r INNER JOIN ferramenta f ON r.id_ferramenta = f.id INNER JOIN funcionarios fu ON r.id_funcionario = fu.id where r.id = '$id'");
        $dados = $cmd->fetch();
        return $dados;

    }
    public function outMaterial($id){
        $cmd = $this->pdo->prepare("SELECT sa.registo,sa.id,sa.quantidade,sa.data,m.NomeMaterial,f.nome FROM saidamaterial sa INNER JOIN material m ON m.id = sa.id_material INNER JOIN funcionarios f ON f.id = sa.id_funcionario where sa.id = '$id'");
        $cmd->bindValue(":n",$id);
        $cmd->execute();
        $dados = $cmd->fetch();
        return $dados;
    }

    public function UpdateTools($id){
        // ferramenta cadastrado no Sistema
        $cmd = $this->pdo->prepare("SELECT * FROM ferramenta where id = '$id'");
        $cmd->execute();
        $dados = $cmd->fetch();
        return $dados;
    }
    
}
 
?>