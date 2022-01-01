        <section>
            <div class="sidebar d-flex flex-column flex-shrink-0 p-3 bg-light">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto  text-decoration-none">
                    <span class="fs-4 projectN">project name</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link active" aria-current="page">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="title"><?php echo lang('home');?></span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php" class="nav-link ">
                            <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                            <span class="title"><?php echo lang('dashboard');?></span>
                        </a>
                    </li>
                    <li>
                        <a href="board.php" class="nav-link ">
                            <span class="icon"><i class="fas fa-tasks"></i></span>
                            <span class="title"><?php echo lang('board');?></span>
                        </a>
                    </li>
                    <li>
                        <a href="releases.php" class="nav-link ">
                            <span class="icon"><i class="far fa-calendar-check"></i></span>
                            <span class="title"><?php echo lang('release');?></span>
                        </a>
                    </li>
                    <li>
                        <a href="issues.php" class="nav-link ">
                        <span class="icon"><i class="fas fa-hammer"></i></span>
                        <span class="title"><?php echo lang('issue');?></span>
                    </a>
                </li>
                <hr style="width: 90%;">
                <li>
                    <a href="setting.php" class="nav-link ">
                            <span class="icon"><i class="fas fa-cogs"></i></span>
                            <span class="title"><?php echo lang('setting');?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>