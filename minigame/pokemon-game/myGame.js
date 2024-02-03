/**
 * Notes:
 *  - alur game:
 *    1. player/computer select defense element
 *    2. player/computer mullai attack, kalo def nya beda bakal menang. kalo sama darah nya di up ..
 *    3. ulang terus sampe salah satu player darahnya 0;
 *  - yang belum dibuat yaitu gimana caranya biar random ni, computer/ player bisa select defense dulu baru nyerang, 
 */

class Element {
    /**
     * 
     * @param {string} name 
     * @param {number} damage 
     * @param {number} defense 
     */
    constructor(name, damage, defense) {
        this.name = name;
        this.damage = damage;
        this.defense = defense;
    }
    // api() {
    //     this.name = 'api';
    //     this.attack = 10;
    //     this.defense = 5;
    //     return this;
    // }

    // daun() {
    //     this.name = 'daun';
    //     this.attack = 5;
    //     this.defense = 10;
    //     return this;
    // }

    // air() {
    //     this.name = 'air';
    //     this.attack = 10;
    //     this.defense = 10;
    //     return this;
    // }
    
}

class Player {

    /**
     * 
     * @param {string} name 
     * @param {object} element 
     */
    constructor(name) {
        this.name = name;
        
        // default val
        this.health = 100;
        this.defName = ''// set by setDefense()
    }

    /**
     * 
     * @returns returning information about player.
     */
    getDescription() {
        return `name: ${this.name}, health: ${this.health}, defense: ${this.element.name}`
    }

    /**
     * 
     * @param {object} element 
     * @returns 
     */
    setDefense(element) {
        this.defName = element.name
        return this.elementDefense = element;
    }

    setAttack(element) {
        this.attackName = element.name;
        return this.elementAttack = element;
    }

    /**
     * 
     * @param {object} player 
     * @returns add player health by computer attack.
     */
    addHealth(player) {
        if(this.health >= 100) return false; // check if health >= 100, return false
        this.health = this.health + player.attackDecrease;

        if(this.health >= 100) return this.health = 100; // check if health >= 100, return false

        return this.health;
    }

