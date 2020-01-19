<div class="sidebar" data-color="blue">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      {{ __('E-') }}
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      {{ __('VOTING') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

    <li class="@if ($activePage == 'profile') active @endif">
        <a href="{{ route('profile.edit') }}">
        <i class="now-ui-icons users_single-02"></i>
        <p> {{ __("User Profile") }} </p>
        </a>
    </li>
    <li class="@if ($activePage == 'users') active @endif">
        <a href="{{ route('user.index') }}">
        <i class="now-ui-icons design_bullet-list-67"></i>
        <p> {{ __("User Management") }} </p>
        </a>
    </li>


        <!-- Student Module -->
        <li>
        <a data-toggle="collapse" href="#student">
            <i class="now-ui-icons users_single-02"></i>
          <p>
            {{ __("Students") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="student">
          <ul class="nav">
                <li class="@if ($activePage == 'add_student') active @endif">
                    <a href="{{ route('student','add_student') }}">
                    <i class="fas fa-plus"></i>
                    <p>{{ __('Add student') }}</p>
                    </a>
                </li>
                <li class="@if ($activePage == 'edit_student') active @endif">
                    <a href="{{ route('student.edit','edit_student') }}">
                    <i class="fas fa-plus"></i>
                    <p>{{ __('Edit student') }}</p>
                    </a>
                </li>
          </ul>
        </div>


      <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'maps') active @endif">
        <a href="{{ route('page.index','maps') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','typography') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Typography') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
