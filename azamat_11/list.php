<?php
require 'google.php';

$success = isset($_GET['success']) && $_GET['success'] == 1;

$sql = "SELECT * FROM  ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("So‘rovda xatolik: " . mysqli_error($conn));
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Foydalanuvchilar</title>
</head>
<body>
  <h2>Foydalanuvchilar</h2>

  <?php if ($success): ?>             
    <p style="color:green">Ma'lumot saqlandi.</p>
  <?php endif; ?>

  <p><a href="create.php">Yangi qo'shish</a></p>

  <table border="1" cellpadding="6">
    <tr>
      <th>ID</th>
      <th>Ism</th>
      <th>Email</th>
      <th>Telefon</th>
      <th>Vaqti</th>
      <th>Amal</th>
    </tr>

    <?php if (mysqli_num_rows($result) > 0): ?>
      <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= htmlspecialchars($row['id']) ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['phone']) ?></td>
          <td><?= htmlspecialchars($row['created_at']) ?></td>
          <td>
            <a href="edit.php?id=<?= urlencode($row['id']) ?>">Edit</a> |
            <a href="delete.php?id=<?= urlencode($row['id']) ?>" onclick="return confirm('O‘chirasizmi?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="6">Jadval bo‘sh</td></tr>
    <?php endif; ?>
  </table>
</body>
</html>

<?php mysqli_free_result($result); ?>