function myFunction() {
    var y = document.getElementById('myDIV');
    var t = document.getElementById('totalkg');

    if (y.style.display === 'none') {
        y.style.display = 'block';
        t.style.display = 'none';
    } else {
        y.style.display = 'none';
        t.style.display = 'block';
    }
}
