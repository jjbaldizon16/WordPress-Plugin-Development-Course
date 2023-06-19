<?php
/**
 * Aqui crearemos el html de la primera pagina
 */

 ?>

  <div class="container-fluid page menu" style="background-color: #f1f1f1">

       <h3>Dashboard</h3>
       <div class="row">

            <!--Bloque 01-->
            <div class="col-sm-12">

                  <div class="card mb-3" style="max-width: 100%;">
                
                   <div class="row g-0">

                     <div class="col-md-4">

                      <img src="<?php echo plugin_dir_url(__FILE__) . 'imgs/img-pop-up.png'; ?>" alt="" class="img-fluid">

                     </div> 

                     <div class="col-md-8">

                          <div class="card-body">

                             <h5 class="card-title"> Title</h5>
                             <p class="card-text">Gana dinero promocionando algun tipo de producto o servicio</p>
                            
                              <p class="card-text">
                                <small class="text-muted">Convierte tus visitas en ganancias</small>
                              </p>  
                                  

                          </div>

                     </div>

                   </div>

                </div> 

            </div>

          <!--bloque 02-->
          <div class="col-sm-12">

              <div class="card text-dark mb-3">

               <div class="card-header">
                 
               <h6 class="res-box-title">Pop-ups</h6>

               </div>
               <div class="card-body">

                       <p class="card-text">
                           En esta parte podras editar o eliminar tu pop-up, cada vez que crees uno aparecera justo
                           debajo con su respectivo shortcode para que lo peques en las paginas donde quieras que 
                           aparezca.

                       </p>

                        <table class="table" id="tableId">

                          <thead>

                             <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Shortcode</th>
                                <th scope="col">Opciones</th>
                                

                             </tr>

                          </thead>

                          <tbody>

                               <tr>
                                  <th socope="row">pop up 1</th>
                                  <td>Pop up navidad</td>
                                   <td>

                                     <a href="" type="button" class="btn btn-outline-info" id="btn_editar">
                                       <span class="dashicons dashicons-welcome-write-blog"></span>  

                                     </a> 
                                     <a href="" type="button" class="btn btn-outline-danger" id="btn_eliminar">
                                       <span class="dashicons dashicons-trash"></span>  

                                     </a> 
                   

                                   </td>
                                      
                               </tr>

                          </tbody>
                        

                        </table> 

                        <!--boton crear-->
                        
                        <a href="#" type="button" class="btn btn-primary text-uppercase btn-crear" id="btn_crear" style="">
                        
                        <span class="dashicons dashicons-plus"></span>  
                        <span style="margin-top: -4px;">Crear</span>
                        </a>   


               </div>

              </div>

          </div>

       </div>

</div>


<?php include 'res-modal.php' ?>

