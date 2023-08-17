<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <span class="align-middle">Magicians</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.categories') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Categories</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.brands') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Brands</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.vendors') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Vendors</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.products') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Products</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.purchase_orders') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Purchase Orders</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.inventory') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Inventory</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
