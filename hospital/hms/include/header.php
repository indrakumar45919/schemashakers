<header class="navbar navbar-default navbar-static-top" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <div class="navbar-header">
        <!-- Sidebar toggle for mobile -->
        <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg">
            <svg width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </a>

        <!-- Brand Name -->
        <a class="navbar-brand" href="#" style="color: #2c3e50;">
            <h2 style="padding-top: 20%; font-weight: 600;">HMS</h2>
        </a>

        <!-- Sidebar toggle for desktop -->
        <a href="#" class="sidebar-toggler pull-right visible-md visible-lg">
            <svg width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </a>
    </div>

    <!-- Navbar Right -->
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-right">

            <!-- System Title -->
            <li style="padding-top: 2%;">
                <h2 style="color: #2c3e50; font-weight: 500;">Hospital Management System</h2>
            </li>

            <!-- Current User Dropdown -->
            <li class="dropdown current-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="display: flex; align-items: center; gap: 8px;">
                    <img src="assets/images/images.jpg" alt="User Avatar" style="border-radius: 50%; width: 35px; height: 35px; object-fit: cover;">
                    <span class="username" style="color: #2c3e50;">
                        <?php 
                            $query = mysqli_query($con, "SELECT fullName FROM users WHERE id='" . $_SESSION['id'] . "'");
                            while($row = mysqli_fetch_array($query)) {
                                echo htmlentities($row['fullName']);
                            }
                        ?>
                        <svg width="16" height="16" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </span>
                </a>

                <!-- Dropdown Menu -->
                <ul class="dropdown-menu" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <li>
                        <a href="edit-profile.php" style="color: #2c3e50; display: flex; align-items: center; gap: 8px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            My Profile
                        </a>
                    </li>
                    <li>
                        <a href="change-password.php" style="color: #2c3e50; display: flex; align-items: center; gap: 8px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            Change Password
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" style="color: #2c3e50; display: flex; align-items: center; gap: 8px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                <polyline points="16 17 21 12 16 7" />
                                <line x1="21" y1="12" x2="9" y2="12" />
                            </svg>
                            Log Out
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</header>