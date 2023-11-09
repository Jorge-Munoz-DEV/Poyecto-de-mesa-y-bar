
<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form >
        <!-- method="post" action="../../controller/usuario.php?op=actualizar -->
            <div class="mb-3">
                  <label for="id" class="form-label">Id</label>
                  <input type="text" class="form-control" id="ids" name="adm_id" aria-describedby="ids" disabled>
            </div>
            <div class="mb-3">
                  <label for="Codigo" class="form-label">Codigo</label>
                  <input type="text" class="form-control" id="Codigo" name="adm_codigo">
            </div>
            <div class="mb-3">
                  <label for="Nombres" class a="form-label">Nombres</label>
                  <input type="text" class="form-control" id="Nombres" name="adm_nombres" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                  <label for="Apellidos" class="form-label">Apellidos</label>
                  <input type="text" class="form-control" id="Apellidos" name="adm_apellidos">
            </div>
            <div class="mb-3">
                  <label for="Documento" class="form-label">Documento</label>
                  <input type="text" class="form-control" id="Documento" name="adm_documento" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                  <label for="Telefono" class="form-label">Telefono</label>
                  <input type="text" class="form-control" id="Telefono" name="adm_telefono">
            </div>
            <div class="mb-3">
                  <label for="Direccion" class="form-label">Direccion</label>
                  <input type="text" class="form-control" id="Direccion" name="adm_direccion" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                  <label for="Correo" class="form-label">Correo</label>
                  <input type="email" class="form-control" id="Correo" name="adm_correo">
            </div>
            <div class="mb-3">
                  <label for="Sexo" class="form-label">Sexo</label>
                  <select class="form-control" id="Sexo" name="sexo" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
            </div>
            <div class="mb-3">
                  <label for="Contraseña" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="Contraseña" name="adm_contrasena">
            </div>
            
            <!-- <button type="submit" class="btn btn-primary">Guardar</button> -->
       </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>

      </div>
    </div>
  </div>
</div>
