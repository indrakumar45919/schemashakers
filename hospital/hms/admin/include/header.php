<header class="navbar navbar-default navbar-static-top" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <div class="navbar-header">
        <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>
        <a class="navbar-brand" href="#" style="color: #2c3e50;">
            <h2 style="padding-top:20%; font-weight: 600;">HMS</h2>
        </a>
        <a href="#" class="sidebar-toggler pull-right visible-md visible-lg">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>
    </div>

    <div class="navbar-collapse collapse">
        <ul class="nav navbar-right">
            <li style="padding-top:2%">
                <h2 style="color: #2c3e50; font-weight: 500;">Hospital Management System</h2>
            </li>
            
            <li class="dropdown current-user">
            <a href class="dropdown-toggle" data-toggle="dropdown" style="display: flex; align-items: center; gap: 8px;">                
                    <span class="username" style="color: #2c3e50;">
                    <text x="10" y="45" font-size="19">👨‍💼 Admin</text>
                        
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </span>
                </a>
</svg>
                <ul class="dropdown-menu" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <li>
                        <a href="change-password.php" style="color: #2c3e50; display: flex; align-items: center; gap: 8px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            Change Password
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" style="color: #2c3e50; display: flex; align-items: center; gap: 8px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            Log Out
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>

<style>
.navbar-default .navbar-nav > li > a:hover,
.dropdown-menu > li > a:hover {
    background: rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.dropdown-menu {
    border-radius: 8px;
    padding: 5px 0;
}

.dropdown-menu > li > a {
    padding: 8px 20px;
    transition: all 0.3s ease;
}
</style>
