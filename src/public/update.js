window.addEventListener("load",() => {
    recupererRegions();
    document.querySelector("#addingButton").addEventListener("click", () => {
        var name = document.querySelector("#mediaNameAdd").value;
        var link = document.querySelector("#mediaLinkAdd").value;
        var cssSelector = document.querySelector("#mediaCssSelectorAdd").value;
        var idRegion = document.querySelector("#idRegion").value;
        update("http://localhost:3000/medias/","POST",name,link,cssSelector,idRegion,null)
    });
})

function recupererRegions(){
    fetch("http://localhost:3000/regions/",{
        method:"GET",
        mode:"cors"
    }).then(res => res.json()).then(res => creerDivRegions(res.regions));
}

function creerDivRegions(regions){
    regions.forEach(region => {
        var div = document.createElement("div");
        div.className = "region";
        div.appendChild(creerDivInfoRegion(region));
        div.appendChild(creerDivMedias(region));
        document.querySelector(".containerRegions").appendChild(div);
    });
}

function creerDivInfoRegion(region){
    var div = document.createElement("div");
    div.className = "infoRegion";
    div.innerHTML = "<form>"+
                        "<input type='hidden' value='"+region.id+"'/>"+
                        "<p>"+region.name+"</p>"+
                        "<span>id : "+region.id+"</span>"+
                        "<span>code : "+region.code+"</span>"+
                        "<span>cheminImg : <input type='text' value='"+region.path+"'/></span>"+
                        "<input type='button' value='Modify' class='modifyingButton' onclick='modifierRegion(this.parentNode)'/>"+    
                    "</form>";
    return div;
}

function creerDivMedias(region){
    var div = document.createElement("div");
    div.className = "medias";
    region.medias.forEach(media => {
        div.appendChild(creerDivMedia(media));
    })
    return div;
}

function creerDivMedia(media){
    var div = document.createElement("div");
    div.className = "media";
    div.innerHTML = "<form>"+
                        "<p><input type='text' name='name'class='mediaNameUpdate' value='"+media.name+"'/></p>"+
                        "<input type='hidden' class='mediaId' value='"+media.id+"'/>"+
                        "<ul>"+
                            "<li>id : "+media.id+"</li>"+
                            "<li>link : <input type='text' name='link' class='mediaLinkUpdate' value='"+media.link+"'/></li>"+
                            "<li>cssSelector : <input type='text' name='cssSelector' class='mediaCssSelectorUpdate' value='"+media.cssSelector+"'></li>"+
                        "</ul>"+
                        "<input type='button' value='Modify' class='modifyingButton' onclick='modifier(this.parentNode,false)'>"+
                        "<input type='button' value='Delete' class='deletingButton' onclick='modifier(this.parentNode,true)'>"+
                    "</form>";
    return div;
}



function modifier(o,isDeleting){
    isDeleting === false ? 
        update("http://localhost:3000/medias/","PUT",o[0].value,o[2].value,o[3].value,null,o[1].value):
        update("http://localhost:3000/medias/","DELETE",null,null,null,null,o[1].value);
}

function modifierRegion(o){
    var idRegion = o[0].value;
    var path = o[1].value;
    var options = {
        method:"PUT",
        mode:"cors",
        headers:{"Content-type": "application/json"}, 
        body:JSON.stringify({"path":path})
    };
    fetch("http://localhost:3000/regions/"+idRegion,options).then().catch(e => console.log(e));
}

function changement(o){
    document.querySelector("#idRegion").value = o.value
}

function update(uri,method,name,link,cssSelector,idRegion,idMedia) {
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
    fetch(uri+param,options).then(res => res.json()).then((res) => {
        if (method == "DELETE"){
            document.querySelector(".media input[value='"+idMedia+"']").parentNode.parentNode.remove();
        }else if(method == "POST"){
            document.querySelector(".infoRegion input[value='"+idRegion+"']").parentNode.parentNode.parentNode.lastChild.appendChild(creerDivMedia({
                id:res.id,       //récupéré via l'api
                name:nameVar,
                link:linkVar,
                cssSelector:cssSelectorVar
            }));
        }

    }).catch((e) => console.log(e));
}