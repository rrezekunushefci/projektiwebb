<?php
session_start(); 

function validateAdminCredentials($username, $password) {
  
    $db = new mysqli('localhost', 'root', '', 'projektiw');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }


    $stmt = $db->prepare("SELECT id, username FROM users WHERE username = ? AND password = ? AND role = 'admin'");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($adminId, $adminName);
    $stmt->fetch();
    $stmt->close();

  
    $db->close();

    if ($adminId) {
      
        $_SESSION['admin_id'] = $adminId;
        $_SESSION['admin_name'] = $adminName;
        
        header("Location: admindash.php");
        exit(); 
    } else {
       
        
        header("Location: login.php?error=1");
        exit(); 
    }
}


$admin_username = "AnesaB";
$admin_password = "Anesa123@";
validateAdminCredentials($admin_username, $admin_password);



require_once('produktet.php');
$dhenat = new Products();
$all = $dhenat->ReadData();

class AdminPanel
{
    private $adminName = "";
    private $db;
    private $all;

    public function __construct($all, $adminName)
    {
        $this->db = new mysqli('localhost', 'root', '', 'projektiw');

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }

        $this->all = $all; 
        $this->adminName = $adminName; 

        
        if (isset($_SESSION['admin_id'])) {
            $admin_id = $_SESSION['admin_id'];

            $stmt = $this->db->prepare("SELECT username FROM users WHERE id = ? AND role = 'admin'");
            $stmt->bind_param("i", $admin_id);
            $stmt->execute();
            $stmt->bind_result($adminName);
            $stmt->fetch();
            $stmt->close();

            if (!empty($adminName)) {
                $this->adminName = $adminName;
            }
        }
    }

    private function getUsersStatistics()
    {
        $totalUsersQuery = "SELECT COUNT(id) as total_users FROM users";
        $result = $this->db->query($totalUsersQuery);

        if ($result) {
            $row = $result->fetch_assoc();
            $totalUsers = $row['total_users'];
        } else {
            $totalUsers = 0;
        }

        $recentlyAddedUsersQuery = "SELECT id, username, DATE(created_at) as created_at FROM users ORDER BY created_at DESC LIMIT 3";
        $result = $this->db->query($recentlyAddedUsersQuery);

        if ($result) {
            $recentlyAddedUsers = [];
            while ($row = $result->fetch_assoc()) {
                $recentlyAddedUsers[] = $row;
            }
        } else {
            $recentlyAddedUsers = [];
        }

        return [
            'totalUsers' => $totalUsers,
            'recentlyAddedUsers' => $recentlyAddedUsers,
        ];
    }

    private function getProductsStatistics()
    {
        $totalProductsQuery = "SELECT COUNT(id) as total_products FROM products";
        $result = $this->db->query($totalProductsQuery);

        if ($result) {
            $row = $result->fetch_assoc();
            $totalProducts = $row['total_products'];
        } else {
            $totalProducts = 0;
        }

        $recentlyAddedProductsQuery = "SELECT id, name, price, DATE(created_at) as created_at FROM products ORDER BY created_at DESC LIMIT 3";
        $result = $this->db->query($recentlyAddedProductsQuery);

        if ($result) {
            $recentlyAddedProducts = [];
            while ($row = $result->fetch_assoc()) {
                $recentlyAddedProducts[] = $row;
            }
        } else {
            $recentlyAddedProducts = [];
        }

        return [
            'totalProducts' => $totalProducts,
            'recentlyAddedProducts' => $recentlyAddedProducts,
        ];
    }

    private function getAdminUserActivity()
    {
        $userActivity = ['Activity 1', 'Activity 2', 'Activity 3'];
        return $userActivity;
    }

    public function renderHeader()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Panel</title>
        </head>
        <body>
            <div class="admin-name">
                <?php echo $this->adminName; ?>
            </div>
          
            <div class="background-container">
            </div>
            <nav class="navbar">
                <img src="logo.png" class="logo">
                <div class="navbar-links">
                    <a href="Tour.php" class="nav-link">TOURS</a>
                    <a href="rezervimet.php" class="nav-link">BOOKINGS</a>
                    <a href="kontaktet.php" class="nav-link">CONTACTS/MESSAGE</a>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
                <i class='bx bx-bell' style='color:#fff'></i>
                <div class="admin-photo" id="adminPhoto">
                    <?php
                    if (isset($_SESSION['admin_id'])) {
                        $admin_id = $_SESSION['admin_id'];

                        $query = "SELECT photo_path FROM users WHERE id = $admin_id";
                        $result = $this->db->query($query);

                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $photo_path = $row['photo_path'];
                            echo '<img src="' . $photo_path . '" alt="Admin Photo">';
                        } else {
                           
                        }
                    } else {
                        
                        echo '<img src="user.png" alt="Admin Photo" width="70" height="70">';
                    }
                    ?>
                </div>
                <div class="dropdown" id="dropdownMenu">
                    <?php  
                    $this->renderDropdownItems();
                    ?>
                </div>
            </nav>
            <div class="dashboard">
                <div class="card">
                    <h3>TOTAL USERS</h3>
                    <p>
                        <?php echo $this->getUsersStatistics()['totalUsers']; ?>
                    </p>
                    <h3>Recently Added</h3>
                    <ul>
                        <?php foreach ($this->getUsersStatistics()['recentlyAddedUsers'] as $user): ?>
                            <li>
                                <?php echo $user['username']; ?> (
                                <?php echo date('Y-m-d', strtotime($user['created_at'])); ?>)
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="card">
                    <h3>TOTAL PRODUCTS</h3>
                    <p>
                        <?php echo $this->getProductsStatistics()['totalProducts']; ?>
                    </p>
                    <h3>Recently Added </h3>
                    <ul>
                        <?php foreach ($this->getProductsStatistics()['recentlyAddedProducts'] as $product): ?>
                            <li>
                                <?php echo $product['name']; ?> (
                                <?php echo date('Y-m-d', strtotime($product['created_at'])); ?>)
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="card">
                    <h3> User Activity</h3>
                    <ul>
                        <?php foreach ($this->getAdminUserActivity() as $activity): ?>
                            <li>
                                <?php echo $activity; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div id="a1">
                <header>
                    <a href="insert.php"><Button id='r'>INSERT</Button></a>
                </header>
                <table>
                    <hr>
                    <p>PRODUCTS DATA LIST</p>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach ($this->all as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['price'] ?></td>
                            <td><?= $value['description'] ?></td>
                            <td><?= $value['created_at'] ?></td>
                            <td id='de'><a href="delete.php?id=<?php echo $value['id'] ?>"><button id="d">DELETE</button></a>
                                <a href="edit.php?id=<?php echo $value['id'] ?>"><button id='e'>EDIT</button></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <div id="a1">
                <table>
                    <hr>
                    <p>USERS DATA LIST</p>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Created_at</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $query = "SELECT id, username, created_at, role, email FROM users";
                    $result = $this->db->query($query);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td><?php echo $row['role']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td id='de'><a href="deleteu.php?id=<?php echo $row['id'] ?>"><button id="d">DELETE</button></a>
                                    <a href="editu.php?id=<?php echo $row['id'] ?>"><button id='e'>EDIT</button></a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='5'>No users found</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <?php
        }

    private function renderDropdownItems()
    {
        ?>
        <div class="dropdown-content">
            <div class="admin-info">
                <p class="admin-name">
                    <?php echo $this->adminName; ?>
                </p>
            </div>
            <a href="switch_account.php" class="dropdown-item">Switch Account</a>
            <a href="change_password.php" class="dropdown-item">Change Password</a>
            <a href="login.php" class="dropdown-item">Log out</a>
        </div>
        <?php
    }

    public function renderFooter()
    {
        $this->db->close();
        ?>
        </body>
        </html>
        <?php
    }
}

$adminPanel = new AdminPanel($all);
$adminPanel->renderHeader();
$adminPanel->renderFooter();
?>













