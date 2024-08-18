<x-frtecnologia>
    <div class="fr-card p-0 shadow col-sm-12">
        <div class="fr-card-header">
           @foreach($submodulos as $s)
            <x-Submodulo nome="{{$s['nome']}}" endereco="{{$s['endereco']}}" rota="{{route($s['rota'])}}" icon="bx bx-list-ul"/>
           @endforeach
        </div>
        <div class="fr-card-body">
            <div class="row">
                <x-form action="{{route('Contatos/Listas/Save')}}" enctype="">
                    @if(isset($Registro))
                    <input type="hidden" name="id" value="{{$Registro->id}}">
                    @endif
                    <div class="col-sm-12">
                        <label>Nome da Lista</label>
                        <input type="text" name="Nome" class="form-control">
                    </div>
                    <div class="col-sm-12">
                        <label>Descrição da Lista</label>
                       <textarea class="form-control" name="DSLista"></textarea>
                    </div>
                    <br>
                    <div class="col-sm-4">
                        <button class="btn bg-fr text-white">Salvar</button>
                        <a href="{{route('Contatos/Listas/index')}}" class="btn btn-light">Voltar</a>
                    </div>
                    @if($id)
                    <div class="col-sm-12">
                        <h3 align="center">Emails</h3>
                        <table class="table" id="escolas" data-rota="{{route('Listas/Emails/list',$id)}}">
                            <thead class="bg-fr text-white">
                                <tr>
                                    <th>Título</th>
                                    <th>Email</th>
                                    <th>Adicionado em</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                </x-form>
            </div>
        </div>
    </div>
</x-frtecnologia>