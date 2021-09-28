<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>


<br><br>

<p id="returned_data"></p>

<!-- Script -->
<script type='text/javascript'>
    $(document).ready(function(){
            console.log("Ready");
            let bi_api_url = 'http://' + window.location.hostname + ':5000/workforce';
            console.log(bi_api_url);
            // AJAX request
            $.ajax({
                url: bi_api_url,
                type: 'post',
                dataType: 'json',
                data:{
                    'auth_token':'123456',
                },
                success: function(response) {
                    $('#returned_data').html(response['orgID'] + '<br>' + response['profit']);
                }

            });
        });


</script>
</body>
</html>
