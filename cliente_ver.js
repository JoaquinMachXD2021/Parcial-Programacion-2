items = document.getElementsByClassName("item");

console.log(items);

const percentageToMove = 75;

f = true;

t = setTimeout(passSlide, 5500)

actualIndex = 0;

Array.prototype.forEach.call(items, (element, index) =>  {
    element.onclick = () => {
        Array.prototype.forEach.call(items, (el2, i2) =>{
            el2.setAttribute("class", "item");
            el2.style = "transform: translateX(" + ((i2 - index) * percentageToMove) + "%) scale(0.4);";
            
        });
        actualIndex = index;
        clearTimeout(t);
        t = setTimeout(passSlide,2500);
        element.style = "transform: translateX(0)";
        element.setAttribute("class", "item selected");
    }
    s = "transform: translateX(" + index * percentageToMove + "%)"
    if (!f) s+= "scale(0.4);"
    s+= ";"
    f = false; 
    element.style = s;
});

function passSlide(){
    actualIndex++;
    if(actualIndex >= items.length) actualIndex = 0;
    Array.prototype.forEach.call(items, (el2, i2) =>{
        el2.setAttribute("class", "item");
        el2.style = "transform: translateX(" + ((i2 - actualIndex) * percentageToMove) + "%) scale(0.4);";
        
    });
    clearTimeout(t);
    t = setTimeout(passSlide,4000);
    items[actualIndex].style = "transform: translateX(0)";
    items[actualIndex].setAttribute("class", "item selected");
}