
 <div class="row">
     <div class="col-sm-12">
         <form  action="{{route('platoss.store')}}" method="POST" enctype="multipart/form-data">
             @csrf
             <input type="hidden" id="id_reg" name="id" value="">
             <div class="row">

                <div class="col-sm-4">
                     <div class="form-group">
                         <label for="id_image">Foto1</label>
                         <input type="file" name="imagen" id="id_image" class="border border-primary form-control rounded-3" >
                     </div>
                 </div>
                <div class="col-sm-4">
                     <div class="form-group">
                         <label for="id_image2">Foto2</label>
                         <input type="file" name="imagen2" id="id_image2" class="border border-primary form-control rounded-3" >
                     </div>
                 </div>
                <div class="col-sm-4">
                     <div class="form-group">
                         <label for="id_image3">Foto3</label>
                         <input type="file" name="imagen3" id="id_image3" class="border border-primary form-control rounded-3" >
                     </div>
                 </div>

                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="nombres">Nombre</label>
                         <input type="text" name="nombre" id="id_nombre" class="border border-primary form-control rounded-3" required >
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="apellidos">Descripción</label>
                         <input type="text" name="descripcion" id="id_descripcion" class="border border-primary form-control rounded-3" required  >
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="direccion">Precio</label>
                         <input type="text" name="precio" id="id_precio" class="border border-primary form-control rounded-3" required  >
                     </div>
                 </div> 
             </div> 
             <div class="row">
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="id_estok">Stock</label>
                         <input type="number" name="estok" id="id_estok" class="border border-primary form-control rounded-3" required  >
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label for="id_estok_min">Stock-min</label>
                         <input type="number" name="estok_min" id="id_estok_min" class="border border-primary form-control rounded-3" required  >
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group form-check">
                         <input type="checkbox" name="estado" id="id_estado" class="border border-success form-check-input" >
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