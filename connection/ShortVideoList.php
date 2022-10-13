<?php
require_once 'Database.php';

class ShortVideoList extends Database
{

    public function getTableData()
    {
        $db = $this->getConnection();
        if ($db == false) {
            return 'Connection error #404';
        } else {
            $sql = "SELECT* FROM videodata WHERE duration < 60";
            $query = mysqli_query($db, $sql);
            return mysqli_fetch_all($query);
        }
    }
}

$displayShortVideos = new ShortVideoList();
$displayShortVideos->getTableData()
?>

<table id="myTable">
    <tr>
        <th id="title" onclick="sortTable(0)">Title</th>
        <th id="image" onclick="sortTable(1)">Image</th>
        <th id="thumbnail" onclick="sortTable(2)">Thumbnail</th>
        <th id="duration" onclick="sortDuration()">Duration</th>
        <th id="publish" onclick="sortTable(4)">Publish</th>
    </tr>
    <?php foreach ($displayShortVideos->getTableData() as $data): ?>
        <tr class="<?php if ($data[4] <= 60) {
            echo "p-3 mb-2 bg-primary text-white";
        } elseif (60 < $data[4] && $data[4] <= 120) {
            echo "p-3 mb-2 bg-secondary text-white";
        } elseif ($data[4] > 120) {
            echo "p-3 mb-2 bg-info text-white";
        } ?>">
            <td><?php echo $data[1]; ?></td>
            <td><img src="<?php echo $data[2]; ?>" alt="Image loading error" width="100" height="100"></td>
            <td><img src="<?php echo $data[3]; ?>" alt="Thumbnail loading error" width="100" height="100"></td>
            <td><?php echo $data[4]; ?></td>
            <td><?php echo $data[5]; ?></td>
            <td>
                <button onclick="remove(this)" class="btn btn-danger">Exclude</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
