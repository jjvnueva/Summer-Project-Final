<!DOCTYPE html>
<html>
    <?php
    $host = "rdbase.c6kx2buh4zov.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "sQV30IJuJ5VsmtQGYxl5";
    $database = "db_wsite";

    $connect = @mysqli_connect($host, $username, $password) or die("Unable to connest to host");
    $db = @mysqli_select_db($connect, $database) or die("Unable to connect to database");

    if(isset($_REQUEST['submit_comment'])) {
        try {
            date_default_timezone_set('Asia/Manila');
            $date = date("Y-m-d");
            $time = date("h:i:sa");
            $comment_text = $_REQUEST['comment'];
            $sql_insert = "INSERT INTO tbl_comments (`com_text`,`com_date_added`,`com_time_added`)
                    VALUES ('".$comment_text."','".$date."','".$time."')";
            mysqli_query ($connect, $sql_insert) or die ("Unable to connect to table");
        } catch(Exception $e) {
            echo "Error", $e->getMessage(),"\n";
        }
    }
    ?>
    <head>
        <link rel="stylesheet" type="text/css" href="css/contact_us_style.css">
    </head>

    <body>
        <div class="content_contact_us">
            <p style="text-align: center; font-size: 50px;">Contact Information</p>
            <div class="contact_information1">
                <p style="text-align: center; font-size: 25px; font-weight: bold;">Outwork Diner</p>
                <p style="text-align: center; font-size: 15px;">KYLT Building, 103 Leonardo Gallardo</br>St, Bacolod, 6100 Negros Occidental</p>
                <div class="contact_details">
                    <label>Mobile: 09258652932 &nbsp&nbsp&nbsp&nbsp&nbsp</label> </br>
                    Email: outworkdiner@yahoo.com
                </div>
            </div>

            <form method="post">
                <textarea class="comment_box" width="250" height="250" name="comment" placeholder="Comment"></textarea>
                <input type="submit" value="Post" name="submit_comment">
            </form>

            <div class="comment_display">
            <?php
                $sql_select = "SELECT * FROM tbl_comments";
                $dbrecord = mysqli_query($connect, $sql_select) or die ("Unable to connect to table");
                $number_of_rows = mysqli_num_rows($dbrecord);
                while($row = mysqli_fetch_assoc($dbrecord)) {
                    $get_comment_text = $row["com_text"];
                    $get_date = $row["com_date_added"];
                    $get_time = $row["com_time_added"];
                    $get_comment_id = $row["com_id"];

                    echo "<label style='margin: 0 auto;'>Comment Id: $get_comment_id</label>";
                    echo "<label style='margin-left: 100px;'>Comment Text: $get_comment_text</label>";
                    echo "<label style='margin-left: 100px;'>Date: $get_date</label>";
                    echo "<label style='margin-left: 100px;'>Time: $get_time</label></br>";     
                }
                ?>
            </div>
        </div>
    </body>
</html>