<?php

session_start();
require_once('produktet.php');
$dhenat = new Products();
$all = $dhenat->ReadData();


class AdminPanel
{
    private $adminName;
    private $db;
    private $all;

    public function __construct($all)
    {
        $this->db = new mysqli('localhost', 'root', '', 'projektiw');

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }

        $adminQuery = "SELECT username FROM users WHERE role = 'admin' LIMIT 1";
        $result = $this->db->query($adminQuery);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->adminName = $row['username'];
        } else {
            $this->adminName = "Anesa Bl"; // 
        }
        if (isset($_SESSION['username'])) {
            $this->adminName = $_SESSION['username'];
        } else {
            $this->adminName = "Anesa Bl"; // 
        }


        $this->all = $all;
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

        $recentlyAddedUsersQuery = "SELECT id, username, DATE(created_at) as created_at FROM users ORDER BY created_at DESC LIMIT 5";
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
        $activityQuery = "SELECT p.name AS product_name, p.modified_at AS last_modified, u.username AS admin_username
        FROM products p
        JOIN users u ON p.last_modified_by = u.id
        ORDER BY p.modified_at DESC
        LIMIT 5";
    
        $result = $this->db->query($activityQuery);
    
        $userActivity = [];
    
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $userActivity[] = $row;
            }
        }
    
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
            <link rel="stylesheet" href="admindashh.css">
            <link rel="stylesheet" href="produktet.css">
            <link rel="stylesheet" href="admindashhh.css">
            <script src="admindash.js"></script>
            <link rel="icon" href="logo.png" type="image/png" />
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <title>Admin Panel</title>
        </head>

        <body>
            <div class="background-container">

            </div>
            <nav class="navbar">
                <img src="logo.png" class="logo">
                <div class="navbar-links">
                    <a href="Tour.php" class="nav-link">TOURS</a>
                    <a href="rezervimet.php" class="nav-link">BOOKINGS</a>
                    <a href="kontaktet.php" class="nav-link">CONTACTS/MESSAGE</a>
                </div>
                <a href="" class="admin-photo" id="adminPhoto">
                    <img src="anesa.png" alt="Admin Photo">
                    <div class="dropdown" id="dropdownMenu">
                        <?php
                        $this->renderDropdownItems();
                        ?>
                    </div>
            </nav>

            </div>
            <br>
            <br>
            </div>
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
                    <h3>User Activity</h3>
                    <ul>
                        <?php foreach ($this->getAdminUserActivity() as $activity): ?>
                            <li>
    <?php echo $activity['admin_username']; ?> modified
    <?php echo $activity['product_name']; ?> on
    <?php echo $activity['last_modified']; ?>
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
                            <td>
                                <?php echo $value['name'] ?>
                            </td>
                            <td>
                                <?php echo $value['price'] ?>
                            </td>
                            <td>
                                <?= $value['description'] ?>
                            </td>
                            <td>
                                <?= $value['created_at'] ?>
                            </td>
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
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['username']; ?>
                                </td>
                                <td>
                                    <?php echo $row['created_at']; ?>
                                </td>
                                <td>
                                    <?php echo $row['role']; ?>
                                </td>
                                <td>
                                    <?php echo $row['email']; ?>
                                </td>
                                <td id='de'><a href="deleteu.php?id=<?php echo $value['id'] ?>"><button id="d">DELETE</button></a>
                                    <a href="editu.php?id=<?php echo $value['id'] ?>"><button id='e'>EDIT</button></a>
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
                        <i class='bx bx-user-check'></i>
                        <?php echo $this->adminName; ?>
                    </p>
                </div>

                <a href="change_password.php" class="dropdown-item">Change Password <i class='bx bx-lock-alt'></i></a>
                <a href="login.php" class="dropdown-item">Log out <i class='bx bx-log-out'></i></a>
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