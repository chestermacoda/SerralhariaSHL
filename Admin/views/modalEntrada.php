<!--   Modal-->
 
 
<div class="modal fade" id="janelamodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Preencha o Formulario de Entradas</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="modal-form">
                    <div class="modal-body">
                    <div id="resp"></div>
                                <div class="row p-2">
                                    <label for="" class="form-label text-black">Nome do Material</label>
                                    <select name="nome" id="" class="form-control">
                                        <option value="">Nome do Material</option>
                                        <?php foreach($dados as $d){?>
                                        <option value="<?=$d['id']?>"><?=$d['NomeMaterial']?> <?=$d['tipo']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="row p-2">
                                 <input type="hidden" name="casa" value="<?=$_GET['id']?>"   id="" class="form-control">
                                </div>
                                <div class="row p-2">
                                    <label for="" class="form-label">Quantidade do Material</label>
                                    <input type="number" name="Quantidade" placeholder="Digite a Quantidade do Material" id="" class="form-control">
                                </div>
                                <div class="row p-2">
                                    <label for="" class="form-label">Data de Entrada</label>
                                    <input type="date" name="data" class="form-control" id="data">
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