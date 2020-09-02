<!doctype html>
<html lang="en">

<head>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <label>City:</label>
            <input type="text" name="city" id="search_city" class="form-control">
        </div>
    </div>

    <script type="text/javascript">
    $(function() {
        $("#search_city").autocomplete({
            source: 'ajax-city-search.php',
        });
    });
    </script>

</body>

</html>