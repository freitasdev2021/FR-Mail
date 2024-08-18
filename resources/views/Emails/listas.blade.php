<x-frtecnologia>
    <div class="fr-card p-0 shadow col-sm-12">
        <div class="fr-card-header">
           @foreach($submodulos as $s)
            <x-Submodulo nome="{{$s['nome']}}" endereco="{{$s['endereco']}}" rota="{{route($s['rota'])}}" icon="bx bx-list-ul"/>
           @endforeach
        </div>
        <div class="fr-card-body">
            <div class="row">
                <div class="col-auto">
                    <a class="btn btn-success bg-fr text-white" href="{{route('Contatos/Listas/Novo')}}">Adicionar</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <table class="table" id="escolas" data-rota="{{route('Contatos/Listas/list')}}">
                    <thead class="bg-fr text-white">
                        <tr>
                            <th>Nome da Lista</th>
                            <th>Descrição</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-frtecnologia>