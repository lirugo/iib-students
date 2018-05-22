    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            {{--Full size nav-left--}}
            <h3>
                <img src="/uploads/avatars/default.png" style="float: left;" class="m-r-15" width="50px">
                <p>
                    Benjamin
                    Franklin
                </p>
            </h3>
            {{--Collapse bar--}}
            <strong>
                <img src="/uploads/avatars/default.png" width="35px">
            </strong>
        </div>
        <ul class="list-unstyled">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-bell"></i>
                    Notif
                </a>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-graduation-cap"></i>
                    Educational materials
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a href="#">Page 1</a></li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-address-card"></i>
                    Marks
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-calendar-check-o"></i>
                    Calendar
                </a>
            </li>
        </ul>
        <ul class="components"></ul>
        <ul class="list-unstyled ">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    Profile
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-key"></i>
                    Change password
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-sign-out"></i>
                    Logout
                </a>
            </li>
        </ul>
    </nav>




