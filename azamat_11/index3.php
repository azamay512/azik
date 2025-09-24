<?php
include 'db.php';

$sql = "SELECT * FROM user";
$stmt = $conn->query($sql);

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<h2>foydalanuvchilar</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>id</th><th>ism</th><th>email</th><th>ammallar</th>
    </tr>
    <?php foreach($rows as $row) : ?>
        <tr>
            <td><?=htmlspecialchars($row['id']); ?></td>
            <td><?=htmlspecialchars($row['name']); ?></td>
            <td><?=htmlspecialchars($row['email']); ?></td>
            <td>
                <a href="update.php?id=<?=$row['id'];?>">tahrirlash</a>
                <a href="delete.php?id=<?=$row['id'];?>" onclick="return confirm('rostdan ham ochirmoqchimisiz')">o'chirish</a>

            </td>
        </tr>
        <?php endforeach;?>
</table>