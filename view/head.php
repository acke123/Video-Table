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
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadatak 1 </title>
    <div class="container">
        <div class="row">
            <input type="text" id="search" class="form-control" onkeyup="search()" placeholder="Search"
                   title="Search"><br>
            <form action="videoList.php" method="get"><br>
                <p>Video list with duration shorter than 60
                    <button type="submit" class="btn btn-primary text-white">Is here</button>
                </p>
                <br>
            </form>
            </head>
<body>