<form action="{{route('Organizadores/Save')}}" method="POST">
    @csrf
    @method("POST")
    @if(session('success'))
    <div class="col-sm-12 shadow p-2 bg-success text-white">
        <strong>{{session('success')}}</strong>
    </div>
    @elseif(session('error'))
    <div class="col-sm-12 shadow p-2 bg-danger text-white">
        <strong>{{session('error')}}</strong>
    </div>
    <br>
    @endif
    {{$slot}}
</form>