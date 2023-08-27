<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Send data Using Form In Ajax  -->


    <form action="" method="post" id="login_form">
        <p>User Name</p>
        <input type="text" name="user_name">
        <p>Password</p>
        <input type="password" name="user_pass">
        <button type="submit">Login</button>
    </form>
    <!-- Get Page data Using Get Method Using Ajax -->

    <button id="getDatabtn">Get Data Using Get</button>
    <div id="getData">

    </div>

    <!-- Send data Using Get Method  -->
    <button id="sendData">Send Data</button>

    <button id="changeUrl">Change URL</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#login_form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'login.php',
                    data: $(this).serialize(),
                    success: function(result) {
                        var jsonData = JSON.parse(result);
                        console.log(jsonData);
                        if (jsonData.status == 200) {
                            console.log(jsonData.message);
                        } else {
                            console.log(jsonData.message);
                        }
                    },
                    error: function(data) {
                        var jsonError = JSON.parse(data);
                        console.log(jsonError);
                    }
                });
            });
            $('#getDatabtn').on('click', function() {
                $.ajax({
                    type: 'get',
                    url: 'getData.php',
                    dataType: 'html',
                    success: function(result) {
                        $('#getData').html(result);
                    }
                });
            });
            $('#sendData').on('click', function() {
                $.ajax({
                    type: 'get',
                    url: 'sendData.php',
                    data: {
                        page: 'Succes To Send Data',
                    },
                    success: function(result) {
                        var jsonData = JSON.parse(result);
                        console.log(jsonData.message);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
            $('#changeUrl').on('click', function() {
                history.pushState(null, 'Hacked', 'getData.php');
                $('#getData').load('./getData.php');
                const pageTitle = document.title = "New Title";
            })
        });
    </script>
</body>

</html>