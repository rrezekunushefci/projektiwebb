function validation(){
var emri = document.formfill.Emri.value;
var email = document.formfill.Email.value;
var fjalekalimi = document.formfill.Fjalekalimi.value;
var konfirmimi = document.formfill.Konfirmimi.value;

if (emri.length < 6) {
    alert('Emri duhet të ketë më shumë se gjashtë shkronja!');
    return false;
}
 
    var emailRegex = /^\S+@\S+\.\S+$/;
     if (!emailRegex.test(email)) {
    alert('Ju lutem shenoni nje Email Adrese valide');
     return false;
    }

    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (!passwordRegex.test(fjalekalimi)) {
        alert('Fjalëkalimi duhet të përmbajë të paktën 8 karaktere, duke përfshirë të vogla, të mëdha dhe numra!');
        return false;
    }

    if (konfirmimi === "") {
        alert ('Konfirmoni Fjalekalimin');
        return false;
    } else if (fjalekalimi !== konfirmimi) {
        alert ('Fjalekalimet nuk korrespondojne mes vete!');
        return false ;
    }

    popup.classList.add("open-slide");
    return false;
    }

    function closePopup () {
        var popup = document.getElementById('popup');
        popup.classList.remove("open-slide");

    }

    var OKButton = document.querySelector("#popup button");
    OKButton.addEventListener("click", function() {
        closePopup();
    });

  



