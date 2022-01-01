                        <div class="profile">
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center  text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo $img;?>/1.png" alt="" width="32" height="32" class="rounded-circle me-2">
                                    <strong>beko</strong>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                    <li><a class="dropdown-item" href="edit-user.php?page=EditU&userId=<?php echo $_SESSION['id'] ; ?>"><i class="fas fa-user-circle"></i><?php echo lang('profile');?></a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i><?php echo lang('settings');?></a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i><?php echo lang('logout');?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- row one end -->
        </header>