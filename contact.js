function contactFormValidation() {
    var emri = document.contactForm.Emri.value;
    var email = document.contactForm.Email.value;
    var phone = document.contactForm.Phone.value;
    var mesazhi = document.contactForm.Mesazhi.value;

    if (emri.length < 6) {
        alert('Emri duhet të ketë së paku gjashtë shkronja!');
        return false;
    }

    var emailRegex = /^\S+@\S+\.\S+$/;
    if (!emailRegex.test(email)) {
        alert('Ju lutem shenoni një Email Adresë valide!');
        return false;
    }

    var phoneRegex = /^\d+$/;
    if (!phoneRegex.test(phone)) {
        alert('Nr.Tel duhet të përmbajë vetëm numra!');
        return false;
    }

    if (mesazhi.length < 10) {
        alert('Mesazhi duhet të jetë së paku 10 karaktere!');
        return false;
    }


    alert('Forma u dërgua me sukses!');
    return true;
}