<!-- <img src="' . $imageUrl . '" alt="Image"> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sliders</title>
    <link rel="icon" type="image/x-icon" href="../nya-logo.jpg">
    <style>
        body{
    background-color: #eaeaea;
    overflow: hidden;
}

.container{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 900px;
    height: 600px;
    padding: 50px;
    background-color: #f5f5f5;
    box-shadow: 0 30px 50px #dbdbdb;
}

#slide{
    width: max-content;
    margin-top: 50px;
}

.item{
    width: 200px;
    height: 300px;
    background-position: 50% 50%;
    display: inline-block;
    transition: 0.5s;
    background-size: cover;
    position: absolute;
    z-index: 1;
    top: 50%;
    transform: translate(0, -50%);
    border-radius: 20px;
    box-shadow: 0 30px 50px #505050;
}

.item:nth-child(1),
.item:nth-child(2){
    left: 0;
    top: 0;
    transform: translate(0,0);
    border-radius: 0;
    width: 100%;
    height: 100%;
    box-shadow: none;
}
.item:nth-child(3){
    left: 50%;
}
.item:nth-child(4){
    left: calc(50% + 220px);
}
.item:nth-child(5){
    left: calc(50% + 440px);
}
.item:nth-child(n+6){
    left: calc(50% + 660px);
    opacity: 0;
}
.content{
    position: absolute;
    top: 50%;
    left: 100px;
    width: 300px;
    text-align: left;
    padding: 0;
    color: black;
    transform: translate(0, -50%);
    display: none;
    font-family: system-ui;
}

.item:nth-child(2) .content{
    display: block;
    z-index: 11111;
}
.item .none{
    
    font-size: 40px;
    font-weight: bold;
    opacity: 0;
    animation: showcontent 1s ease-in-out 1 forwards
}
.item .des{
    margin: 20px 0;
    opacity: 0;
    animation: showcontent 1s ease-in-out 1 forwards
}
.item button{
    padding: 10px 20;
    border: none;
    opacity: 0;
    animation: showcontent 1s ease-in-out 1 forwards
}

@keyframes showcontent{
    from{
        opacity: 0;
        transform: translate(0, 100px);
        filter: blur(33px);
    }to{
        opacity: 1;
        transform: translate(0,0);
        filter: blur(0);
    }
}
.buttons{
    position: absolute;
    bottom: 30px;
    z-index: 222222;
    text-align: center;
    width: 100%;
}
.buttons button{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: 1px solid #555;
    transition: 0.5s;
}
.buttons button:hover{
    background-color: #10100c;
}


    </style>
</head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<body>
    <div class="container">
        <div id="slide">
                        <!-- an item starts here -->
                        <?php
// Connect to your MySQL database
include("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve image path from the database
$sql = "SELECT * FROM `medicines` ";

$response = mysqli_query($conn, $sql);
if($response){
    $num = mysqli_num_rows($response);

    if($num>0){
        while ($row = mysqli_fetch_assoc($response)) {
            
           
            $imagePath = $row["imagePath"];
            $imageUrl =  $imagePath; // Adjust this to your base URL
            
            echo "
            <img class= 'item' src='$imageUrl ' alt='Image' style='background-image: url($imageUrl);'>
            <div class='content'>
                <div class='name'>{$row["Name"]}</div>
                <div class='des'>{$row["cost"]}</div>
                <button type='submit'>See more</button>
            </div>
        </div>
            ";
            // echo " <img src='../uploads/Screenshot (131).png' alt='' srcset=''>";
        }
    }else {
        echo "0 results";
}
}

?>

                <!-- an item starts here -->
                <!-- <div class="item" style="background-image: url(images/perf.jpg);">
                    <div class="content">
                        <div class="name">LUDOV</div>
                        <div class="des">Dui dUI uid id idiidii</div>
                        <button type="submit">See more</button>
                    </div>
                </div> -->

                <!-- an item starts here -->
                <!-- <div class="item" style="background-image: url(images/c19.jpg);">
                    <div class="content">
                        <div class="name">LUDOV</div>
                        <div class="des">Dui dUI uid id idiidii</div>
                        <button type="submit">See more</button>
                    </div>
                </div> -->

                <!-- an item starts here -->
                <!-- <div class="item" style="background-image: url(images/cbd.jpg);">
                    <div class="content">
                        <div class="name">LUDOV</div>
                        <div class="des">Dui dUI uid id idiidii</div>
                        <button type="submit">See more</button>
                    </div>
                </div> -->

                <!-- an item starts here -->
                <!-- <div class="item" style="background-image: url(images/ven.jpg);">
                    <div class="content">
                        <div class="name">LUDOV</div>
                        <div class="des">Dui dUI uid id idiidii</div>
                        <button type="submit">See more</button>
                    </div>
                </div> -->

                <!-- an item starts here -->
                <!-- <div class="item" style="background-image: url(images/ven.jpg);">
                    <div class="content">
                        <div class="name">LUDOV</div>
                        <div class="des">Dui dUI uid id idiidii</div>
                        <button type="submit">See more</button>
                    </div>
                </div> -->

        </div>
    </div>
    <div class="buttons">
        <button id="prev"><<<<i class="fas fa-arrow-left"></i></button>
        <button id="next">>>><i class="fas fa-arrow-right" aria-hidden="true"></i></button>/
    </div>
    <script>
        

document.getElementById('next').onclick = function(){
    let lists = document.querySelectorAll('.item');
    document.getElementById('slide').appendChild(lists[0]);
}

document.getElementById('prev').onclick = function(){
    let lists = document.querySelectorAll('.item');
    document.getElementById('slide').prepend(lists[lists.length - 1]);
}
    </script>
</body>

</html>