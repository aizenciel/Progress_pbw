<form method="GET" action="index.php">
    <input type="text" name="search" placeholder="Cari...">
    <button type="submit">Search</button>
</form>

<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil nilai pencarian dari form
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Buat query pencarian
$sql = "SELECT * FROM data_table WHERE column_name LIKE '%$search%'";

// Eksekusi query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Search</title>
</head>
<body>
    <!-- Formulir Pencarian -->
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Cari..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>

    <!-- Tampilkan Hasil Pencarian -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Edit</a>
                            <a href='delete.php?id={$row['id']}'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No results found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>


// Buat query pencarian dengan prepared statement
$stmt = $conn->prepare("SELECT * FROM data_table WHERE column_name LIKE ?");
$search_param = "%$search%";
$stmt->bind_param("s", $search_param);

// Eksekusi query
$stmt->execute();
$result = $stmt->get_result();

