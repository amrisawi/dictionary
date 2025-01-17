
<form method="post">
    <input type="text" name="word" placeholder="Enter a word">
    <button type="submit">Search</button>
</form>
<?php
$conn = new mysqli('localhost', 'root', 'Pass_2002', 'DictionaryDB');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $word = $_POST['word'];
    $sql = "SELECT definition FROM words WHERE word='$word'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $word = $_POST['word'];
        $row = $result->fetch_assoc();
        echo "Wword: ". $_POST['word'] . "<br>Definition: " . $row['definition'];
    } else {
        echo "Word not found.";
    }
}
?>
