<?php
    $var1 = $_POST["inputan_pertama"] ?? "";
echo $var1;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
    </head>
         <body>

            <form action="" method="POST">
                <input type="text" name="inputan_pertama" value=""\>

                <button type="submit" name="proses_data">
                            PROSES DATA
                </button>


            </form>
    
        </body>
</html>