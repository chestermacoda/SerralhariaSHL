<!--   Modal-->
 
 
<div class="modal fade" id="janelamodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Preencha o Formulario </h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="modal-form" >
                    <div class="modal-body">
                    <div id="resp"></div>
                    <div class="row p-2">
                            <label for="" class="form-label">Nome da Ferramenta</label>
                            <select name="nome" class="form-control" id="">
                                <option value="">Nome da Ferramenta</option>
                                <?php foreach($fe as $fr){ ?>
                                    <option value="<?=$fr['id']?>"><?=$fr['nome']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="" class="form-label">Quantidade</label>
                            <input type="number" name="Quantidade" class="form-control" id="" placeholder="Insira a quantidade do produto">
                        </div>
                        <div class="row p-2" >
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