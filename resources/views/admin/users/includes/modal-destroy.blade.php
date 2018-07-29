<div class="modal fade" id="modal-destroy-{{$user->id}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Excluir</h4>
            </div>
            <div class="modal-body">
                <p>Você confirma a exclusão do usuário {{$user->name}} ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="document.getElementById('form-destroy-{{$user->id}}').submit();" class="btn btn-danger">Confirmar</button>
            </div>
        </div>

    </div>
</div>