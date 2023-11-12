/**
 * Notes:
 *  - alur game:
 *    1. player/computer select defense element
 *    2. player/computer mullai attack, kalo def nya beda bakal menang. kalo sama darah nya di up ..
 *    3. ulang terus sampe salah satu player darahnya 0;
 */



class Player {

    /**
     * 
     * @param {string} name 
     * @param {string} defType 
     */
    constructor(name, defType) {
        this.name = name;
        this.defType = defType;
        
        // default val
        this.health = 100; 
        this.attackDecrease = 10;
    }

    /**
     * 
     * @returns returning information about player.
     */
    getDescription() {
        return `name: ${this.name}, health: ${this.health}, defense: ${this.defType}`
    }

    /**
     * 
     * @param {object} player 
     * @returns add player health by computer attack.
     */
    addHealth(player) {
        return this.health + player.attackDecrease;
    }

    /**
     * 
     * @param {object} player 
     * @returns make attack do decerse health computer.
     */
    attack(player) {
        return player.health = player.health - this.attackDecrease;
    }
}

/**
 * 
 * @param {number} second 
 * @returns make process wait a minute.
 */
function wait(second) {
    return new Promise((resolve) => setTimeout(resolve, (second * 100)));
}

/**
 * 
 * @param {number} range 
 * @returns return random number by range. 
 */
function randNum(range) {
    return Math.floor(Math.random() * range)
}

/**
 * 
 * @param {number} randNum 
 * @returns make this program create random choice
 */
function getRandComputer(randNum) {
    if(randNum == 0) {
        return 'api';
    } else if( randNum == 1) {
        return 'daun';
    } else {
        return 'air';
    }
}

/**
 * this constanta for id in html
 */
const startPage = document.getElementById('main');
const playerChosePage = document.getElementById('pilih');
const playerFight = document.getElementById('fight');
const selectDefPlayer = document.getElementById('attrDef')

/**
 * Public Variable
 */
let playerDef;
const element = ['api', 'daun', 'air'];

function startGame() {
    startPage.classList.add('hide');
    playerChosePage.classList.remove('hide');
    return;
}

function quitGame() {
    return confirm('apakah kamu yakin?') ? window.location.href = '../index.html' : '';
}

function whoStartFirst() {
    let rand = randNum(2);

    if(rand == 0) {
        alert('player play first!');
    }

    if(rand == 1) {
        alert('computer play first')
    }
}

async function selectDef() {
    startPage.classList.add('hide');
    playerChosePage.classList.add('hide');
    selectDefPlayer.classList.remove('hide');

    document.getElementById('defApi').addEventListener('click', () => {
        playerDef = element[0];
        attack();
    })
    document.getElementById('defDaun').addEventListener('click', () => {
        playerDef = element[1];
        attack();

    })
    document.getElementById('defAir').addEventListener('click', () => {
        playerDef = element[2];
        attack();
    })

    return;
}

function attack() {
    playerChosePage.remove();
    startPage.remove();
    selectDefPlayer.remove();
    playerFight.classList.remove('hide')

    // dom ID
    const health = document.getElementById('myHealth');
    const defense = document.getElementById('myDefense')
    const oppHealth = document.getElementById('opponentHealth')
    const information = document.getElementById('information');

    // default var
    let attackUse;
    let computerAttackUse;
    let oldHP = health.innerHTML;
    let oldComputerHP = oppHealth.innerHTML;
    
    // player
    let myself = new Player('myself', playerDef);
    let computer = new Player('computer', getRandComputer(randNum(3)))

    health.innerHTML += myself.health;
    oppHealth.innerHTML += computer.health;
    defense.innerHTML += myself.defType;

    // harusny disini tuh tiap player di kasih jeda kek player a attack pake... nanti wait 5/10 detik, gituuuu

    document.getElementById('api').addEventListener('click', () => {
        attackUse = element[0];
        computerAttackUse = getRandComputer(randNum(3));
        checkComputer();

    })
    
    document.getElementById('daun').addEventListener('click', () => {
        attackUse = element[1];
        computerAttackUse = getRandComputer(randNum(3));
        checkComputer();

    })
    document.getElementById('air').addEventListener('click', () => {
        attackUse = element[2];
        computerAttackUse = getRandComputer(randNum(3));
        checkComputer();

    })


    function checkComputer() {
        if(myself.health == 0) checkWiner(myself);
        if(computer.health == 0) checkWiner(computer);

        // check 
        information.innerHTML = '';
        information.innerHTML += `kamu menyerang dengan: ${attackUse}, musuh menyerang dengan: ${computerAttackUse}`


        if(computerAttackUse == attackUse) {
        } else if(computerAttackUse == 'api') {
            attackUse == 'daun' ? computer.attack(myself) : myself.health;
            attackUse == 'air' ? myself.attack(computer) : computer.health;
        } else if(computerAttackUse == 'daun') {
            attackUse == 'api' ? myself.attack(computer) : computer.health;
            attackUse == 'air' ? computer.attack(myself) : myself.health;
        } else if(computerAttackUse == 'air') {
            attackUse == 'daun' ? myself.attack(computer) : computer.health;
            attackUse == 'api' ? computer.attack(myself) : myself.health;
        }
        
        // show health myself
        health.innerHTML = oldHP;
        health.innerHTML += myself.health;

        // show health computer 
        oppHealth.innerHTML = oldComputerHP;
        oppHealth.innerHTML += computer.health;
    }

    /**
     * 
     * @param {object} player 
     * @returns to check health player, if < 0 that player can win or lose
     */
    function checkWiner(player) {
        let myConfirm = player.name == 'myself' ? 'You lose, want to try again?' : 'You win, want try again?';

        if(!confirm(myConfirm)) {
            window.location.href = '../index.html'
            return true;
        }

        window.location.reload();
        return true;
    }
}