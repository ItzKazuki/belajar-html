const startPage = document.getElementById('main');
const playerChosePage = document.getElementById('pilih');
const playerFight = document.getElementById('fight');

function startGame() {
    startPage.classList.add('hide');
    playerChosePage.classList.remove('hide')
    return;
}

function quitGame() {
    let isTrue = confirm('apakah kamu yakin?');
    if(isTrue) {
        window.location.href = 'index.html';
    }
    return;
}

function attack() {
    playerChosePage.remove();
    startPage.remove();
    playerFight.classList.remove('hide')

    // dom ID
    const health = document.getElementById('myHealth');
    const oppHealth = document.getElementById('opponentHealth')
    const btnApi = document.getElementById('api');
    const btnAir = document.getElementById('air');
    const btnDaun = document.getElementById('daun');
    const information = document.getElementById('information');

    // default var
    let myHealth = 100;
    let opponentHealth = 100;
    let myself;
    let opponent;
    let oldHP = health.innerHTML;
    let oldOppHP = oppHealth.innerHTML;

    health.innerHTML += myHealth;
    oppHealth.innerHTML += opponentHealth;

    btnApi.addEventListener('click', () => {
        myself = 'api';
        opponent = getRandComputer();
        checkComputer();


    })

    btnAir.addEventListener('click', () => {
        myself = 'air';
        opponent = getRandComputer();
        checkComputer();


    })

    btnDaun.addEventListener('click', () => {
        myself = 'daun';
        opponent = getRandComputer();
        checkComputer();

    })

    function getRandComputer() {
        let range = Math.floor(Math.random() * 3);
        if(range == 0) {
            return 'api';
        } else if( range == 1) {
            return 'daun';
        } else {
            return 'air';
        }
    }

    /* 
    api air: api menang
    air daun: ?
    daun api: api menang
    */

    function checkComputer() {
        if(myHealth == 0) checkHealth('myself');
        if(opponentHealth == 0) checkHealth('opponent');

        // check 
        information.innerHTML = '';
        information.innerHTML += `musuh menyerang dengan: ${opponent}, kamu menyerang dengan: ${myself}`


        if(opponent == myself) {
            myHealth = myHealth;
            opponentHealth = opponentHealth;
        } else if(opponent == 'api') {
            myHealth = myself == 'daun' ? myHealth - 20 : myHealth;
            opponentHealth = myself == 'air' ? opponentHealth - 20 : opponentHealth;
        } else if(opponent == 'daun') {
            opponentHealth = myself == 'api' ? opponentHealth - 20 : opponentHealth;
            myHealth = myself == 'air' ? myHealth - 20 : opponentHealth;
        } else if(opponent == 'air') {
            opponentHealth = myself == 'daun' ? opponentHealth - 20 : opponentHealth;
            myHealth = myself == 'api' ? myHealth - 20 : myHealth;
        }
        
        // show health myself
        health.innerHTML = oldHP;
        health.innerHTML += myHealth;
        // show health opponent 
        oppHealth.innerHTML = oldOppHP;
        oppHealth.innerHTML += opponentHealth;
    }

    function checkHealth(player) {
        let myConfirm = player == 'myself' ? 'You lose, want to try again?' : 'You win, want try again?';
        const isTrue = confirm(myConfirm);

        if(!isTrue) {
            window.location.href = 'index.html'
            return true;
        }

        window.location.reload();
        return true;
    }
}