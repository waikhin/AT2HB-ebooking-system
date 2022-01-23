function profileValidation()
{
	var name = document.forms["chgprofileForm"]["name"];
	var faculty = document.forms["chgprofileForm"]["faculty"];
	var phonenum = document.forms["chgprofileForm"]["phonenum"];

    if(name_valid(name))
    {
        if(faculty_valid(faculty))
        {
            if(phonenum_valid(phonenum))
            { 
                return true;
            }                       
        }                 
    }            
    return false;
}

function faculty_valid(faculty)
{
    if(faculty.value=="none")
    {
        setErrorFor(faculty, 'Faculty cannot be blank!');
        faculty.focus();
        return false;
    }
    else
    {
        setSuccessFor(faculty);
        return true;
    }
}

function phonenum_valid(phonenum)
{
    var phoneformat = /^(01)[0-46-9]*[0-9]{7,8}$/;
    if(phonenum.value.match(phoneformat))
    {
        setSuccessFor(phonenum);
        return true;
    }
    else if(phonenum.value === '')
    {
        setErrorFor(phonenum, 'Phone Number cannot be blank!');
        phonenum.focus();
        return false;
    }
    else
    {
        setErrorFor(phonenum, 'Not a valid Phone Number!');
        phonenum.focus();
        return false;
    }
}
function passValidation()
{
	var currentpass = document.forms["chgpassForm"]["currentpass"];
	var newpass = document.forms["chgpassForm"]["newpass"];
	var cnewpass = document.forms["chgpassForm"]["cnewpass"];

    if(currentpass_valid(currentpass))
    {
        if(newpass_valid(newpass))
        {
            if(cnewpass_valid(newpass,cnewpass))
            { 
                return true;
            }                       
        }                 
    }            
    return false;
}

function currentpass_valid(currentpass)
{
    var pass_len = currentpass.value.length;
    if(pass_len == 0)
    {
        setErrorFor(currentpass,"Password should not be blank !");
        currentpass.focus();
        return false;
    }
    else
    {
        setSuccessFor(currentpass);
        return true;
    }
}

function newpass_valid(newpass)
{
    var pass_len = newpass.value.length;
    var nolowerCheck = /^(?=.*[a-z])/;
    var noupperCheck = /^(?=.*[A-Z])/;
    var nodigitCheck = /^(?=.*[0-9])/;
    var nosymbolCheck = /^(?=.*[!@#$%^&`])/;

    if(newpass.value === '')
    {
        setErrorFor(newpass, 'Password cannot be blank!');
        newpass.focus();
        return false;
    }
    else if(pass_len == 0 || pass_len >6)
    {
        setErrorFor(newpass,"Password should be exactly a combination of 6 alphanumeric");
        newpass.focus();
        return false;
    }
    else if(newpass.value.match(nolowerCheck) && newpass.value.match(noupperCheck) && newpass.value.match(nodigitCheck) && newpass.value.match(nosymbolCheck))
    {
        setSuccessFor(newpass);
        return true;
    }
    else
    {
        setErrorFor(newpass,"Password must contain upper letter, digit, special symbol,lowercase letter");
        newpass.focus();
        return false;
    }
}

function cnewpass_valid(newpass,cnewpass)
{
    var pass_len = cnewpass.value.length;
    if(pass_len == 0)
    {
        setErrorFor(cnewpass,"Confirm Password should not be blank !");
        cnewpass.focus();
        return false;
    }
    else if(cnewpass.value == newpass.value)
    {
        setSuccessFor(cnewpass);
        return true;
    }
    else 
    {
        setErrorFor(cnewpass,"Password is not matching");
        cnewpass.focus();
        return false;
    }
}
function setErrorFor(input, message) {
    const container = input.parentElement;
    const small = container.querySelector('small');
    small.innerText = message;
    container.className = 'pass fail';
}

function setSuccessFor(input) {
    const container = input.parentElement;
    const small = container.querySelector('small');
    small.innerText = "Valid";
    container.className = 'pass success';
}