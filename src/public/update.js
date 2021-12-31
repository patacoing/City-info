

function changement(o){
    document.querySelector("#idRegion").value = o.value
}
function actionFormulaire(){
    var nameVar = document.querySelector("#name").value;
    var linkVar = document.querySelector("#link").value;
    var cssSelectorVar = document.querySelector("#cssSelector").value;
    var idRegionVar = document.querySelector("#idRegion").value;

    var data = {
        name:nameVar,
        link:linkVar,
        cssSelector:cssSelectorVar,
        idRegion:idRegionVar
    } ;

    var options = {
        method:"POST",
        mode:"cors",
        headers:{"Content-type": "application/json"}, 
        body:JSON.stringify(data)
    };
    fetch("http://localhost:3000/medias/",options).then(() => location.reload()).catch((e) => console.log(e));
}