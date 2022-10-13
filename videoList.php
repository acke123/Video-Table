<!DOCTYPE html>
<html lang="en">
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 60%;
        position: center;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    h1 {
        text-align: center;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video List</title>
</head>
<body>
<div class="container">
    <h1 class="center">Video list</h1>
    <div class="row">
        <input type="text" id="search" class="form-control" onkeyup="search()" placeholder="Search" title="Search"><br>
        <a href="index.php" class="btn btn-primary position-relative ">Go back</a>
        <div class="col-6 offset-4">
            <?php require 'connection/ShortVideoList.php'; ?>
        </div>
    </div>
</div>
<script src="script/sorting.js"></script>
<script src="script/search.js"></script>
<script src="script/exclude.js"></script>
</body>
</html>

