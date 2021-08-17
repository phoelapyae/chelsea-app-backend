<nav class="col-md-2 d-none d-md-block bg-primary sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <!-- User management -->
      <li class="nav-item {{ active_segment(2, 'users') }}">
        <a class="nav-link" data-toggle="collapse" href="#user-dropdown" aria-expanded="false" aria-controls="user-dropdown">
          <i class="menu-icon mdi mdi-account-group"></i>
          <span class="menu-title text-white">User Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ show_segment(2, 'users') }}" id="user-dropdown">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link {{ active_path('users') }} text-white" href="{{ route('users.index') }}">User Lists</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ active_path('users/create') }} text-white" href="{{ route('users.create') }}">Add New User</a>
            </li>
          </ul>
        </div>
      </li>

      <!-- News management -->
      <li class="nav-item {{ active_segment(2, 'news') }}">
        <a class="nav-link" data-toggle="collapse" href="#news-dropdown" aria-expanded="false" aria-controls="news-dropdown">
          <i class="menu-icon mdi mdi-account-group"></i>
          <span class="menu-title text-white">News Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ show_segment(2, 'news') }}" id="news-dropdown">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link {{ active_path('news') }} text-white" href="{{ route('contents.index') }}">News Lists</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ active_path('news/create') }} text-white" href="{{ route('contents.create') }}">Add a new</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>