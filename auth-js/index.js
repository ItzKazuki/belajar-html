
// ambil input dari username dan pw
let username = document.getElementById('username');
let password = document.getElementById('password');
let submit = document.getElementById('btn-submit');

submit.addEventListener('click', () => {
    login(username, password)
})

async function login(username, password) {
    const data = {
        'username': username.value,
        'password': password.value
    }

    var formBody = [];
    for (var property in data) {
    var encodedKey = encodeURIComponent(property);
    var encodedValue = encodeURIComponent(data[property]);
    formBody.push(encodedKey + "=" + encodedValue);
    }
    formBody = formBody.join("&");

    const getEncryptPassword = await fetch('http://local.kazukikun.space/backend-php/index.php?action=login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
        },
        body: formBody
    })
    const encPasword = await getEncryptPassword.json();

    console.log(encPasword)

    if(encPasword.message == 'failed') {
        alert('username / password not found')
        return;
    }

    alert('kamu berhasil login')
}