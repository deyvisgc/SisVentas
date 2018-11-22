<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$use->id}}">
  {{Form::Open(array('action'=>array('UsuarioController@destroy',$use->id),'method'=>'delete'))}}
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">

      <div class="modal-header">
        <div class="icon-box">
          <i class="fa fa-trash"></i>
        </div>
        <h4 class="modal-title">Estas seguro?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <p>¿Realmente quieres borrar estos registro? Este proceso no se puede deshacer.</p>
      </div>
      <div class="modal-footer">
        <button type="button"   class="btn btn-info" data-dismiss="modal">Cancel</button>
        <button type="submit"  id="deleRol" class="btn btn-danger" >Eliminar</button>
      </div>
    </div>
  </div>
  {{Form::Close()}}

</div>