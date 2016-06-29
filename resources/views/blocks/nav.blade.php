<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3>Факультеты</h3>
        <ul class="nav side-menu">
            @if(Auth::user()->role==1)
                <li><a href="/vkr/store"><i class="fa fa-plus-circle"></i>Добавить/Найти ВКР</a>
                </li>
                {{--<li><a href="/vkr/all"><i class="fa fa-plus-circle"></i>Просмотреь все работы</a>--}}
                {{--</li>--}}
                @else
                <li><a href="/vkr/search"><i class="fa fa-plus-circle"></i>Поиск ВКР</a>
                </li>

                @endif

            @foreach($nav as $n)
                <li><a >{{$n['name_fakultet']}}<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        @foreach($year as $y)
                        <li><a href="/vkr/{{$n['url_fakultet']}}/{{$y->year}}">{{$y->year}}</a>
                        </li>
                            @endforeach
                    </ul>
                </li>

                @endforeach

        </ul>
    </div>
    @if(Auth::user()->role==1)
    <div class="menu_section">
        <h3>Настройки</h3>
        <ul class="nav side-menu">
            <li><a href="/facultets"><i class="fa fa-laptop"></i>Факультеты</a>
            </li>
            <li><a href="/users"><i class="fa fa-laptop"></i> Пользователи</a>
            </li>
            <li><a href="/year/store"><i class="fa fa-laptop"></i>Добавить год сдачи ВКР</a>
            </li>
        </ul>
    </div>
    @else

    @endif
</div>