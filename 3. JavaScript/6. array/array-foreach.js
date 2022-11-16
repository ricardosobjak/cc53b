"use strict";
var fruits = ['Banana', 'Maçã', 'Abacate'];
for (var i = 0; i < fruits.length; i++)
    console.log(i + "=" + fruits[i]);
for (var _i = 0, fruits_1 = fruits; _i < fruits_1.length; _i++) {
    var fruit = fruits_1[_i];
    console.log(fruit);
}
fruits.forEach(function (e, i, a) {
    return console.log(i + "=" + e + " (" + a + ")");
});
