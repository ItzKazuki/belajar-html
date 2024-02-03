/**
 * Importat!
 * this is a simulation of use database use js (nosql)
 * this not scure becouse all data has saved in memory local (your device)
 * please don't use this program for your code, its just for fun
 * Make happy you day!
 */

class Warga {
    constructor(nama, umur, alamat) {
        this.nama = nama;
        this.umur = umur;
        this.alamat = alamat;
        this.friend = [];
    }

    /**
     * 
     * @param {string} lang 
     * @returns greatings from any language, like id, en, jp, etc.
     */
    greatings(lang) {
        switch(lang) {
            case 'id':
                return `Halo, nama saya ${this.name}, saya berumur ${this.umur}. Rumah saya berada di ${this.alamat}`;
            case 'en':
                return ``;
            default:
                console.log('you must add lang to this function')
                return 0;
        }
    }

    /**
     * 
     * @param {object} friend 
     */
    addFriend(friend) {
        this.friend.push(friend.name)
    }
}

/**
 * 
 * @param {array} array 
 * @returns true or false, that array have duplicate data
 */
function checkDuplicate(array) {
    let valArr = array.map(item => item.name);
    return valArr.some((item, index) => {
        valArr.indexOf(item) != index;
    })
}

const btnSubmit = document.getElementById('btn-submit');
const dataWarga = document.getElementById('data-warga');
let warga = [];

btnSubmit.addEventListener('click', () => {
    // get all value from input
    let nama = document.getElementById('name');
    let umur = document.getElementById('umur');
    let alamat = document.getElementById('alamat');
    // before push data, make sure data has input is not duplicate, and can dikenali by id.
    // im must be loop again the array and check the value is same or not.
    console.log(checkDuplicate(warga))
    // add to class and put to array
    warga.push(new Warga(nama.value, umur.value, alamat.value));
    // remove value data-warga (reset to default)
    dataWarga.innerHTML = '';
    // show array update when this button clicked
    warga.forEach((data, index) => {
        dataWarga.innerHTML += `
        <ul>
            <li>Warga-ke: ${index}</li>
            <li>Nama: ${data.nama}</li>
            <li>Umur: ${data.umur}</li>
            <li>Alamat: ${data.alamat}</li>
        </ul>
        `
    })
})