<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    function ddlselect() {
        var d = document.getElementById("ddselect");
        var displaytext = d.options[d.selectedIndex].text;
        document.getElementById("txtvalue").value = displaytext;
    }
    </script>
</head>

<body>
    <select name="ddselect" id="ddselect" onchange="ddlselect();">
        <option>--select sports--</option>
        <option>rugby</option>
        <option>cricket</option>
        <option>swimming</option>
        <option>volleyball</option>
    </select>
    <input type="text" id="txtvalue">
</body>

</html>