const express = require('express');
const medias = express.Router();



medias.use("/",(req,res,next) => {
    res.status(200).json({"message":"requête réussie vers les medias"});
})


//récupérer la liste des médias
medias.get("/",(req,res,next) => {

});

//récupérer un média selon l'id
medias.get("/:id",(req,res,next) => {
    let id = req.params.id;
});


//modifier une région selon son id
medias.put("/:id",(req,res,next) => {
    let id = req.params.id;
});


//ajouter un média
medias.post("/",(req,res,next) => {

});

//supprimer un média selon un id
medias.get("/:id",(req,res,next) => {
    let id = req.params.id;
});




module.exports = medias;