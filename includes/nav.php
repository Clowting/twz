<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php">TWZ - administratie surveillanten</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <?php if(hasSession($config, $auth)){echo'
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Instellingen</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.php?option=logout"><i class="fa fa-sign-out fa-fw"></i> Uitloggen</a>
                </li>
                </ul>

            <!-- /.dropdown-user -->
        </li>
        ';}
        ?>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Hoofdpagina</a>
                </li>
                <li>
                    <a href="tables.php"><i class="fa fa-envelope fa-fw"></i> Contact</a>
                </li><?php if(isset($user) && isAdmin($user)){echo'
                <li>
                    <a href="#"><i class="fa fa-user-plus fa-fw"></i> Admin<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="surveillant.php"><i class="fa fa-users fa-fw"></i> Surveillanten</a>
                        </li>
                        <li>
                            <a href="academie.php"><i class="fa fa-university fa-fw"></i> Opleidingen/Academies</a>
                        </li>
                        <li>
                            <a href="tentamen_rooster.php"><i class="fa fa-calendar-o fa-fw"></i> Tentamenroosters</a>
                        </li>
                        <li>
                            <a href="rooster.php"><i class="fa fa-calendar fa-fw"></i> Roosters</a>
                        </li>
                    </ul>

                    <!-- /.nav-second-level -->
                </li>
                ';}
                if(isset($user) && isUser($user)){echo'
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Surveillant<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="self.php"><i class="fa fa-cogs"></i> Account</a>
                        </li>
                        <li>
                            <a href="availability.php"><i class="fa fa-calendar-o fa-fw"></i>Beschikbaarheid</a>
                        </li>
                        <li>
                            <a href="self_rooster.php"><i class="fa fa-calendar fa-fw"></i>Rooster</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                ';}?>
            </ul>
        </div>

        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>