<x-frtecnologia>
    <div class="fr-card p-0 shadow col-sm-12">
        <div class="fr-card-header">
           @foreach($submodulos as $s)
            <x-Submodulo nome="{{$s['nome']}}" endereco="{{$s['endereco']}}" rota="{{route($s['rota'])}}" icon="bx bx-list-ul"/>
           @endforeach
        </div>
        <div class="fr-card-body">
            <form action="{{route('Envios/index')}}" method="GET" class="row">
                <div class="col-sm-11">
                    <label>Lista</label>
                    <select name="IDLista" class="form-control">
                        <option value="0">Nenhuma</option>
                        @foreach($Listas as $l)
                        <option value="{{$l->id}}">{{$l->Nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-1">
                    <label style="visibility: hidden">a</label>
                    <input type="submit" class="form-control btn bg-fr text-white" value="Filtrar">
                </div>
            </form>
            <x-form action="{{route('Envios/Save')}}" enctype="multipart/form-data">
                <hr>
                <table class="table col-sm-12" id="escolas" data-rota="{{route('Envios/Contatos/list')}}">
                    <thead class="bg-fr text-white">
                        <tr>
                            <th></th>
                            <th>Título</th>
                            <th>Email</th>
                            <th>Lista</th>
                            <th>Adicionado em</th>
                            <th>Último Envio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
                <div class="col-sm-12">
                    <label>Remetente</label>
                    <select name="IDRemetente" class="form-control" required>
                        <option value="">Selecione o Remetente</option>
                        @foreach($Remetentes as $r)
                        <option value="{{$r->id}}">{{$r->Email}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12">
                    <label>Assunto</label>
                    <input type="text" name="Assunto" class="form-control" required>
                </div>
                <div class="col-sm-12">
                    <label>Conteúdo</label>
                    <textarea name="Mensagem" class="form-control" required></textarea>
                </div>
                <div class="col-sm-12">
                    <label>Anexos</label>
                    <input type="file" class="form-control" name="Anexos[]" multiple>
                </div>
                <br>
                <div class="col-auto">
                    <button class="btn text-white bg-fr" type="submit">Enviar</button>
                </div>
            </x-form>
        </div>
    </div>
</x-frtecnologia>