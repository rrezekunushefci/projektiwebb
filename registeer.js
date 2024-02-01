function validation() {
    var emri = document.forms["formfill"]["Emri"].value;
    var email = document.forms["formfill"]["Email"].value;
    var fjalekalimi = document.forms["formfill"]["Fjalekalimi"].value;
    var konfirmimi = document.forms["formfill"]["Konfirmimi"].value;

    // Verifikimi i gjatësisë së emrit
    if (emri.length < 6) {
        alert("Emri duhet të ketë të paktën 6 karaktere.");
        return false;
    }

    // Verifikimi i adresës së email-it duke përdorur një shprehje të rregullt për validimin e saj
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Ju lutem vendosni një adresë email valide.");
        return false;
    }

    // Verifikimi i fjalekalimit duke përdorur një shprehje të rregullt për të kontrolluar kompleksitetin
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,}$/;
    if (!passwordRegex.test(fjalekalimi)) {
        alert("Fjalekalimi duhet të ketë të paktën 8 karaktere, një shkronjë të madhe, një shkronjë të vogël, një numër, dhe një karakter special (!@#$%^&*).");
        return false;
    }

    // Verifikimi i përsëritjes së fjalekalimit
    if (fjalekalimi !== konfirmimi) {
        alert("Fjalekalimi dhe konfirmimi duhet të jenë të njëjtë.");
        return false;
    }

    // Kthe true nëse të gjitha kushtet e kalohen
    return true;
}

    