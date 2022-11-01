<li
    class="nav-item @if($commons['main_menu'] == 'report') menu-open @endif"
    class="nav-item"
>
    <a
        href="#"
        class="nav-link @if($commons['main_menu'] == 'report') active @endif"
    >
        <i class="nav-icon fas far fa-chart-bar"></i>
        <p>
            REPORTS
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li
            class="nav-item @if($commons['main_menu'] == 'report') menu-open @endif"
        >
            <a
                href="{{ route('program.report') }}"
                class="nav-link @if($commons['current_menu'] == 'Activity-report') active @endif"
            >
                <i class="fa fa-sticky-note" style="font-size: 15px"></i>
                <p>
                    <span class="badge badge-success">Activities info</span>
                    Report
                </p>
            </a>
        </li>

        <li
            class="nav-item @if($commons['main_menu'] == 'report') menu-open @endif"
        >
            <a
                href="{{ route('trainer.report') }}"
                class="nav-link @if($commons['current_menu'] == 'trainer-report') active @endif"
            >
                <i class="fa fa-sticky-note" style="font-size: 15px"></i>
                <p>
                    <span class="badge badge-success">Trainer info</span>
                    Report
                </p>
            </a>
        </li>

        <li
            class="nav-item @if($commons['main_menu'] == 'report') menu-open @endif"
        >
            <a
                href="{{ route('trainee.report') }}"
                class="nav-link @if($commons['current_menu'] == 'trainee-report') active @endif"
            >
                <i class="fa fa-sticky-note" style="font-size: 15px"></i>
                <p>
                    <span class="badge badge-success"> Trainee info</span>
                    Report
                </p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-header">ACTIVITIES</li>
@if(auth()->user()->user_type =='council' || auth()->user()->user_type =='system' )
<li class="nav-item @if($commons['main_menu'] == 'activity') menu-open @endif">
    <a
        href="{{ route('activity.create') }}"
        class="nav-link @if($commons['current_menu'] == 'activity_create') active @endif"
    >
        <i class="nav-icon fas fa-plus"></i>
        <p>Add</p>
    </a>
</li>
@endif
<li class="nav-item @if($commons['main_menu'] == 'activity') menu-open @endif">
    <a
        href="{{ route('activity.index') }}"
        class="nav-link @if($commons['current_menu'] == 'activity_index') active @endif"
    >
        <i class="nav-icon fas fa-list"></i>
        <p>List</p>
    </a>
</li>

<li class="nav-header">MISCELLANEOUS</li>
<li class="nav-item @if($commons['main_menu'] == 'council') menu-open @endif">
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
<li class="nav-item @if($commons['main_menu'] == 'program') menu-open @endif">
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



<li class="nav-item @if($commons['main_menu'] == 'trainer') menu-open @endif">
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
        @if(auth()->user()->user_type =='council' || auth()->user()->user_type =='system' )
        <li class="nav-item">
            <a
                href="{{ route('trainer.create') }}"
                class="nav-link @if($commons['current_menu'] == 'trainer_create') active @endif"
            >
                <i class="fas fa-plus nav-icon"></i>
                <p>Add</p>
            </a>
        </li>
        @endif
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
<li class="nav-item @if($commons['main_menu'] == 'trainee') menu-open @endif">
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
        @if(auth()->user()->user_type =='council' || auth()->user()->user_type =='system' )
        <li class="nav-item">
            <a
                href="{{ route('trainee.create') }}"
                class="nav-link @if($commons['current_menu'] == 'trainee_create') active @endif"
            >
                <i class="fas fa-plus nav-icon"></i>
                <p>Add</p>
            </a>
        </li>
        @endif
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
<li class="nav-item @if($commons['main_menu'] == 'profile') menu-open @endif">
    <a
        href="{!! route('profile.show', auth()->user()->id) !!}"
        class="nav-link @if($commons['current_menu'] == 'profile') active @endif"
    >
        <i class="nav-icon fas fa-user"></i>
        <p>My Profile</p>
    </a>
</li>


<li class="nav-item @if($commons['main_menu'] == 'user') menu-open @endif">
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

