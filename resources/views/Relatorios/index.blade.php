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
            <table class="table col-sm-12">
                <form action="{{route('Envios/Relatorios/index')}}" method="GET" class="row d-flex justify-content-between">
                    <div class="col-sm-2">
                        <input type="search" class="form-control" name="pesquisa" placeholder="Pesquisa" value="{{$Pesquisa}}">
                    </div>
                </form>
                <br>
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
                    @foreach($Registros as $r)
                    <tr>
                        <td>{{$r->Remetente}}</td>
                        <td>{{$r->Destinatario}}</td>
                        <td>{{$r->Assunto}}</td>
                        <td>{{$r->Mensagem}}</td>
                        <td>
                            <ul>
                                @foreach(json_decode($r->Anexos) as $aj)
                                    <li>
                                        <a href="{{$aj->Nome}}">{{$aj->Nome}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{date('d/m/Y',strtotime($r->DTEnvio))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="{{$Anterior}}">Anterior</a></li>
                  @for($i=$primeiraPagina;$i<$ultimaPagina;$i++)
                    @if($i<=$linksPaginaveis)
                        <li class="page-item {{($page==$i) ? 'active' : ''}}"><a class="page-link" href="{{$Atual.'?pesquisa='.$Pesquisa.'&page='.$i}}">{{$i}}</a></li>
                    @endif
                  @endfor
                  <li class="page-item"><a class="page-link" href="{{$Proximo}}">Próximo</a></li>
                </ul>
            </nav>
        </div>
    </div>
</x-frtecnologia>