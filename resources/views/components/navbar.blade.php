<header>
    <div class="d-flex flex-column flex-shrink-0 p-3 vh-100 text-white bg-dark">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Backend Curriculo</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{route('quemsou.index')}}" 
            class="nav-link text-white @if(Route::currentRouteName()==='quemsou.index')active disabled @endif">
            Quem Sou
            </a>
        </li>
        <li>
            <a href="{{route('perfil.index')}}" 
            class="nav-link text-white  @if(Route::currentRouteName()==='perfil.index')active disabled @endif">
            Perfil
            </a>
        </li>
        <li>
            <a href="{{route('portfolio.index')}}" 
            class="nav-link text-white  @if(Route::currentRouteName()==='portfolio.index')active disabled @endif">
            Portfólio
            </a>
        </li>
        <li>
            <a href="{{route('cursos.index')}}" 
            class="nav-link text-white @if(Route::currentRouteName()==='cursos.index')active disabled @endif">
            Cursos
            </a>
        </li>
        <li>
            <a href="{{route('experiencias.index')}}" 
            class="nav-link text-white @if(Route::currentRouteName()==='experiencias.index') active disabled @endif">
            Experiências
            </a>
        </li>
        <li>
            <a href="{{route('escolaridade.index')}}" 
            class="nav-link text-white @if(Route::currentRouteName()==='escolaridade.index') active disabled @endif">
            Escolaridade
            </a>
        </li>
        <li>
            <a href="{{route('atividades.index')}}" 
            class="nav-link text-white @if(Route::currentRouteName()==='atividades.index') active disabled @endif">
            Atividades
            </a>
        </li>
        </ul>
        <hr>
        <a href="{{route('login.exit')}}" class="btn btn-danger">Logout</a>
    </div>
</header>
<script>
    console.log("{{Route::currentRouteName()}}")
</script>
