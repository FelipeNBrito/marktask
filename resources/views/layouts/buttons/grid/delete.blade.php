<div id="modal-{{$id}}" class="modal">
    <div class="modal-content">
        <h4>Deseja realmente excluir o registro?</h4>
        <p>Essa ação não poderá ser desfeita.</p>
    </div>
    <div class="modal-footer" style="width: 98%;">
        <a href="#!" onclick="$('#modal1').modal('close');" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a href="#!" onclick="deleteRegister('{{$id}}')" class="modal-action modal-close waves-effect waves-green btn-flat">Excluir</a>
    </div>
</div>
{{ Form::open(['url' => $href, 'method' => 'DELETE', 'id' => $id, 'class' => 'form-option-grid']) }}
    <a href="#modal-{{$id}}" class="modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Excluir registro">
        <i class="material-icons" style="color:#3949ab;">delete</i>
    </a>
{{ Form::close() }}