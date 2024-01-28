document.addEventListener("DOMContentLoaded", function() {
    var adminPhoto = document.getElementById('adminPhoto');
    var dropdownMenu = document.getElementById('dropdownMenu');

    adminPhoto.addEventListener('mouseenter', function() {
        
        dropdownMenu.style.display = 'block';
    });

    adminPhoto.addEventListener('mouseleave', function() {
        
        dropdownMenu.style.display = 'none';
    });

 
    dropdownMenu.addEventListener('mouseleave', function() {
        dropdownMenu.style.display = 'none';
    });

   
    dropdownMenu.addEventListener('mouseenter', function() {
        dropdownMenu.style.display = 'block';
    });
});

