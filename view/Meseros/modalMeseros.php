<div class="modal fade" id="modalEditarMeseros" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Meseros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form >
        <!-- method="post" action="../../controller/usuario.php?op=actualizar -->
            <div class="mb-3">
                  <label for="mes_id" class="form-label">Id</label>
                  <input type="text" class="form-control" id="mes_id" name="mes_id" aria-describedby="ids" disabled>
            </div>
            <div class="mb-3">
                  <label for="mes_codigo" class="form-label">Codigo</label>
                  <input type="text" class="form-control" id="mes_codigo" name="mes_codigo">
            </div>
            <div class="mb-3">
                  <label for="mes_nombres" class a="form-label">Nombres</label>
                  <input type="text" class="form-control" id="mes_nombres" name="mes_nombres" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                  <label for="mes_apellidos" class="form-label">Apellidos</label>
                  <input type="text" class="form-control" id="mes_apellidos" name="mes_apellidos">
            </div>
            <div class="mb-3">
                  <label for="mes_documento" class="form-label">Documento</label>
                  <input type="text" class="form-control" id="mes_documento" name="mes_documento" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                  <label for="mes_telefono" class="form-label">Telefono</label>
                  <input type="text" class="form-control" id="mes_telefono" name="mes_telefono">
            </div>
            <div class="mb-3">
                  <label for="mes_direccion" class="form-label">Direccion</label>
                  <input type="text" class="form-control" id="mes_direccion" name="mes_direccion" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                  <label for="mes_correo" class="form-label">Correo</label>
                  <input type="email" class="form-control" id="mes_correo" name="mes_correo">
            </div>
            <div class="mb-3">
                  <label for="mes_sexo" class="form-label">Sexo</label>
                  <select class="form-control" id="mes_sexo" name="mes_sexo" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
            </div>
            <div class="mb-3">
                  <label for="mes_contrasena" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="mes_contrasena" name="mes_contrasena">
            </div>
            
            <!-- <button type="submit" class="btn btn-primary">Guardar</button> -->
       </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btnGuardarMes">Guardar</button>

      </div>
    </div>
  </div>
</div>
