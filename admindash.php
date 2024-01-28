<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admindash.css">
    <script src="admindash.js"></script>
    <link rel="icon" href="logo.png" type="image/png" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
   
</head>

<body>

<?php

session_start();

class AdminPanel
{
    private $adminName;

    public function __construct()
    {
      
        if (isset($_SESSION['admin_name'])) {
            $this->adminName = $_SESSION['admin_name'];
        } else {
            $this->adminName = "Anesa Bl"; 
        }
    }

    public function renderHeader()
    {
        ?>

       
            <nav class="navbar">
                <img src="logo.png" class="logo">
                <div class="navbar-links">
                    <a href="#" class="nav-link">Dashboard Overview</a>
                    <a href="#" class="nav-link">Analytics</a>
                    <a href="#" class="nav-link">Reports</a>
                    <a href="#" class="nav-link">Users/Management</a>
                    <a href="#" class="nav-link">Help/Support</a>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
                
                 <i class='bx bx-bell' style='color:#fff'  ></i>
                </div>
                <a href="" class="admin-photo" id="adminPhoto">
                    <img src="rrezja anesa 1.png" alt="Admin Photo">
                </a>
                <div class="dropdown" id="dropdownMenu">
                    <?php
                    $this->renderDropdownItems();
                    ?>
                </div>
            </nav>
    <?php
        }

        private function renderDropdownItems()
        {
            ?>
            <div class="dropdown-content">
                <div class="admin-info">
                    <p class="admin-name">
                    <i class='bx bx-user-check'></i>
                        <?php echo $this->adminName; ?>
                    </p>
                </div>
                <a href="#" class="dropdown-item">Switch Account <i class='bx bxs-user-account'></i></a>
                <a href="#" class="dropdown-item">Change Password <i class='bx bx-lock-alt'></i></a>
                <a href="logout.php" class="dropdown-item">Log out <i class='bx bx-log-out'></i></a>
            </div>
            <?php
        }
        
        


        public function renderFooter()
        {
            ?>
            <!-- page content-->

           
        </body>

        </html>
<?php
        }
    }

    $adminPanel = new AdminPanel();
    $adminPanel->renderHeader();

    $adminPanel->renderFooter();
?>









