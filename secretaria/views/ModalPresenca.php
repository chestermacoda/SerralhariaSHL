<!--   Modal-->
 
 
<div class="modal fade" id="Presenca">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario de Marcacao de Presencas</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                    <form action="" class="FinaldeSemana" id="modal-form" >
                    <div class="col-6 d-flex p-2">
                        <input type="date" name="data"  id="DataFinal" class="form-control mx-2" >
                        <button class="btn btn-primary adicionar">Add</button>
                    </div>
                    <div class="resps"></div>
                    <div class="modal-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="top">
                                <td>Select</td>
                                <td>Nome</td>
                                <td>Data</td>
                                <td>Entrada</td>
                                <td>Saida</td>
                                <td>Action</td>
                            </thead>
                            <tbody class="Final"></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan=""><input type="checkbox" name="All" id=""></td>
                                    <td colspan="">Todos Selecionados</td>
                                    <td colspan="1"><input type="time" name="time" id="" class="form-control"></td>
                                    <td><button type="submit" class="btn btn-outline-secondary "><i class="fa-solid fa-check"></i></button></td>
                                    <td><?php
                                        //  if(isset($_SESSION['dataFinalsemana'])){
                                        //     echo $_SESSION['dataFinalsemana'];
                                        //  }
                                    ?></td>
                                </tr>
                            </tfoot>
                        </table>

                    </form>
                
            </div>
        </div>
     </div>