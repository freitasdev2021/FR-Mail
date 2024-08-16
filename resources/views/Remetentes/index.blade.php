<x-frtecnologia>
    <div class="fr-card p-0 shadow col-sm-12">
        <div class="fr-card-header">
           @foreach($submodulos as $s)
            <x-Submodulo nome="{{$s['nome']}}" endereco="{{$s['endereco']}}" rota="{{route($s['rota'])}}" icon="bx bx-list-ul"/>
           @endforeach
        </div>
        <div class="fr-card-body">
            <x-form action="{{route('Remetentes/Save')}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-4">
                        <label>Tipo</label>
                        <select name="Acao" class="form-control">
                            <option value="Adicionar">Adicionar</option>
                            <option value="Exportar">Importar</option>
                        </select>
                    </div>
                    <div class="col-sm-6 escrever">
                        <label>Email</label>
                        <input type="email" name="Email" class="form-control">
                    </div>
                    <div class="col-sm-6 importar">
                        <label>Arquivo</label>
                        <input type="file" name="Arquivo" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <label style="visibility: hidden">a</label>
                        <input type="submit" class="form-control btn btn-success" value="Enviar">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <table class="table" id="escolas" data-rota="{{route('Remetentes/list')}}">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </x-form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".importar").hide()

            $("select[name=Acao]").on("change",function(){
                if($(this).val() == "Adicionar"){
                    $(".importar").hide()
                    $(".escrever").show()
                }else{
                    $(".importar").show()
                    $(".escrever").hide()
                }
            })
        })
    </script>
</x-frtecnologia>