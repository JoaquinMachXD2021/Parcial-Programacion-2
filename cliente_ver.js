items = document.getElementsByClassName("item");

console.log(items);

const percentageToMove = 75;

f = true;

Array.prototype.forEach.call(items, (element, index) =>  {
    element.onclick = () => {
        Array.prototype.forEach.call(items, (el2, i2) =>{
            el2.setAttribute("class", "item");
            el2.style = "transform: translateX(" + ((i2 - index) * percentageToMove) + "%) scale(0.4);";
            console.log(i2 + index);
        });
        element.style = "transform: translateX(0)";
        element.setAttribute("class", "item selected");
    }
    s = "transform: translateX(" + index * percentageToMove + "%)"
    if (!f) s+= "scale(0.4);"
    s+= ";"
    f = false; 
    element.style = s;
});