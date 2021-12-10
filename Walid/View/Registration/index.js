
//NAME
function verifNom() {
    let x = document.querySelector("#name").value;
    let letters = /^[A-Za-z]+$/;
    if (x.match(letters)) {
        return true;
    }
    else { swal("First Name must be only Alphabetic"); }
}
//LASTNAME
function verifLastName() {
    let x = document.querySelector("#lastname").value;
    let letters = /^[A-Za-z]+$/;
    if (x.match(letters)) {
        return true;
    }
    else { swal("Last Name must be only Alphabetic"); }
}
//PHONE
function VerifPhone() {
    let x = document.querySelector("#phone").value;
    let numbers = /^[0-9]+$/;
    if (x.match(numbers) != null && x.length == 8) { return true; }
    else { swal("Phone Number must be only 8 Numbers "); }
}
//PASSWORD
function VerifPass() {
    let pass = document.querySelector("#password").value;
    if (pass.length <= 8) { swal("Your password must be more than eight characters"); return false }
    else { return true; }
}
function VerifPass1() {
    let pass1 = document.querySelector("#password1").value;
    if (pass1.length <= 8) { swal("Your Confirm password must be more than eight characters"); return false }
    else { return true; }
}
//VERIF PASS AND CPASS
function ConfirmPass() {
    let pass = document.querySelector("#password").value;
    let pass1 = document.querySelector("#password1").value;
    if (pass == pass1) { return true; }
    else { swal("the password confirmation must match your password"); return false }
}
//CHECK EMAIL
function checkEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
//VERIF EMAIL
function VerifMail() {
    var email = document.getElementById("email").value;

    if (checkEmail(email)) { return true; }
    else {
        swal('Adresse e-mail non valide');
    }
    return false;
}
//EXIST MAIL
function MailExist() {
    swal('Mail Exist');
}
//VERIFALL
function VerifAllOfThem() {
    if (verifNom() && verifLastName() && VerifPass() && VerifPass1() && VerifPhone() && ConfirmPass() && VerifMail()) { return true; }
    else return false;
}



//DATE
/*const Verifdate = () => {
    let dat = document.querySelector("#date").value;
    if (new Date(dat) > new Date()) { console.log(true); return true; }
    else {
        console.log(false); return false;
    }
}*/
//NUMBERS
/*const VerifNum = () => {
    let num = document.querySelector("#num").value;
    if (+(num) > 10 && +(num) < 100) { console.log(true); return true; }
    else { console.log(false); return false }
}*/
/*function verifPrenom() {
    let x = document.querySelector("#prenom").value;
    let c = x.toUpperCase();
    console.log(c);
    for (let i = 0; i < c.length; i++) {
        if (c[i] < 'A' || c[i] > 'Z') { console.log(false); return false; }
    }
    console.log(true);
    return true;
}*/
//Email
/*const VerifMail = () => {
    let x = document.querySelector("#Email").value;
    return x.endsWith("@esprit.tn");*/


