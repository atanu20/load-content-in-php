<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>





    <section class="p-5">
        <div class="container">
            <div class="row w-75 d-block m-auto">
               <div class="load_data">
                
                
               </div>
               <div class="loading">

               </div>
            </div>
           
        </div>
    </section>

    <script>
        $(document).ready(function(){
            var limit=7;
            var start=0;
            var action="inactive";
            function load_counter(limit,start)
            {
                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    data:{limit:limit,start:start},
                    cache:false,
                    success:function(data)
                    {
                        $('.load_data').append(data);
                        if(data=='')
                        {
                            $('.loading').html("<button type='button' class='btn btn-primary' >No data</button>");
                            action="active";
                        }
                        else{
                            $('.loading').html("<button type='button' class='btn btn-primary' disable> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading... </button>");
                            action="inactive";
                        }
                    }
                });
            }

            if(action=='inactive')
            {
                action='active';
                load_counter(limit,start);

            }
            $(window).scroll(function(){
                if($(window).scrollTop()+ $(window).height()> $('.load_data').height() && action=='inactive')
                {
                    action='active';
                    start=start+limit;
                    setTimeout(() => {
                        load_counter(limit,start);
                    }, 1000);
                }
            });
        });
    </script>
</body>
</html>