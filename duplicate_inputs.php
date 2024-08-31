<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>duplicate inputs </title> 
</head>
<?php if (isset( $_GET["submit"]) && $_GET["submit"]==1){
    
    $i=0;
    while ($i<count($_GET["name"])){
           //handel duplicate 
           //add connection 
           //insert to data base 
           $sql="insert into taable (name ,fname) values($_GET[name][$i],$_GET[fname][$i])";
           $i++;
    }
     header("Location: ./duplicate_inputs.php");

}?>
<body>
    <form action="" method="get">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Family Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Check if a specific row was requested to be deleted
                if (isset($_GET["delete"]) && is_numeric($_GET["delete"])) {
                    $deleteIndex = intval($_GET["delete"]);
                    if (isset($_GET["name"][$deleteIndex])) {
                        array_splice($_GET["name"], $deleteIndex, 1);
                        array_splice($_GET["fname"], $deleteIndex, 1);
                    }
                }

                // Filter out null or empty names
                if (isset($_GET["name"]) && is_array($_GET["name"])) {
                    $filteredNames = array_filter($_GET["name"], function($value) {
                        return !empty($value);
                    });
                    $filteredFnames = array_filter($_GET["fname"], function($key) use ($filteredNames) {
                        return !empty($_GET["name"][$key]);
                    }, ARRAY_FILTER_USE_KEY);

                    // Display the filtered records
                    foreach ($filteredNames as $r => $nameValue) {
                        $nameValue = htmlspecialchars($nameValue);
                        $fnameValue = htmlspecialchars($_GET["fname"][$r]);
                        ?>
                        <tr>
                            <td><input type="text" name="name[]" value="<?php echo $nameValue; ?>"></td>
                            <td><input type="text" name="fname[]" value="<?php echo $fnameValue; ?>"></td>
                            <td><button type="submit" name="delete" value="<?php echo $r; ?>">Delete</button></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                <!-- New Row for Adding New Records -->
                <tr>
                    <td><input type="text" name="name[]" placeholder="Enter name"></td>
                    <td><input type="text" name="fname[]" placeholder="Enter family name"></td>
                </tr>
                <tr>
                    <td colspan="3"><button type="submit" name="duplicate" value="1">Duplicate Last Record</button></td>
                </tr>
            </tbody> 
        </table>
        <td><button type="submit" name="submit" value="1">submit</button></td>
    </form>
</body>

</html>
