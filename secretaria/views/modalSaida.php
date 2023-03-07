<!--   Modal-->
 
 
<div class="modal fade" id="janelamodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Preencha o Formulario de Saida</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="modal-form">
                    <div class="modal-body">
                    <div id="resp"></div>
                        <div class="row p-1">
                            <label for="" class="form-label">Nome do Material</label>
                            <select name="nome" id="" class="form-control">
                                <option value="">Nome do Material</option>
                                <?php foreach($material as $d){?>
                                <option value="<?=$d['id']?>"><?=$d['NomeMaterial']?> <?=$d['tipo']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="row p-1">
                            <label for=""class="form-label">Nome do Funcionario</label>
                            <select name="funcionario" id="" class="form-control">
                                <option value="">Nome do Funcionario</option>
                                <?php foreach($funcio as $f){?>
                                <option value="<?=$f['id']?>"><?=$f['nome']?> <?=$f['apelido']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="row p-1">
                            <label for="" class="form-label">Quantidade do Material</label>
                            <input type="text" name="Quantidade" class="form-control" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="row p-1">
                            <input type="hidden" name="data"value="<?=date('Y-m-d')?>" class="form-control" id="" placeholder="Insira o nome do produto">
                        </div>
                        <div class="row p-2">
                        <input type="submit"  id="agendar" value="Registar"  class="btn btn-primary" > 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        
                    </div>
                </form>
            </div>
        </div>
     </div>