function validation_experience()
{
    var working_for = document.forms["experience"].company.value;
    var company_link = document.forms["experience"].clink.value;
    var title = document.forms["experience"].title.value;
    var description = document.forms["experience"].desc.value;
    var city = document.forms["experience"].city.value;    
    var state = document.forms["experience"].state.value;
    var country = document.forms["experience"].country.value;
    var postal_code = document.forms["experience"].postal.value;
    var syear = document.forms["experience"].syear.value;
    var smonth = document.forms["experience"].smonth.value;
    


    if (working_for === "" && company_link === "" && title === "" && description === "" && city === "" && postal_code === "" && state === "" && country === "" && syear === "" && smonth === "0")
    {
        alert("Details Required");
        return false;
    }
    else if (working_for === "")
    {
        alert("Please enter Company Name you working for");
        return false;
    }
    else if (company_link === "")
    {
        alert("Please enter Company Name you working for");
        return false;
    }
    else if (title === "")
    {
        alert("Please enter Company Name you working for");
        return false;
    }
        else if (description === "")
    {
        alert("Please enter Company Name you working for");
        return false;
    }
    else if (city === "")
    {
        alert("City your Company is from?");
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
    else if (syear === "")
    {
        alert("Joining year needed");
        return false;
    }
    else if (smonth === "0")
    {
        alert("Joining month required");
        return false;
    }
}



