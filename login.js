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

  
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (!passwordRegex.test(fjalekalimi)) {
        alert('Fjalëkalimi duhet të përmbajë të paktën 8 karaktere, duke përfshirë të vogla, të mëdha dhe numra!');
        return false;

    
    return true;

}