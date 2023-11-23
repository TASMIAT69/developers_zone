<!DOCTYPE html>
<html lang="en">
<?php session_start(); 
if(!$_SESSION['user_id']){
    header("Location: login.php");
  }

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Developers Zone</title>
     <!-- Bootstrap -->
     <link
     rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
     integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
     crossorigin="anonymous"
   />
   <link
     rel="stylesheet"
     href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"
   />
   <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
<style>
    .chat-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
}

#chat-history {
    height: 200px;
    border: 1px solid #ccc;
    overflow-y: scroll;
    padding: 10px;
}

#message-form {
    margin-top: 10px;
}

#message-input {
    width: 70%;
    padding: 5px;
}

button {
    padding: 5px 10px;
}
</style>
</head>

<body>

<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><a href="javascript:history.back()" style="text-decoration: none;color:white;cursor:pointer"><span>Back</span></a></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="./dashboard.php" class="active"><i style="font-size:25px;" class="las la-braille"></i>
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
            if($_SESSION['user_type'] =='developer'){
            ?>
                <li>
                  <a href="gig.php"><i style="font-size:25px;" class="las la-plus-square"></i>
                  <span>Gigs</span></a>
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
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> Developers Zone
            </h2>
            <?php
            if($_SESSION['user_type'] =='user'){
            ?>
            
            <div class="px-4 py-2 orders" style="background:whitesmoke;"><b><a href="./services.php" style="float:right;text-decoration:none;color:#9260f3" class="mt-3">View Services</a></b></div>
          <?php } ?>

        </header>

        <main>
           
          

        <div
        style="background-color: white; border-radius: 30px 0px 0px 30px; padding: 100px"
        class="col-12"
      >
      <h4
              class="p-2 text-center rounded mt-5 mb-4"
              style="background-color: #9260f3; color: white"
            >
            Chat Here
            </h4>
   
            <div class="chat-container">
        <div id="chat-history"></div>
        <form id="message-form">
            <input type="hidden" id="user-id" value="<?php echo $_SESSION['user_id']; ?>">
            <input type="hidden" id="developer-id" value="<?php echo $POST['id']; ?>">
            <input type="text" id="message-input" placeholder="Type your message...">
            <button type="submit">Send</button>
        </form>
        <button id="clear-chat">Clear Chat</button>
    </div>
       
      </div>

      
        </main>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadChatHistory() {
                var user_id = $("#user-id").val();
                var developer_id = $("#developer-id").val();

                $.get("get_messages.php?user_id=" + user_id + "&developer_id=" + developer_id, function(data) {
                    $("#chat-history").html(data);
                });
            }
            
            $("#message-form").submit(function(e) {
                e.preventDefault();
                var message = $("#message-input").val();
                var user_id = $("#user-id").val();
                var developer_id = $("#developer-id").val();

                $.post("send_message.php", { message: message, user_id: user_id, developer_id: developer_id }, function() {
                    $("#message-input").val("");
                    loadChatHistory();
                });
            });

            $("#clear-chat").click(function() {
                // Send an AJAX request to clear chat messages from the database
                $.post("clear_chat.php", function() {
                    // Clear the chat history on the page
                    $("#chat-history").html("");
                });
            });

            loadChatHistory();
        });
    </script>

</body>

</html>