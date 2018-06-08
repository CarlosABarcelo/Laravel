<ul class="sidebar-menu" data-widget="tree">
    <li class="header">@lang('admin.layout.header')</li>
    <!-- Optionally, you can add icons to the links -->
    <li {{ request()->is('admin') ? 'class=active' : '' }}>
        <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Inicio</span>
        </a>
    </li>

    @if (auth()->user()->profesor == true)

    <li class="treeview {{ request()->is('admin/categorias*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-link"></i> <span>Categorías</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->is('admin/categorias') ? 'class=active' : '' }}>
                <a href="{{ route('admin.categorias.index') }}">
                    <i class="fa fa-eye"></i>
                    Ver todos los posts
                </a>
            </li>
            <li>

                    <a href="{{ route('admin.categorias.create') }}">
                        <i class="fa fa-pencil"></i>
                        Crear una categoria
                    </a>

            </li>
        </ul>
    </li>
    <li class="treeview {{ request()->is('admin/entradas*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-link"></i> <span>Entradas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->is('admin/entradas') ? 'class=active' : '' }}>
                <a href="{{ route('admin.entradas.index') }}">
                    <i class="fa fa-eye"></i>
                    Ver todas las Entradas
                </a>
            </li>
            <li>

                <a href="{{ route('admin.entradas.create') }}">
                    <i class="fa fa-pencil"></i>
                    Crear una Entrada
                </a>

            </li>
        </ul>
    </li>
    <li class="treeview {{ request()->is('admin/usuarios*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-link"></i> <span>Usuarios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->is('admin/usuarios') ? 'class=active' : '' }}>
                <a href="{{ route('admin.usuarios.index') }}">
                    <i class="fa fa-eye"></i>
                    Ver todas los Usuarios
                </a>
            </li>
            <li>

                <a href="{{ route('admin.usuarios.create') }}">
                    <i class="fa fa-pencil"></i>
                    Registrar un Usuario
                </a>

            </li>
        </ul>
    </li>

    @else

    Solo eres Alumno , no puedes ver nada mas

    @endif
</ul>
