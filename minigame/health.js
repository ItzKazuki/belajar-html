class Person {
    constructor(name, health) {
        this.name = name;
        this.health = health;

    }

    getDescription() {
        return `name: ${this.name}, health: ${this.health}, def`
    }

    decerseHealth(params, type) {
        let types;
        if(!type) {
            this.health = this.health - params;
            return this.health;
        }

        // jadi kalo ada type nya nanti dia bakal incerse(nambahin) damage nya beberapa kali(kek nya random aja)
        if(type == 0) {
            types = 0.5
        } else if( type == 1) {
            types = 1.5
        } else {
            types = 2
        }

        this.health = this.health - (params * types)
        return this.health;
    }
}

let myself = new Person('myself', 100);
let opponent = new Person('opponent', 100);
console.log(myself.getDescription());
console.log(opponent.decerseHealth(50))


/* 
player punya 2, def sm att,
def itu bisa di antara (api, air, daun)
att itu bisa di antara (api, air, daun)
pas start game pilih jenis def nya, 
*/
