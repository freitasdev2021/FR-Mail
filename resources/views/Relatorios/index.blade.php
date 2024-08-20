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
                    <a href="{{route('Envios/Relatorios/Export')}}" class="btn bg-fr text-white">Exportar</a>
                </div>
            </div>
            <hr>
            <table class="table col-sm-12" id="escolas" data-rota="{{route('Envios/Relatorios/list')}}">
                <thead class="bg-fr text-white">
                    <tr>
                        <th>Remetente</th>
                        <th>Destinatário</th>
                        <th>Assunto</th>
                        <th>Mensagem</th>
                        <th>Anexos</th>
                        <th>Data de Envio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
</x-frtecnologia>