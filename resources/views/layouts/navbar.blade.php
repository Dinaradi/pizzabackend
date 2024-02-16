<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><span class="logo-name" style='display: flex; align-items: center; justify-content: center; gap: 20px'>
                <img src='assets/img/pizza.png' style='width: 20%'/>
                <p>Pizza</p></span>
            </a>
        </div>
        <ul class="sidebar-menu mysidebar-menu">            
            {{-- <li class="dropdown">
                <a href="customer" class="nav-link"><i
                        data-feather="monitor"></i><span>Customer</span></a>
            </li> --}}

            <li class="dropdown">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i data-feather="menu"></i>
                    <span>@lang('words.category')</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="{{ route('products.index') }}" class="nav-link">
                    <i data-feather="grid"></i>
                    <span>@lang('words.product')</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
