<?php
require_once 'Database.php';

class TableConnectionData extends Database
{
    public function getDataFromTable()
    {
        $db = $this->getConnection();
        if ($db == false) {
            return 'Connection error #404';
        } else {
            $sql = "SELECT* FROM videodata";
            $query = mysqli_query($db, $sql);
            return mysqli_fetch_all($query);
        }
    }

    public function getDataFromUrl()
    {
        $url = 'https://services.brid.tv/services/mrss/latest/1/0/1/25/0.json';
        $json = file_get_contents($url);
        $jsonData = json_decode($json, true);

        if (empty($this->getDataFromTable())) {
            foreach ($jsonData['Video'] as $values) {
                $this->setData(
                    $values['name'], $values['image'], $values['thumbnail'], $values['duration'], $values['publish']
                );
            }
        }
    }

    public function setData($name, $image, $thumbnail, $duration, $publish)
    {
        $sql = "INSERT INTO videodata (title, image, thumbnail, duration, publish) 
VALUES ('$name', '$image', '$thumbnail', '$duration', '$publish')";
        $conn = $this->getConnection();
        mysqli_query($conn, $sql);
    }
}

$displayName = new TableConnectionData();
$displayName->getDataFromUrl();
?>
<table id="myTable">
    <tr>
        <th id="title" onclick="sortTable(0)">Title</th>
        <th id="image" onclick="sortTable(1)">Image</th>
        <th id="thumbnail" onclick="sortTable(2)">Thumbnail</th>
        <th id="duration" onclick="sortDuration()">Duration</th>
        <th id="publish" onclick="sortTable(4)">Publish</th>
    </tr>
    <?php foreach ($displayName->getDataFromTable() as $key => $data): ?>
        <tr id="<?php echo $key; ?>" class="<?php if ($data[4] <= 60) {
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

