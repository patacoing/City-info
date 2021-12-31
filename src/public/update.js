window.addEventListener("load",() => {
    document.querySelector("#addingButton").addEventListener("click", () => {
        var name = document.querySelector("#mediaNameAdd").value;
        var link = document.querySelector("#mediaLinkAdd").value;
        var cssSelector = document.querySelector("#mediaCssSelectorAdd").value;
        var idRegion = document.querySelector("#idRegion").value;
        update("http://localhost:3000/medias/","POST",name,link,cssSelector,idRegion,null)
    });
})

function modifier(o,isDeleting){
    isDeleting === false ? 
        update("http://localhost:3000/medias/","PUT",o[0].value,o[2].value,o[3].value,null,o[1].value):
        update("http://localhost:3000/medias/","DELETE",null,null,null,null,o[1].value);
}

function changement(o){
    document.querySelector("#idRegion").value = o.value
}

function update(uri,method,name,link,cssSelector,idRegion,idMedia) {
    console.log("yo");
    var nameVar = name;
    var linkVar = link;
    var cssSelectorVar = cssSelector;
    var idRegionVar = (idRegion != undefined && idRegion != null && idRegion != "") ? idRegion : null;

    var data = {
        name:nameVar,
        link:linkVar,
        cssSelector:cssSelectorVar
    };
    if(idRegionVar != null) data.idRegion = idRegionVar;

    var options = {
        method:method,
        mode:"cors",
        headers:{"Content-type": "application/json"}, 
        body:JSON.stringify(data)
    };
    var param = idMedia != null ? idMedia : "";
    fetch(uri+param,options).then(() => location.reload()).catch((e) => console.log(e));
}