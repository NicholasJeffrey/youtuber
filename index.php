<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Youtube Logo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
               <br><h1>YouTuber</h1>
               <div class="form-group">
                   <input id="url" type="text" class="form-control" placeholder="Paste Channel ID, Channel Username or Video ID">
               </div>
               <div class="form-group">
                   <input onclick="this.select()" readonly id="imageurl" type="text" class="form-control" placeholder="Logo Url Appears Here">
               </div>
               <div class="form-group">
                   <button id="submit" class="btn btn-primary">Get Logo</button>
               </div>
            </div>
            <div class="col-md-6">
                <br>
                <div class="form-group">
                   <img class="img-responsive" id="logo"  src="https://image.flaticon.com/icons/svg/124/124015.svg" alt="">
               </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script>
        $("#submit").click(function(){
            var elem = $(this);
            var url = $("#url").val();
            if(!url){
                $("#url").focus();
            }else{
                elem.html('Please Wait');
                elem.prop('disabled', true);
                $.ajax({
                    url: 'process.php',
                    type: 'POST',
                    data: {url: url},
                    success: function(data) {
                        console.log(data);
                        $("#logo").attr('src', data);
                        elem.html('Get Logo');
                        elem.prop('disabled', false);
                        $("#imageurl").val(data);
                    }
                });
            }
        });
    
    </script>
</body>
</html>
