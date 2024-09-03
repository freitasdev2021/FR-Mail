<x-frtecnologia>
    <!----SMTP---->
    <div class="card">
        <div class="card-header bg-fr text-white">
            <strong>SMTP</strong>
            <p>
                O Envio pode ser realizado com Domínio Próprio, até mesmo no Gmail, porem no Gmail Necessita-se de Autenticação de Usuário Real, porem para se Identificar com Domínio Próprio, coloque seu Email no campo 'From' de Remetente
            </p>
        </div>
        <div class="card-body">
          <ul>
            <li>SMTP: mail.frmail.com.br</li>
            <li>Porta: 25</li>
            <li><strong>Para Gmail (Necessita de Envio com Autenticação Real): </strong></li>
            <li>Usuario SMTP: comunicacao@frmail.com.br</li>
            <li>Senha SMTP: SwPx3841</li>
          </ul>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header bg-fr text-white">
            <strong>API - Todas as Respostas são em JSON</strong>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Seu Token de API:</strong> {{$APIToken}}</p>
            <p class="card-text"><strong>Seu ID de Instituicao:</strong> {{$IDInstituicao}}</p>
            <p class="card-text"><strong>Seu ID de Usuario:</strong> {{$IDUser}}</p>
            <dl>
                <dt>Consultar Relatórios</dt>
                <dd>
                    <ul>
                        <li>
                            Headers: Authorization: Bearer {SEU TOKEN}
                        </li>
                        <li>
                            Endpoint: www.frmail.com.br/api/Relatorio
                        </li>
                        <li>
                            Metodo: GET
                        </li>
                    </ul>
                </dd>
                <hr>
                <dt>Enviar Email</dt>
                <dd>
                    <ul>
                        <li>
                            Headers: Authorization: Bearer {SEU TOKEN}
                        </li>
                        <li>
                            Endpoint: www.frmail.com.br/api/Relatorio
                        </li>
                        <li>
                            Metodo: POST
                        </li>
                    </ul>
                    <p class="card-text"><strong>Body</strong></p>
                    <ul>
                        <li>
                            Remetente: 'Email do Remetente'
                        </li>
                        <li>
                            Destinatario: ['email1@exemplo.com','email2@exemplo.com']
                        </li>
                        <li>
                            Assunto : 'seu assunto'
                        </li>
                        <li>
                            Mensagem : 'sua mensagem'
                        </li>
                        <li>
                            IDUser: 'Seu ID de Usuario'
                        </li>
                        <li>
                            IDInstituicao: 'Seu ID de Instituicao'
                        </li>
                    </ul>
                </dd>
            </dl>
        </div>
    </div>
    <!---TESTE-->
</x-frtecnologia>