function validation_login()
{
    var username = document.forms["login"].username.value;
    var password = document.forms["login"].password.value;
    if (username === "" && password === "")
    {
        alert("Username & Password Required");
        return false;
    }
    else if (username === "" || username === null)
    {
        alert("Username Required");
        return false;
    }
    else if (password === "" || password === null)
    {
        alert("Password Required");
        return false;
    }
}

