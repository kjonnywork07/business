<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{ asset('/dist/img/AdminLTELogo.png') }}" alt="site Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" ></span><br>

    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="overflow-y: initial;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:void(0)" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @canany(['view_permissions','view_roles','view_users','view_staff'])
            <li class="nav-item {{ (request()->is('*/user-management/*'))? ' menu-open' : '' }}" >
              <a href="#" class="nav-link {{ (request()->is('*/user-management/*'))? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <p>
                  User Management
                  <i class="right fas fa-angle-left"></i>
                  <!-- <span class="badge badge-info right">6</span> -->
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('view_permissions')
                <li class="nav-item">
                  <a href="{{route('permissions')}}" class="nav-link {{ (request()->is('*/permissions/*') || request()->is('*/permissions')) ? 'active' : '' }}">
                    <i class="fas fa-key"></i>

                    <p>Permissions</p>
                  </a>
                </li>
                @endcan
                @can('view_roles')
                <li class="nav-item ">
                  <a href="{{route('roles')}}" class="nav-link {{ (request()->is('*/roles/*') || request()->is('*/roles')) ? 'active' : '' }}">
                  <i class="fas fa-user-lock"></i>
                  
                    <p>Roles</p>
                  </a>
                </li>
                @endcan
                @can('view_users')
                <li class="nav-item ">
                  <a href="{{route('users')}}" class="nav-link {{ (request()->is('*/'. __('crud.users.slug').'/*') || request()->is('*/'. __('crud.users.slug').'')) ? 'active' : '' }}">
                    <i class="fas fa-users-cog"></i>
                    <p>{{ __('crud.users.menu_name')}}</p>
                  </a>
                </li>
                @endcan
                {{-- @can('view_staff')
                <li class="nav-item ">
                  <a href="{{route('staff')}}" class="nav-link {{ (request()->is('*/'.__('crud.staff.slug').'/*') || request()->is('*/'.__('crud.staff.slug').'')) ? 'active' : '' }}">
                  <i class="fas fa-users-cog"></i>
                    <p>{{ __('crud.staff.menu_name')}}</p>
                  </a>
                </li>
                @endcan --}}
                
              </ul>
          </li>  
          @endcanany
          @can('view_customers')
          <li class="nav-item ">
            <a href="{{route('customers')}}" class="nav-link {{ (request()->is('*/'.__('crud.customers.slug').'/*') || request()->is('*/'.__('crud.customers.slug'))) ? 'active' : '' }}">
            <i class="fas fa-user-friends"></i>
              <p>{{ __('crud.customers.menu_name')}}</p>
            </a>
          </li>  
          @endcan
          @can('view_brands')
          <li class="nav-item">
            <a href="{{route('types')}}" class="nav-link {{ (request()->is('*/'.__('crud.types.slug').'/*') || request()->is('*/'.__('crud.types.slug'))) ? 'active' : '' }}">
              <i class="fas fa-shapes"></i>
              <p>{{ __('crud.types.menu_name')}}</p>
            </a>
          </li>  
          @endcan
          @can('view_brands')
          <li class="nav-item">
            <a href="{{route('categories')}}" class="nav-link {{ (request()->is('*/'.__('crud.categories.slug').'/*') || request()->is('*/'.__('crud.categories.slug'))) ? 'active' : '' }}">
              <i class="fas fa-boxes"></i>
              <p>{{ __('crud.categories.menu_name')}}</p>
            </a>
          </li>  
          @endcan
          {{-- @can('view_products')
          <li class="nav-item">
            <a href="{{route('products')}}" class="nav-link {{ (request()->is('products/*') || request()->is('products')) ? 'active' : '' }}">
            <i class="fas fa-boxes"></i>
              <p>Products</p>
            </a>
          </li>  
          @endcan
          @can('view_packages')
          <li class="nav-item">
            <a href="{{route('packages')}}" class="nav-link {{ (request()->is('packages/*') || request()->is('packages')) ? 'active' : '' }}">
            <i class="fas fa-cubes"></i>
              <p>Packages</p>
            </a>
          </li>  
          @endcan --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>