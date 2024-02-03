// object biasa
// let himpunanBilangan = [1, 2, 3, 4, 5, 6];

// console.log('data ganjil:')
// himpunanBilangan.forEach((data) => {
//     if(data % 2 != 1) return;
//     console.log(data)
// })

class Orang {
    constructor(nama, umur, alamat) {
        this.nama = nama;
        this.umur = umur;
        this.alamat = alamat;
    }
}

const orang = [new Orang('kazuki', 10, 'cakung'), new Orang('agus', 19, 'cakung timur'), new Orang('ipin', 23, 'cakung'), new Orang('rahdi', 25, 'bekasi')]

const test = new Orang({nama: 'aaaa', umur: 10,})
orang.forEach(orang => {
    if(orang.umur <= 10 || orang.alamat != 'cakung') return;
    console.log(orang)
})