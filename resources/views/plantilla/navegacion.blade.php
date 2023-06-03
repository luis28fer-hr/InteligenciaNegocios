<header>
    <nav>
        <div class="nav-header">
            <div>
                <i class="fa-solid fa-scale-unbalanced"></i>
                INegocios
            </div>
            <hr>
        </div>
        <div class="nav-body">
            <ul>
                <li class="nav-link {{request()->routeIs('dash') ? 'active-li-link': ''}}">
                    <a href="{{route('dash')}}" class="{{request()->routeIs('dash') ? 'active-a-link': ''}}" ><i class="fa-solid fa-house {{request()->routeIs('dash') ? 'active-a-link': ''}}"></i>Dashboard</a>
                </li>
                <li class="nav-link {{request()->routeIs('balGeneral') ? 'active-li-link': ''}}">
                    <a href="{{route('balGeneral')}}" class="{{request()->routeIs('balGeneral') ? 'active-a-link': ''}}" ><i class="fa-solid fa-scale-balanced {{request()->routeIs('balGeneral') ? 'active-a-link': ''}}"></i>Balance General</a>
                </li>
                <li class="nav-link {{request()->routeIs('cuentasT') ? 'active-li-link': ''}}">
                    <a href="{{route('cuentasT')}}" class="{{request()->routeIs('cuentasT') ? 'active-a-link': ''}}" ><i class="fa-solid fa-filter-circle-dollar {{request()->routeIs('cuentasT') ? 'active-a-link': ''}}"></i>Cuentas T</a>
                </li>
                <li class="nav-link {{request()->routeIs('balComprobacion') ? 'active-li-link': ''}}">
                    <a href="{{route('balComprobacion')}}" class="{{request()->routeIs('balComprobacion') ? 'active-a-link': ''}}" ><i class="fa-solid fa-chart-pie {{request()->routeIs('balComprobacion') ? 'active-a-link': ''}}"></i>Comprobación</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
