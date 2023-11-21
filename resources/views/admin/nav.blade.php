<nav class="navbar navbar-expand-lg">
    <div class="container-fluid mx-2 ">
      <a class="navbar-brand link-primary fs-4 fw-bold " href="#">M-Commerce</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex ms-auto " role="search">
          <input class="form-control me-4" type="search" placeholder="Search" aria-label="Search">
        </form>
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle "  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/assets/images/faces/face1.jpg" class=" border border-1 rounded-circle " alt="" width="35" height="35">
              </a>
              <ul class="dropdown-menu dropdown-menu-end ">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                {{-- <li><a class="dropdown-item text-danger " href="#">Log out</a></li> --}}
                <li>
                    <form action="{{url('/admin/logout')}}" method="post" class=" d-flex align-items-center justify-content-between ">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger btn">
                            <i class="bi bi-box-arrow-right text-danger me-1 "></i>
                            Log out
                        </button>
                    </form>
                </li>
              </ul>
            </li>
          </ul>
      </div>
    </div>
  </nav>
