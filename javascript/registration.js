function validation_register()
{
    var profession = document.forms["register"].profession.value;
    var username = document.forms["register"].username.value;
    var email = document.forms["register"].email.value;
    var password = document.forms["register"].password.value;
    var repassword = document.forms["register"].repassword.value;
    var first_name = document.forms["register"].fname.value;
    var last_name = document.forms["register"].lname.value;
    var gender = document.forms["register"].gender.value;
    var year = document.forms["register"].year.value;
    var month = document.forms["register"].month.value;
    var day = document.forms["register"].day.value;

    if (profession === "0" && username === "" && email === "" && password === "" && repassword === "" && first_name === "" && last_name === "" && gender === "" && year === "" && month === "0" && day === "0")
    {
        alert("Details Required");
        return false;
    }
    else if (profession === "0")
    {
        alert("Please select profession (Student or Employee)");
        return false;
    }
    else if (username === "")
    {
        alert("Username Required");
        return false;
    }
    else if (email === "")
    {
        alert("Email Address Required");
        return false;
    }
    else if (password === "")
    {
        alert("Please Enter Password");
        return false;
    }
    else if (repassword === "")
    {
        alert("Please Enter Password Again");
        return false;
    }
    else if (first_name === "")
    {
        alert("Please enter your First Name");
        return false;
    }
    else if (last_name === "")
    {
        alert("Please enter your Last Name");
        return false;
    }
    else if (gender === "")
    {
        alert("Select who youe are ( Gender )");
        return false;
    }
    else if (year === "")
    {
        alert("Enter your birth year");
        return false;
    }
    else if (month === "0")
    {
        alert("Wrong Date of Birth");
        return false;
    }
    else if (day === "0")
    {
        alert("Wrong date of birth");
        return false;
    }
    else if (year > "1996")
    {
        alert("You can't register as you are not 18+");
        return false;
    }
    else if (password !== repassword)
    {
        alert("Password did not match");
        return false;
    }

}