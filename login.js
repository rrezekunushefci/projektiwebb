function validation() {
    var emri = document.formfill.Emri.value;
    var fjalekalimi = document.formfill.Fjalekalimi.value;
    

   
    

    if (emri === "") {
        alert('Shenoni Emrin tuaj.');
        return false;
    } else if (emri.length < 6) {
        alert('Emri duhet të ketë së paku gjashtë shkronja');
        return false;
    }

  
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(fjalekalimi)) {
        alert('Fjalëkalimi duhet të ketë së paku 8 karaktere dhe të përmbajë një kombinim të shkronjave (të vogla dhe të mëdha), numrave, dhe karaktereve speciale!');
        return false;
    }

    
    return true;

}