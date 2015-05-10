<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$.get("http://ipinfo.io", function (response) {
    $.post("country.php",{country:response.country}, function(response){
    window.location.replace("index.php")});
}, "jsonp");
</script>
</head>
</html>