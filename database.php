<?php
function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cf n r";

    // Kết nối cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    return $conn;
}

function fetchShops() {
    $conn = connectDatabase();
    $sql = "SELECT name, address, phone, email, working_hours, description FROM shop";
    $result = $conn->query($sql);
    $shops = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    return $shops;
}

function fetchCategories() {
    $conn = connectDatabase();
    $sql = "SELECT name, description FROM category";
    $result = $conn->query($sql);
    $categories = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    return $categories;
}

function fetchProducts() {
    $conn = connectDatabase();
    $sql = "SELECT name, price, description, image FROM products";
    $result = $conn->query($sql);
    $products = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    return $products;
}
?>
