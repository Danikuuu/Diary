<?php
require_once("connection.php");
if (isset($_POST['delete'])) {
    $data = getPost();
    $id = $data[0];
    $delete_Query =  "DELETE FROM diaryentry WHERE id='$id'";
    try {
        $delete_Result = mysqli_query($connect, $delete_Query);
        if ($delete_Result) {
            if (mysqli_affected_rows($connect) > 0) {
                echo "Data Deleted";
            } else {
                echo "Data Not Deleted";
            }
        }
    } catch (Exception $ex) {
        echo "Error " . $ex->getMessage();
    }
}
$sql = "SELECT title, category, date, entry FROM diaryentry";
$result = $conn->query($sql);
?>

<!-- ... rest of your HTML code ... -->

<?php
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo '<div style="background-image:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo_Jt7ueP3OUdTdxYmkvLOtxHnzBMiRHR38A&usqp=CAU)">';
        echo '<center><h3>Title</p>';
        echo '<h3>' . $row["title"] . '</h3>';
        echo '<h3>Category</p>';
        echo '<h3>' . $row["category"] . '</h3>';
        echo '<h3>Date</p>';
        echo '<h3>' . $row["date"] . '</h3>';
        echo '</center>';
        echo '</div>';
        echo '<div style="background-image:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo_Jt7ueP3OUdTdxYmkvLOtxHnzBMiRHR38A&usqp=CAU)">';
        echo '<p class="dear">Dear Diary,</p>';
        echo '<br>';
        echo '<p>' . $row["entry"] . '</p>';
        echo '</div>';
    }
}
?>
