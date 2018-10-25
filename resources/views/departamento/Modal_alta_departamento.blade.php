<!-- Modal alta departamento -->
<fieldset class='form' id='fieldset'>
    <div class="modal fade" id="alta_departamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" id='1'>
            <div class="modal-content" id='2'>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Registra un nuevo departamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="was-validated" action="{{route('altadepartamento')}}" name='formulario' method='POST' enctype='multipart/form-data'>
                        {{csrf_field()}}
                        <div class="col-md-14">
                            <label>*Nombre del departamento :</label>
                            <input type="text" class="form-control is-valid" id="" placeholder="Ingresa el nombre del departamento" name='departamento' value="{{old('departamento')}}" required>
                            @if($errors->first('departamento'))
                                <i>{{$errors->first('departamento')}}</i>
                            @endif
                        </div>
                        
                        <div class="col-md-14">
                            <label>Imagen de perfil :</label>
                            <input type="file" class="form-control is-valid" name='archivo'>
                        </div>
                        <div class="col-md-6">
                            *Activo :
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="activo1" value="Si" name="activo" checked>
                                <label class="custom-control-label" for="activo1">SI</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" class="custom-control-input" id="activo" value="No" name="activo">
                                <label class="custom-control-label" for="activo">NO</label>
                                <div class="invalid-feedback">Selecciona una opcion, por favor</div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <input type="submit" class="btn btn-primary" value='Enviar' id='enviar_empleado'>
                        </div>
                    </form>
                    <div align='center'>
                    <b>Los campos con * son obligatorios.</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>