<form action="add" method='get'>
    <input type="text" name='account'><br />
    <input type="password" name='password'><br />
    <input type="submit" value="loginbbbb">
</form>
<script src="../public/js/default.js "></script>

<script>
    alert(23)
    $.ajax({
        url: "add",
        type: "DELETE",
        dataType: "json",
        data: {
            account: 123,
            password: 123,
        },
        success: function(result) {
            alert("ok");
        }
    });
</script>