<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Summit Wir</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SW</a>
        </div>
        <ul class="sidebar-menu">
            <li class={{ request()->routeIs('admin.index') ? 'active' : ''}}><a class="nav-link" href="{{route('admin.index')}}"><i class="far fa-square"></i>
                    <span>Dashboard</span></a></li>

            </li>
            <li class={{ request()->routeIs('admin.categories.index') ? 'active' : ''}}>
                <a href="{{route('admin.categories.index')}}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Categories</span></a>
            </li>
            <li class={{ request()->routeIs('admin.products.index') ? 'active' : ''}}>
                <a href="{{route('admin.products.index')}}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Product</span></a>
            </li>
            <li class={{ request()->routeIs('admin.orders.index') ? 'active' : ''}}>
                <a href="{{route('admin.orders.index')}}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Orders</span></a>
            </li>
            {{-- <li>
                <a href="{{route('admin.report.index')}}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Report</span></a>
            </li> --}}
        </ul>
    </aside>
</div>