    /**
     * 
     * @param {object} player 
     * @returns make attack do decerse health computer.
     */
    attack(player) {
        return player.health = player.health - this.elementAttack.damage;
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
 * DOM
 * this constanta from id in html
 */
const startPage = document.getElementById('main');
const playerChosePage = document.getElementById('pilih');
const playerFight = document.getElementById('fight');
const selectDefPlayer = document.getElementById('attrDef')

/**
 * Public Variable
 * this var accept by global
 */
const HOME = '../index.html';
let playerDef;
let computerDef;
let attackUse;
let computerAttackUse;
let whoStartFirst = 0;

const elementList = [new Element('api', 10, 5), new Element('daun', 5, 10), new Element('air', 10, 10)];

// player
let myself = new Player('myself');
let computer = new Player('computer');

/**
 * End Public Variable
 */

/**
 * 
 * @returns show start page.
 */
function startGame() {
    startPage.remove();
    playerChosePage.classList.remove('hide');
    playerChosePage.classList.add('center');
    return;
}

/**
 * 
 * @returns confirmation if you want quit the page.
 */
function quitGame() {
    return confirm('apakah kamu yakin?') ? window.location.href = HOME : '';
}

// /**
//  * 
//  * @returns set who start first, player or computer
//  */
// function whoStartFirst() {
//     let rand = randNum(2);

//     if(rand == 0) {
//         alert('player play first!');
//     }

//     if(rand == 1) {
//         alert('computer play first')
//     }
// }

/**
 * 
 * @returns set player defense page.
 */
async function selectDef() {
    playerChosePage.remove();
    selectDefPlayer.classList.remove('hide');
    selectDefPlayer.classList.add('center');

    document.getElementById('defApi').addEventListener('click', () => {
        playerDef = elementList[0].name;
        myself.setDefense(elementList[0]);
        computerRandSelect('defense');
        attack();
    })
    document.getElementById('defDaun').addEventListener('click', () => {
        playerDef = elementList[1].name;
        myself.setDefense(elementList[1]);
        computerRandSelect('defense');
        attack();

    })
    document.getElementById('defAir').addEventListener('click', () => {
        playerDef = elementList[2].name;
        myself.setDefense(elementList[2]);
        computerRandSelect('defense');
        attack();
    })
    return;
}

function computerRandSelect(type) {
    let comRan = randNum(3);

    if(type == 'defense') {
        if(comRan == 0) {
            computerDef = elementList[0].name;
            computer.setDefense(elementList[0]);
        } else if(comRan == 1) {
            computerDef = elementList[1].name;
            computer.setDefense(elementList[1]);
        } else if(comRan == 2) {
            computerDef = elementList[2].name;
            computer.setDefense(elementList[2]);
        }
    } else if(type == 'attack') {
        if(comRan == 0) {
            computerAttackUse = elementList[0].name;
            computer.setAttack(elementList[0]);
        } else if(comRan == 1) {
            computerAttackUse = elementList[1].name;
            computer.setAttack(elementList[1]);
        } else if(comRan == 2) {
            computerAttackUse = elementList[2].name;
            computer.setAttack(elementList[2]);
        }
    }
}

/**
 * @returns start attack page.
 */
function attack() {
    playerChosePage.remove();
    startPage.remove();
    selectDefPlayer.remove();
    playerFight.classList.remove('hide');

    // dom ID
    const health = document.getElementById('myHealth');
    const defense = document.getElementById('myDefense')
    const compHealth = document.getElementById('computerHealth');
    const compDefense = document.getElementById('computerDefense')
    const information = document.getElementById('information');
    const playerDO = document.getElementById('player-do');
    const playerIs = document.getElementById('attackOrDefense');

    // default var
    const oldHP = health.innerHTML;
    const oldComputerHP = compHealth.innerHTML;
    const oldDefense = defense.innerHTML;
    const oldComputerDefense = compDefense.innerHTML;

    // show health
    health.innerHTML += myself.health;
    compHealth.innerHTML += computer.health;

    // show def
    defense.innerHTML += myself.defName;
    compDefense.innerHTML += computer.defName;

    // harusny disini tuh tiap player di kasih jeda kek player a attack pake... nanti wait 5/10 detik, gituuuu
    if(whoStartFirst == 1) {
        whoStartFirst = 0;
        playerDO.innerHTML = 'Player is attacking';
        playerIs.innerHTML = 'Select your element attack';

        document.getElementById('api').addEventListener('click', () => {
            attackUse = elementList[0].name;
            myself.setAttack(elementList[0]);
            computerRandSelect('defense');
            checkComputer();
            wait(10);
            attack();
        })
        document.getElementById('daun').addEventListener('click', () => {
            attackUse = elementList[1].name;
            myself.setAttack(elementList[1]);
            computerRandSelect('defense');
            checkComputer();
            wait(10);
            attack();
        })
        document.getElementById('air').addEventListener('click', () => {
            attackUse = elementList[2].name;
            myself.setAttack(elementList[2]);
            computerRandSelect('defense');
            checkComputer();
            wait(10);
            attack();
        })
    } else {
        whoStartFirst = 1;
        playerDO.innerHTML = 'computer is attacking';
        playerIs.innerHTML = 'Select your element defense';
    
        document.getElementById('api').addEventListener('click', () => {
            playerDef = elementList[0].name;
            myself.setDefense(elementList[0]);
            computerRandSelect('attack');
            checkComputer();
            wait(10);
            attack();
        })
        document.getElementById('daun').addEventListener('click', () => {
            playerDef = elementList[1].name;
            myself.setDefense(elementList[1]);
            computerRandSelect('attack');
            checkComputer();
            wait(10);
            attack();
    
        })
        document.getElementById('air').addEventListener('click', () => {
            playerDef = elementList[2].name;
            myself.setDefense(elementList[2]);
            computerRandSelect('attack');
            checkComputer();
            wait(10);
            attack();
        })
    }

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
        compHealth.innerHTML = oldComputerHP;
        compHealth.innerHTML += computer.health;
    }

    /**
     * 
     * @param {object} player 
     * @returns to check health player, if < 0 that player can win or lose
     */
    function checkWiner(player) {
        let myConfirm = player.name == 'myself' ? 'You lose, want to try again?' : 'You win, want try again?';

        if(!confirm(myConfirm)) {
            window.location.href = HOME;
            return true;
        }

        window.location.reload();
        return true;
    }
}