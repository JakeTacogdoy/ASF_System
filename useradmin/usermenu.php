<ul class="navbar-nav  sidebar sidebar-dark accordion"  id="accordionSidebar" 
style="background: linear-gradient(36deg, #515bf0,#515bf0);;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../useradmin/index.php">
              <div class="sidebar-brand-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SwineSight</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
             <li class="nav-item active">
                <a class="nav-link" href="../useradmin/index.php">
                <i class="fa-solid fa-gauge" style="color: #ffffff;"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>


            <!-- Nav Item - Tables -->


            <li class="nav-item">
                <a class="nav-link" href="messageconvo.php">
                <i class="fa-solid fa-message"></i>
                    <span>Message</span></a>
            </li>

          
            <li class="nav-item">
    <a class="nav-link" href="../useradmin/warningreceive.php" id="warnings-link">
        <i class="fas fa-fw fa-table"></i>
        <span>Warnings</span>
        <?php
        // Check if there are warnings (you should implement this logic)
        $hasWarnings = true; // Replace with your actual logic to check for warnings

        if ($hasWarnings) {
            echo '<span id="new-warning-badge" class="badge badge-danger ml-2">New</span>';
        }
        ?>
    </a>
</li>



            <li class="nav-item">
                <a class="nav-link" href="uservideo.php">
                <i class="fa-solid fa-video"></i>
                    <span>Videos</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="News.php">
                <i class="fa-solid fa-newspaper"></i>
                    <span>News</span></a>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>