var images = null;
var index = 0;
var interval = null;
var searchValue = null;
var selectJson = null;

function init(){
    images = Array.from(document.querySelectorAll("img"));
    interval = setInterval(play,5000,-2);
    document.querySelector("#previous").addEventListener("click", function(){
        clearInterval(interval);
        play(-1);
        interval = setInterval(play,5000,-2);
    });
    document.querySelector("#next").addEventListener("click", function(){
        clearInterval(interval);
        play(-2);
        interval = setInterval(play,5000,-2);
    });

    selectJson = Array.from(document.querySelector("select"));

    document.querySelector("#play").addEventListener("click", function (){
        let selected = document.querySelector("select").selectedIndex;
        console.log(selected);
        clearInterval(interval);
        play(selected);
        interval = setInterval(play,5000,-2);
    });
}

function search(ref){
    setTimeout(()=>{
        searchValue = ref.value;
        let regex = new RegExp("^"+searchValue+"[a-z]+","i");
        console.log(regex);
        let array = [];
        for(let i=0; i<selectJson.length; i++){
            if(regex.test(selectJson[i].text)) {
                array.push([selectJson[i].text, selectJson[i].value]);
                console.log("yo");
            }
        }
        document.querySelector("select").innerHTML = "";
        for(let i=0; i<array.length; i++){
            document.querySelector("select").innerHTML += '<option value="'+array[i][1]+'">'+array[i][0]+"</option>";
        }
    },10);
}


// return the id of the next image to show
function nextImage(sens){
    if(sens == -1){
        if(index-1 < 0) index = images.length-1;
        else index--;
    }else if(sens == -2){
        if(index+1 >= images.length) index = 0;
        else index++;
    }else{
        index = sens;
    }
    return index;
}


function play(sens){
    images[index].style.display = "none";
    let i = nextImage(sens);
    document.querySelector(".region").innerHTML = images[i].alt;
    images[i].style.display = "block";
    document.querySelector('#form-image input[name="region-name"]').value = images[i].alt;
    document.querySelector('#form-image input[name="region-path"]').value = images[i].src;
}

