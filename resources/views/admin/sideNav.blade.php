<div class="col-2">
    <ul class="nav nav-underline px-4 flex-column" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link link-dark" href="{{url('/admin')}}">
                <i class="bi bi-house-door-fill me-1 "></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark " href="{{route('category.index')}}">
                <i class="bi bi bi-grid-1x2-fill me-1 "></i>
                Category
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark "  href="{{route('brand.index')}}">
                <i class="bi bi-award-fill me-1 "></i>
                Brand
            </a>
        </li>
        <li class="nav-item" >
            <a class="nav-link link-dark " href="{{route('color.index')}}">
                <i class="bi bi-palette-fill me-1 "></i>
                Color
            </a>
        </li>
        <li class="nav-item" >
            <a class="nav-link link-dark " href="{{route('product.index')}}">
                <i class="bi bi-phone-fill"></i>
                Product
            </a>
        </li>
        {{-- <li class="nav-item" >
            <a class="nav-link link-dark " href="{{url('admin/product-add-transaction')}}">
                <i class="bi bi-currency-exchange"></i>
                Product Transactions
            </a>
        </li> --}}

        <li class=" nav-item dropdown">
            <button class="nav-link link-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-currency-exchange"></i>
                Product Transactions
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{url('admin/product-add-transaction')}}">Added Transactions</a></li>
              <li><a class="dropdown-item" href="{{url('admin/product-remove-transaction')}}">Removed Transactions</a></li>
            </ul>
          </li>

    </ul>
</div>
