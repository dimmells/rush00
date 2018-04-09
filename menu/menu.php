
<div>
  <nav class="menu">
    <ul id = "adm_menu">
        <li><a href="../index.php">SHOP</a></li>
        <li><a href="admin_panel.php">MAIN ADM</a></li>
        <li><a href="add_item.php">ADD_ITEM</a></li>
        <li><a href="hndl_users.php">USERS</a></li>
        <li><a href="orders.php">ORDERS</a></li>
        <li><a href="categories.php">CATEGORIES</a></li>
    <?php

    if (isset($_SESSION["loged_on_user"]))
    {
        echo "<li ><a href = '../logout.php' > Logout </a ></li >";
    }
    ?>
    </ul>
  </nav>
</div>


