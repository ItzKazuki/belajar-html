
function tebakKata(kata) {
    let arrKata = [];
    let kataAcak = '';

    // masukin kata ke dalam array
    for(let i = 0; i < kata.length; i++) {
        arrKata.push(kata.charAt(i));
    }
    // acak sort nya pake math random
    const newArrKata = arrKata.sort(() => Math.random() - 0.5) 

    // masukin lagi ke string
    for(let i = 0; i < newArrKata.length; i++){
        kataAcak += newArrKata[i]
    }

    if(kataAcak == kata) {
        return tebakKata(kata);
    }

    // return kata acak nya
    return kataAcak;
}

function tebakAngka(angka1, angka2) {
    const randNum = (range) => Math.floor(Math.random() * range)


    // operator
    const arrOprator = ['+', '-', '*', '/']
    const penjumlahan = (a,b) => a + b;
    const pengurangan = (a, b) => a - b;
    const perkalian = (a, b) => a * b;
    const pembagian = (a, b) => a / b;
    // nilai

    const getOprator = arrOprator[randNum(arrOprator.length)]

    let getNum = randNum(100)
    let getNum2 = randNum(100)

    let hasil;

    switch(getOprator) {
        case '*':
            getNum = randNum(20)
            getNum2 = randNum(10)
            hasil = perkalian(getNum, getNum2);
            break;
        case '/':
            getNum = randNum(20)
            getNum2 = randNum(10)
            hasil = pembagian(getNum, getNum2)
            break;
        case '+':
            hasil = penjumlahan(getNum, getNum2)
            break;
        case '-': 
            hasil = pengurangan(getNum, getNum2)
            break;
    }


    return {getNum, getNum2, getOprator, hasil}

}