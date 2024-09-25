<?php

$con=mysqli_connect("localhost","root","","neha");

$result = mysqli_query($con, "select * from questions");


$score=0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ</title>
    <link rel="stylesheet" href="./quiz.css"></link>
</head>

<body>
    <form action="" method="post" id="test">
<?php

$i=0;
while($row = mysqli_fetch_row($result)){
    $i++;
    ?>

    <div id="<?php echo $row[0]; ?>" class="quediv">
        <p> <?php echo $i."."; ?> <?php echo $row[1]; ?></p>
        <ol>
            <li>
                <input type="radio" value="1" name="<?php echo $row[0]; ?>"> <?php echo $row[2]; ?> </input>
            </li>
            <li>
                 <input type="radio" value="2" name="<?php echo $row[0]; ?>"> <?php echo $row[3]; ?> </input>
            </li>
            <li>
                 <input type="radio" value="3" name="<?php echo $row[0]; ?>"> <?php echo $row[4]; ?> </input>
            </li>
            <li>
                 <input type="radio" value="4" name="<?php echo $row[0]; ?>"> <?php echo $row[5]; ?> </input>
            </li>
            
        </ol>
    </div>

    <?php

}

?>
<div style="text-align:center;">
    <input type="submit" value="Submit" name="submit" class="submitBtn">
</div>

</form>

<?php

if(isset($_POST['submit'])){
    // print_r($_POST);  
    
    foreach ($_POST as $key => $value) {
        $ans=mysqli_fetch_row(mysqli_query($con, "select * from questions where id='$key' "));
        if($ans[6]==$value){
            $score=$score+1;
        }
    }

    echo "<h2 class='score'> Congratulations! <br> Score: ".$score."</h2>";
    echo "<script> document.getElementById('test').style.display = 'none'; </script>";

}


?>
    
</body>
</html>