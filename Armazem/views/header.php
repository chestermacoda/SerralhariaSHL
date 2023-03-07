<div class="head">
                <div class="menu">
                   <!-- <button class="hmburguer"><img src="../public/images/drop.png" alt=""></button> -->
                   <button class="hmburguer"><i class="fa-solid fa-bars icon"></i></button>
                   <button class="close"><i class="fa-solid fa-remove icon"></i></button>
               </div>
                <div class="user1">
                   <!-- <div class="user notification ">
                       <button class="us notif comment"><i class="fa-solid fa-comment not"></i><p>0</p></button>
                       <div class="describe">
                        <a href="#">
                         <div class="text">
                             <p class="date">Date: 12-01-2023</p>
                             <p>Eletroides Stocke Baixo</p>
                             <p>Quantity: 6</p>
                         </div>
                        </a>
                        <a href="#">
                         <div class="text">
                             <p class="date">Date: 12-01-2023</p>
                             <p>Carrinha em falta</p>
                             <p>Quantity: 6</p>
                         </div>
                        </a>
                        <a href="#" class="all">
                          ver todos
                        </a>
                    </div>
                   </div> -->
                   <div class="user notification " >
                       <button class="us notif bell"><i class="fa-solid fa-bell not"></i><p><?=$totalNotification?></p></button>
                       <div class="descricao">
                           <div class="bels"></div>
                           <a href="Notificacoes.php" class="all">
                            ver todos
                           </a>
                       </div>
                   </div>
                   <div class="user out">
                       <button class="name"><p><?=$user['apelido']?></p><i class="fa-solid fa-angle-down"></i></button>
                       <div class="ul">
                            <a href="archives/sair.php" >Sair</a>
                            <a href="perfil.php">Perfil</a>
                       </div>
                   </div>
               </div>
           </div>