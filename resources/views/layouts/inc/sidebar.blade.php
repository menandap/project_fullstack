<div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 d-flex justify-content-center" href="">
        <img src="/dashboard/images/logo-black.png" class="navbar-brand-img h-100" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark {{ Request::is('mydashboard*') ? 'active bg-gradient-info' : '' }} " href="/mydashboard">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark {{ Request::is('mytransaction*') ? 'bg-gradient-info' : '' }} " href="/mytransaction">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_grocery_store</i>
            </div>
            <span class="nav-link-text ms-1">Transaksi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark {{ Request::is('myundangan*') ? 'active bg-gradient-info' : '' }} " href="/myundangan">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">card_giftcard</i>
            </div>
            <span class="nav-link-text ms-1">Undangan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark {{ Request::is('myevent*') ? 'active bg-gradient-info' : '' }} " href="/myevent">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">event_note</i>
            </div>
            <span class="nav-link-text ms-1">Event</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark {{ Request::is('myguest*') ? 'bg-gradient-info' : '' }} " href="/myguest">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">account_box</i>
            </div>
            <span class="nav-link-text ms-1">Tamu</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark {{ Request::is('admins/categories*') ? 'bg-gradient-info' : '' }} " href="/myaccount">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">category</i>
            </div>
            <span class="nav-link-text ms-1">Akun Saya</span>
          </a>
        </li>           
      </ul>
    </div>
    
    