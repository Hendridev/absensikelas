// var keyword = document.getElementById("keyword");
// var cari = document.getElementById("tombol");
// var container = document.getElementById("container");

// keyword.addEventListener('keyup', function() {
//     // buat object ajax
//     var xhr = new XMLHttpRequest();
//     // cek kesiapan ajax
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             container.innerHTML = xhr.responseText;
//         }
//     }

//     // eksekusi ajax
//     xhr.open('GET', 'ajax/siswa.php?keyword=' + keyword.value, true);
//     xhr.send();

// });

$(document).ready(function() {
    $('#keyword').on('keyup', function() {
        $('#container').load('ajax/siswa.php?keyword=' + $('#keyword').val());
    });
})