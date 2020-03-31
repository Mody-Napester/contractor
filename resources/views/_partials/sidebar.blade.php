<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                @if(\App\User::hasAuthority('use.authorization'))
                <li class="text-muted menu-title">Security</li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Authorization </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        @if(\App\User::hasAuthority('index.permission_groups'))
                        <li><a href="{{ route('permission-groups.index') }}">Permission Groups</a></li>
                        @endif

                        @if(\App\User::hasAuthority('index.permissions'))
                        <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
                        @endif

                        @if(\App\User::hasAuthority('index.roles'))
                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                        @endif
                    </ul>
                </li>
                @endif

                @if(\App\User::hasAuthority('use.resources'))
                <li class="text-muted menu-title">Resources</li>
                    @if(\App\User::hasAuthority('index.users'))
                        <li class="has_sub">
                            <a href="{{ route('users.index') }}" class="waves-effect"><i class="ti-user"></i> <span> Users </span></a>
                        </li>
                    @endif
                    @if(\App\User::hasAuthority('index.leads'))
                        <li class="has_sub">
                            <a href="{{ route('leads.index') }}" class="waves-effect"><i class="ti-user"></i> <span> Contacts </span></a>
                        </li>
                    @endif
                @endif

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>