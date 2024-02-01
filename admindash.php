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

        if (isset($_SESSION['admin_name'])) {
            $this->adminName = $_SESSION['admin_name'];
        } else {
            $this->adminName = "Anesa Bl";
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

        $recentlyAddedProductsQuery = "SELECT id, name, price, DATE(created_at) as created_at FROM products ORDER BY created_at DESC LIMIT 5";
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

    private function getLastPublishments()
    {
        $publishments = ['Publishment 1', 'Publishment 2', 'Publishment 3'];
        return $publishments;
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
                    <a href="Home.php" class="nav-link">HOME</a>
                    <a href="Tour.php" class="nav-link">TOURS</a>
                    <a href="aboutus.php" class="nav-link">ABOUT US</a>
                    <a href="contact.php" class="nav-link">CONTACT US</a>
                    <a href="#" class="nav-link">Help/Support</a>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
                <i class='bx bx-bell' style='color:#fff'></i>
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
                    <h3> Recent Publications</h3>
                    <ul>
                        <?php foreach ($this->getLastPublishments() as $publishment): ?>
                            <li>
                                <?php echo $publishment; ?>
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