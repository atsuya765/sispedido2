
 <div class="row">
     <div class="col-sm-12">
         <form id="myForm" action="{{route('admin.clientes.store')}}" method="post" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="Id_cliente" value=" ">
             <div class="row">
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="nombres">Nombres</label>
                         <input type="text" name="nombres" id="id_nombre" class="border border-primary form-control rounded-3" required value=" ">
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="apellidos">apellidos</label>
                         <input type="text" name="apellidos" id="id_descripcion" class="border border-primary form-control rounded-3" required value=" ">
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="direccion">direccion</label>
                         <input type="text" name="direccion" id="id_descripcion" class="border border-primary form-control rounded-3" required value="  ">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="telf">Telefono</label>
                         <input type="number" name="telefono" id="id_nombre" class="border border-primary form-control rounded-3 " value=" ">
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="ruc">Correo</label>
                         <input type="text" name="correo" id="id_correo" class="border border-primary form-control rounded-3" value="  ">
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="ruc">Ruc</label>
                         <input type="text" name="ruc" id="id_ruc" class="border border-primary form-control rounded-3" value=" ">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-sm-4">
                     <div class="form-group form-check">
                         <input type="checkbox" name="estado" id="id_estado" class="border border-success form-check-input">
                         <label class="form-check-label" for="exampleCheck1">Estado</label>
                     </div>
                 </div>

                 <div class="col-sm-8">
                     <div class="" id="mis_errores">
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-sm-4">
                     <div class="form-group">
                         <button type="submit" class="btn btn-primary btn-block">Guardar </button>
                     </div>
                 </div>
             </div>
         </form>
     </div>
 </div>