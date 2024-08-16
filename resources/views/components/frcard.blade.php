<div class="fr-card p-0 shadow col-sm-12">
    <div class="fr-card-header">
       @foreach(json_decode($submodulos,true) as $s)
        <x-Submodulo nome="{{$s['nome']}}" endereco="{{$s['endereco']}}" rota="{{route($s['rota'],$id)}}" icon="bx bx-list-ul"/>
       @endforeach
    </div>
    <div class="fr-card-body">
        <!--LISTAS-->
        <div class="col-sm-12 p-2 center-form">
            {{$slot}}
        </div>
        <!--//-->
    </div>
</div>