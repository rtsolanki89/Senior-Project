fu nction validation_education()
{
    var school_name = document.forms["education"].school.value;
    var city = document.forms["education"].city.value;
    var postal_code = document.forms["education"].postal.value;
    var state = document.forms["education"].state.value;
    var country = document.forms["education"].country.value;
    var degree = document.forms["education"].degree.value;
    var major = document.forms["education"].major.value;
    var syear = document.forms["education"].syear.value;
    var smonth = document.forms["education"].smonth.value;
    var eyear = document.forms["education"].eyear.value;
    var emonth = document.forms["education"].emonth.value;
    var skills = document.forms["education"].skills.value;


    if (school_name === "" && city === "" && postal_code === "" && state === "" && country === "" && degree === "" && major === "" && syear === "" && smonth === "0" && eyear === "" && emonth === "0" && skills === "")
    {
        alert("Details Required");
        return false;
    }
    else if (school_name === "0")
    {
        alert("Please enter your school name");
        return false;
    }
    else if (city === "")
    {
        alert("City your School is from?");
        return false;
    }
    else if (postal_code === "")
    {
        alert("Its Postal Code");
        return false;
    }
    else if (state === "")
    {
        alert("State not entered");
        return false;
    }
    else if (country === "")
    {
        alert("Please enter Country");
        return false;
    }
    else if (degree === "")
    {
        alert("Whats your Degree ");
        return false;
    }
    else if (major === "")
    {
        alert("Whats Your Major");
        return false;
    }
    else if (syear === "")
    {
        alert("School start date needed");
        return false;
    }
    else if (smonth === "0")
    {
        alert("School Start month required");
        return false;
    }
    else if (eyear === "")
    {
        alert("When (Year) Did you finish studying or when will you be done with school");
        return false;
    }
    else if (emonth === "0")
    {
        alert("When (Month) Did you finish studying or when will you be done with school");
        return false;
    }
}

