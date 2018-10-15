{{ Form::open(['url' => $href, 'method' => 'DELETE', 'id' => $id, 'class' => 'form-option-grid']) }}
<a href="#" onclick="deleteRegister('{{$id}}')" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Excluir registro">
    <i class="material-icons" style="color:#3949ab;">delete</i>
    {{ Form::hidden('productId', $id) }}
</a>
{{ Form::close() }}