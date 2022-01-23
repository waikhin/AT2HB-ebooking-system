function regValidation()
{
    var Role = document.forms["RegForm"]["role"];
    var Id = document.forms["RegForm"]["Id"];
	var Name = document.forms["RegForm"]["Name"];
	var Faculty = document.forms["RegForm"]["Faculty"];
	var Email = document.forms["RegForm"]["email"];
	var Phonenumber = document.forms["RegForm"]["phonenumber"];
	var Password = document.forms["RegForm"]["password"];
	var Cpassword = document.forms["RegForm"]["cpassword"];

    if(Role_valid(Role))
    {
        if(Id_valid(Id))
        {
            if(Name_valid(Name))
            {
                if(Faculty_valid(Faculty))
                {
                    if(Email_valid(Email, Role))
                    {
                        if(Phonenumber_valid(Phonenumber))
                        {
                            if(Password_valid(Password))
                            {
                                if(Cpassword_valid(Cpassword,Password))
                                { 
                                    return true;
                                }                       
                            }                 
                        }
                    }
                }              
            }
        }        
    }
    return false;
}

function Role_valid(Role)
{
    if(Role.value == "none")
    {
        setErrorFor(role, 'Role cannot be blank!');
        role.focus();
        return false;
    }
    else
    {
        setSuccessFor(role);
        return true;
    }
}

function Id_valid(Id)
{
    if(Id.value === '')
    {
        setErrorFor(Id, 'ID cannot be blank!');
        Id.focus();
        return false;
    }
    else
    {
        setSuccessFor(Id);
        return true;
    }
}

function Name_valid(Name)
{
    var uppercaseCheck = /^[A-Z]/;
    var lowercaseCheck = /^(?=.*[a-z])/;
    if(Name.value.match(uppercaseCheck) && Name.value.match(lowercaseCheck))
    {
        setSuccessFor(Name);
        return true;
    }
    else if(Name.value === '')
    {
        setErrorFor(Name, 'Name cannot be blank!');
        Name.focus();
        return false;
    }
    else
    {
        setErrorFor(Name, 'First Character must be Uppercase follow by Lowercase');
        Name.focus();
        return false;
    }
}

function Faculty_valid(Faculty)
{
    if(Faculty.value=="none")
    {
        setErrorFor(Faculty, 'Faculty cannot be blank!');
        Faculty.focus();
        return false;
    }
    else
    {
        setSuccessFor(Faculty);
        return true;
    }
}

function Email_valid(Email, Role)
{
    var staffmailformat = /([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@unimas([\.])my/;
    var studentmailformat = /^([0-9]{5})\@siswa.unimas([\.])my/;
    if(Email.value.match(studentmailformat) && Role.value.match("Student") || Email.value.match(staffmailformat) && Role.value.match("Staff"))
    {
        setSuccessFor(email);
        return true;
    }
    else if(Email.value === '')
    {
        setErrorFor(email, 'Email cannot be blank!');
        Email.focus();
        return false;
    }
    else
    {
        setErrorFor(email,"Only allow to register using UNIMAS email!");
        Email.focus();
        return false;
    }
}

function Phonenumber_valid(Phonenumber)
{
    var phoneformat = /^(01)[0-46-9]*[0-9]{7,8}$/;
    if(Phonenumber.value.match(phoneformat))
    {
        setSuccessFor(phonenumber);
        return true;
    }
    else if(Phonenumber.value === '')
    {
        setErrorFor(phonenumber, 'Phone Number cannot be blank!');
        Phonenumber.focus();
        return false;
    }
    else
    {
        setErrorFor(phonenumber, 'Not a valid Phone Number!');
        Phonenumber.focus();
        return false;
    }
}

function Password_valid(Password)
{
    var pass_len = Password.value.length;
    var nolowerCheck = /^(?=.*[a-z])/;
    var noupperCheck = /^(?=.*[A-Z])/;
    var nodigitCheck = /^(?=.*[0-9])/;
    var nosymbolCheck = /^(?=.*[!@#$%^&`])/;

    if(pass_len == 0 || pass_len >6)
    {
        setErrorFor(password,"Password should be exactly a combination of 6 alphanumeric");
        Password.focus();
        return false;
    }
    else if(Password.value.match(nolowerCheck) && Password.value.match(noupperCheck) && Password.value.match(nodigitCheck) && Password.value.match(nosymbolCheck))
    {
        setSuccessFor(password);
        return true;
    }
    else
    {
        setErrorFor(password,"Password must contain upper letter, digit, special symbol,lowercase letter");
        Password.focus();
        return false;
    }
}

function Cpassword_valid(Cpassword,Password)
{
    var pass_len = Cpassword.value.length;
    if(pass_len == 0)
    {
        setErrorFor(cpassword,"Confirm Password should not be blank !");
        Cpassword.focus();
        return false;
    }
    else if(Cpassword.value == Password.value)
    {
        setSuccessFor(cpassword);
        return true;
    }
    else 
    {
        setErrorFor(cpassword,"Password is not matching");
        Cpassword.focus();
        return false;
    }
}

function setErrorFor(input, message) {
    const container = input.parentElement;
    const small = container.querySelector('small');
    small.innerText = message;
    container.className = 'input-group fail';
}

function setSuccessFor(input) {
    const container = input.parentElement;
    const small = container.querySelector('small');
    small.innerText = "Valid";
    container.className = 'input-group success';
}



	