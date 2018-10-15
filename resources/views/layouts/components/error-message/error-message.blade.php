@if($errors->has($key))
    @foreach($errors->get($key) as $error)
        <div class="error-message">{{ $error }}</div>
    @endforeach
@endif