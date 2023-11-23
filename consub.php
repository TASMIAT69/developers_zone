<!DOCTYPE html>
<html lang="en">
<?php session_start();
if (!$_SESSION['user_id']) {
    header("Location: login.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Developers Zone</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
        /* Style the textarea for better visual appeal */
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2> <a href="javascript:history.back()"
                    style="text-decoration: none;color:white;cursor:pointer"><span>Back</span></a></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><i style="font-size:25px;" class="las la-braille"></i>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="profile.php"><span class="las la-user"></span>
                        <span>Profile</span></a>
                </li>
                <li>
                    <a href="devchat.php"><span class="las la-user"></span>
                        <span>Chat</span></a>
                </li>
                <li>
                    <a href="./orders.php"><i style="font-size:25px;" class="lab la-opencart"></i>
                        <span>Orders</span></a>
                </li>
                <?php
                if ($_SESSION['user_type'] == 'developer') {
                    ?>
                    <li>
                        <a href="gig.php"><i style="font-size:25px;" class="las la-plus-square"></i>
                            <span>Gigs</span></a>
                    </li>
                    <li>
                        <a href="consub.php"><i style="font-size:25px;" class="las la-plus-square"></i>
                            <span>Contact Submissions</span></a>
                    </li>

                <?php } ?>
                <li>
                    <a href="changepass.php"><i style="font-size:25px" class="las la-shield-alt"></i>
                        <span>Security</span></a>
                </li>
                <li>
                    <a href="./logout.php"><i style="font-size:25px" class="las la-sign-out-alt"></i>
                        <span>Log Out</span></a>
                </li>

            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2 class="p-2">
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> Developers Zone
            </h2>
            <?php
            if ($_SESSION['user_type'] == 'user') {
                ?>

                <div class="px-4 py-2 orders" style="background:whitesmoke;"><b><a href="./services.php"
                            style="float:right;text-decoration:none;color:#9260f3" class="mt-3">View Services</a></b></div>
            <?php } ?>
        </header>

        <main>

            <table style="font-weight:700" class="mt-3" width='100%' border=0>
                <tr bgcolor='#CCCCCC'>
                    <td>id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Subject </td>
                    <td>Message</td>
                </tr>
                <?php
                //including the database connection file
                include_once("db_connect.php");

                $sql = "SELECT * FROM contact_form ORDER BY id DESC";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                while ($res = mysqli_fetch_assoc($result)) {

                    echo "<tr>";
                    echo "<td>" . $res['id'] . "</td>";
                    echo "<td>" . $res['name'] . "</td>";
                    echo "<td>" . $res['email'] . "</td>";
                    echo "<td>" . $res['subject'] . "</td>";
                    echo "<td><textarea id='myTextarea' name='myText' rows='4'>" . $res['message'] . "</textarea></td>";
                    echo "</tr>";
                } ?>

            </table>

        </main>

    </div>

</body>

</html>