<ul id="slide-out" class="side-nav fixed blue-pattern">
    <li>
        <div class="user-view">
            <div class="background">
            </div>
            <a href="{{ route('users.edit', ['user' => Auth::user()]) }}"><img class="circle center img-user" src="{{ URL::asset('images/default-user.jpg') }}"></a>
            <a href="#!name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
            <a href="#!email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
        </div>
    </li>
    <li>
        <hr width="80%"/>
    </li>
    <li>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div id="big-menu-home" class="collapsible-header white-text"><i class="material-icons">home</i>
                    <a class="white-text" href="{{ route('home') }}">
                        Home
                    </a>
                </div>
            </li>
            <li>
                <div id="big-menu-administrativo" class="collapsible-header white-text"><i class="material-icons">security</i>Administrativo</div>
                <div class="collapsible-body">
                    <ul class="blue-pattern-secundary">
                        <li><a href="{{ route('users.show') }}"><i class="material-icons">person</i>Usuários</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div id="big-menu-operational" class="collapsible-header white-text"><i class="material-icons">public</i>Operacional</div>
                <div class="collapsible-body">
                    <ul class="blue-pattern-secundary">
                        <li><a href="{{ route('productTypes.show') }}"><i class="material-icons">add_to_photos</i>Tipos de Produtos</a></li>
                        <li><a href="{{ route('products.show') }}"><i class="material-icons">add_box</i>Produtos</a></li>
                        <li><a href="{{ route('sales.show') }}"><i class="material-icons">account_balance_wallet</i>Vendas</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header white-text"><i class="material-icons">power_settings_new</i>
                    <a style="width: 100%;" href="{{ route('logout') }}" class="white-text">
                        Sair
                    </a>
                </div>
            </li>
        </ul>
    </li>
</ul>