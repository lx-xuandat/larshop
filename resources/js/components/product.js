// Product Class: represents a Product
class Product {
    constructor(name, code, price, quantity, description, images, rate, weight, status) {
        this.name = name;
        this.code = code;
        this.price = price;
        this.quantity = quantity;
        this.description = description;
        this.images = images;
        this.rate = rate;
        this.weight = weight;
        this.status = status;
    }
}

// Storage class: Handle Storage Tasks
class Storage {

}

// UI class: Handle UI Tasks
class UI {
    static display() {
        const products = 1;
    }
}

document.querySelector('.click-me').addEventListener('click', (e) => {
    // Prevent actual submit
    e.preventDefault();

    alert('ban vua click tpoi');

});

