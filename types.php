<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
include('header.php');
include('menu.php');
require('db.php');
$typeSql = "SELECT * FROM type";
$typeData = $pdo->query($typeSql);

$logUser = $_SESSION['user'];
?>
<div class="main-box">
    <div class="d-flex justify-content-end mb-5">
        <a href="create-type.php">
            <button class="btn btn-success">Create</button>
        </a>
    </div>
    <h2 class="mb-3">Types</h2>

    <?php

    if ($typeData) {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-hover'>";
        echo "<thead> <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
        </tr> </thead>";

        foreach ($typeData as $row) {
            echo "<tbody> <tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";

            echo "</tr> </tbody>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "Error fetching data";
    }
    ?>

</div>

<?php
include('footer.php');
?>