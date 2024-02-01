function validation() {
    var emri = document.formfill.username.value;
    var fjalekalimi = document.formfill.password.value;

    // Kontrollo për emrin
    if (emri === "") {
        alert('Shenoni Emrin tuaj.');
        return false;
    } else if (emri.length < 6) {
        alert('Emri duhet të ketë së paku gjashtë shkronja');
        return false;
    }

    // Kontrollo për fjalëkalimin
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(fjalekalimi)) {
        alert('Fjalëkalimi duhet të ketë së paku 8 karaktere dhe të përmbajë një kombinim të shkronjave (të vogla dhe të mëdha), numrave, dhe karaktereve speciale!');
        return false;
    }

    // Kthehuni nëse të gjitha kushtet janë plotësuar
    return true;
}

