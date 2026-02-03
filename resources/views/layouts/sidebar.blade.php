<nav class="sidebar sidebar-offcanvas" id="sidebar" >
    <ul class="nav">
      <li class="nav-item nav-category">Masters</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link data-bs-toggle="collapse href="{{route('orders') }}" aria-expanded="false" aria-controls="rfq">
          <span class="icon-bg"><i class="mdi mdi-file-document-outline menu-icon"></i></span>
          <span class="menu-title">Orders</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse " id="rfq">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> RFQad</li>
            <li class="nav-item"> JABA</li>
            <li class="nav-item">hwllo</li>
            <li class="nav-item"> How are </li>

          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="{{ route('returns') }}" aria-expanded="false" aria-controls="orders">
          <span class="icon-bg"><i class="mdi mdi-shopping menu-icon"></i></span>
          <span class="menu-title"> Returns & RTO</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="orders">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('orders') }}">Order List</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">Order Revisions</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">Order Confirmation</a></li>
    
            
           
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="{{ route('shipments') }}" aria-expanded="false" aria-controls="production">
          <span class="icon-bg"><i class="mdi mdi-hammer menu-icon"></i></span>
          <span class="menu-title">Shipments</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="production">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Production List </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Users </a></li>
           
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="{{ route('settlements') }}" aria-expanded="false" aria-controls="sales">
          <span class="icon-bg"><i class="mdi mdi-sale menu-icon"></i></span>
          <span class="menu-title">Settlements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="sales">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Production List </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Users </a></li>
           
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="{{ route('products') }}" aria-expanded="false" aria-controls="inventory">
          <span class="icon-bg"><i class="mdi mdi-domain menu-icon"></i></span>
          <span class="menu-title">Products (Catalog)</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="inventory">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Item Master </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Users </a></li>
           
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="{{ route('inventory') }}" aria-expanded="false" aria-controls="material">
          <span class="icon-bg"><i class="mdi mdi-sprout menu-icon"></i></span>
          <span class="menu-title">Inventory</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="material">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Item Master  </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">Material Units </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Material Brands  </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Material Vendors  </a></li>
            
           
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="{{ route('grievances') }}" aria-expanded="false" aria-controls="instruments">
          <span class="icon-bg"><i class="mdi mdi-content-cut menu-icon"></i></span>
          <span class="menu-title">Grievances</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="instruments">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="" Instruments List </a></li>
            
           
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <span class="icon-bg"><i class="mdi mdi-account-group menu-icon"></i></span>
          <span class="menu-title">Manage Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Admins </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Users </a></li>
           
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#hrm" aria-expanded="false" aria-controls="hrm">
          <span class="icon-bg"><i class="mdi mdi-account-multiple menu-icon"></i></span>
          <span class="menu-title">Team Access</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="hrm">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href=""> Employees </a></li>
            <li class="nav-item"> <a class="nav-link" href=""> Department </a></li>
           
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#banks" aria-expanded="false" aria-controls="banks">
          <span class="icon-bg"><i class="mdi mdi-bank menu-icon"></i></span>
          <span class="menu-title">Bank Details</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="banks">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href=""> Accounts </a></li>
            <li class="nav-item"> <a class="nav-link" href=""> Account type </a></li>
            <li class="nav-item"> <a class="nav-link" href="p"> Users </a></li>
           
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#finance" aria-expanded="false" aria-controls="finance">
          <span class="icon-bg"><i class="mdi mdi-finance menu-icon"></i></span>
          <span class="menu-title">Finance</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="finance">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Admins </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Users </a></li>
           
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
          <span class="icon-bg"><i class="mdi mdi-cogs menu-icon"></i></span>
          <span class="menu-title">Settings</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="settings">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href=""> Roles </a></li>
            <li class="nav-item"> <a class="nav-link" href=""> Permissions </a></li>
            <li class="nav-item"> <a class="nav-link" href=""> Notifications </a></li>
            <li class="nav-item"> <a class="nav-link" href=""> System </a></li>
            <li class="nav-item"> <a class="nav-link" href=""> Company </a></li>
            <li class="nav-item"> <a class="nav-link" href=""> Locations </a></li>
            <li class="nav-item"> <a class="nav-link" href=""> Currency  [ CTRL + i ]</a></li>
          </ul>
        </div>
      </li>""
    </ul>
  </nav>