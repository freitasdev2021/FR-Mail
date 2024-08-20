@extends('layouts.app')

@section('content')
<body className='snippet-body'>
    <body classname="snippet-body" id="body-pd" class="body-pd" cz-shortcut-listen="true">
       <header class="header bg-fr" id="header">
      
       </header>
       <div class="l-navbar show" id="nav-bar">
          <nav class="nav" >
             <div>
                <a href="{{route('dashboard')}}" class="nav_logo"><i class='bx bx-envelope text-white'></i></i><span class="nav_logo-name">FR Mail</span> </a>
                <div class="nav_list">
                    <x-Modulo nome="Remetentes" icon="bx bx-mail-send" rota="Remetentes/index" endereco="Remetentes"/>
                    <x-Modulo nome="Contatos" icon="bx bxs-contact" rota="Contatos/index" endereco="Contatos"/>
                    <x-Modulo nome="Envios" icon="bx bx-right-arrow-alt" rota="Envios/index" endereco="Envios"/>
                    <x-Modulo nome="API e SMTP" icon="bx bx-code-alt" rota="dashboard" endereco="profile"/>
                </div>
             </div>
             <form action="{{route('logout')}}" method="POST">
               @csrf
               <button class="nav_link sair" type="submit"><i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </button>
             </form>
          </nav>
       </div>
       <!--Container Main start-->
       <div class="bari" style="margin-top:100px; margin-right:15px;">
          {{$slot}}
       </div>
       <!--Container Main end-->
       <script>
         // windowHeight = $(window).height()
         // $(".bari").css("height",windowHeight)
       </script>
 </body>
@endsection