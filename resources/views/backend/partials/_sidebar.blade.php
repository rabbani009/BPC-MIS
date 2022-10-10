<div class="sidebar">
    <nav class="mt-2">
        <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
        >
            <li
                class="nav-item @if($commons['main_menu'] == 'dashboard') menu-open @endif"
            >
                <a
                    href="{{ route('get.dashboard') }}"
                    class="nav-link @if($commons['main_menu'] == 'dashboard') active @endif"
                >
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Widgets
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas far fa-chart-bar"></i>
                  <p>
                    REPORTS
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('program.report') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Program <span class="badge badge-danger">Wise</span> Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('trainee.report') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Trainee <span class="badge badge-danger">Info</span> Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('trainer.report') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Trainer <span class="badge badge-danger">info</span> Report</p>
                    </a>
                  </li>
                 
                </ul>
              </li>

            <li class="nav-header">ACTIVITIES</li>
            <li
                class="nav-item @if($commons['main_menu'] == 'activity') menu-open @endif"
            >
                <a
                    href="{{ route('activity.create') }}"
                    class="nav-link @if($commons['current_menu'] == 'activity_create') active @endif"
                >
                    <i class="nav-icon fas fa-plus"></i>
                    <p>Add</p>
                </a>
            </li>
            <li
                class="nav-item @if($commons['main_menu'] == 'activity') menu-open @endif"
            >
                <a
                    href="{{ route('activity.index') }}"
                    class="nav-link @if($commons['current_menu'] == 'activity_index') active @endif"
                >
                    <i class="nav-icon fas fa-list"></i>
                    <p>List</p>
                </a>
            </li>

            <li class="nav-header">MISCELLANEOUS</li>
            <li
                class="nav-item @if($commons['main_menu'] == 'council') menu-open @endif"
            >
                <a
                    href="#"
                    class="nav-link @if($commons['main_menu'] == 'council') active @endif"
                >
                    <i class="nav-icon fas fa-solid fa-network-wired"></i>
                    <p>
                        Council
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a
                            href="{{ route('council.create') }}"
                            class="nav-link @if($commons['current_menu'] == 'council_create') active @endif"
                        >
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="{{ route('council.index') }}"
                            class="nav-link @if($commons['current_menu'] == 'council_index') active @endif"
                        >
                            <i class="fas fa-list nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item @if($commons['main_menu'] == 'association') menu-open @endif"
            >
                <a
                    href="#"
                    class="nav-link @if($commons['main_menu'] == 'association') active @endif"
                >
                    <i class="nav-icon fas fa-project-diagram"></i>
                    <p>
                        Association
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a
                            href="{{ route('association.create') }}"
                            class="nav-link @if($commons['current_menu'] == 'association_create') active @endif"
                        >
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="{{ route('association.index') }}"
                            class="nav-link @if($commons['current_menu'] == 'association_index') active @endif"
                        >
                            <i class="fas fa-list nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item @if($commons['main_menu'] == 'program') menu-open @endif"
            >
                <a
                    href="#"
                    class="nav-link @if($commons['main_menu'] == 'program') active @endif"
                >
                    <i class="nav-icon fas fa-skating"></i>
                    <p>
                        Program
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a
                            href="{{ route('program.create') }}"
                            class="nav-link @if($commons['current_menu'] == 'program_create') active @endif"
                        >
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="{{ route('program.index') }}"
                            class="nav-link @if($commons['current_menu'] == 'program_index') active @endif"
                        >
                            <i class="fas fa-list nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item @if($commons['main_menu'] == 'trainer') menu-open @endif"
            >
                <a
                    href="#"
                    class="nav-link @if($commons['main_menu'] == 'trainer') active @endif"
                >
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                        TRAINER
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a
                            href="{{ route('trainer.create') }}"
                            class="nav-link @if($commons['current_menu'] == 'trainer_create') active @endif"
                        >
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="{{ route('trainer.index') }}"
                            class="nav-link @if($commons['current_menu'] == 'trainer_index') active @endif"
                        >
                            <i class="fas fa-list nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item @if($commons['main_menu'] == 'trainee') menu-open @endif"
            >
                <a
                    href="#"
                    class="nav-link @if($commons['main_menu'] == 'trainee') active @endif"
                >
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>
                        TRAINEE
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a
                            href="{{ route('trainee.create') }}"
                            class="nav-link @if($commons['current_menu'] == 'trainee_create') active @endif"
                        >
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="{{ route('trainee.index') }}"
                            class="nav-link @if($commons['current_menu'] == 'trainee_index') active @endif"
                        >
                            <i class="fas fa-list nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-header">USER MANAGEMENT</li>
            <li
                class="nav-item @if($commons['main_menu'] == 'profile') menu-open @endif"
            >
                <a
                    href="{!! route('profile.show', auth()->user()->id) !!}"
                    class="nav-link @if($commons['current_menu'] == 'profile') active @endif"
                >
                    <i class="nav-icon fas fa-user"></i>
                    <p>My Profile</p>
                </a>
            </li>
            <li
                class="nav-item @if($commons['main_menu'] == 'user') menu-open @endif"
            >
                <a
                    href="#"
                    class="nav-link @if($commons['main_menu'] == 'user') active @endif"
                >
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>
                        USER
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a
                            href="{{ route('user.create') }}"
                            class="nav-link @if($commons['current_menu'] == 'user_create') active @endif"
                        >
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="{{ route('user.index') }}"
                            class="nav-link @if($commons['current_menu'] == 'user_index') active @endif"
                        >
                            <i class="fas fa-list nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
