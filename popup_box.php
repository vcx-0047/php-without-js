<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #EEEEEE;
            color: #373A40;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            margin: 20px;
        }

        button {
            background-color: #DC5F00;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #b94b00;
        }

        .window {
            position: fixed;
            background-color: #686D76;
            color: #FFFFFF;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 9999999999999999999999;
        }

        .window h1 {
            margin-top: 0;
        }

        .window form {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <form action="" method="get">
        <input type="hidden" name="openwindo" value="1">
        <button>Open</button>
    </form>

    <?php 
    if(isset($_GET["openwindo"]) && $_GET["openwindo"] == "1") { 
    ?>
    <div class="window">
        <h1>Hello World!</h1>
        <form action="" method="get">
            <input type="hidden" name="openwindo" value="0">
            <button>Close</button>
        </form>
    </div>
    <?php
    }
    ?>
</body>

</html>
