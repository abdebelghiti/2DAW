export class Cuadrado extends Forma {
    constructor (lado, color) {
        this.lado;
        this.color;
    }   

    getArea() {
        return this.lado**2;
    }
}