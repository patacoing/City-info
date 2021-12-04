const express = require('express');

const regions = express.Router();

regions.use("/",(req,res,next) => {
    res.status(200).json({"message":"requête réussie vers les régions"});
})


//ajouter une régions
regions.post("/",(req,res,next) => {
});

//supprimer une région selon un id
regions.delete("/:id",(req,res,next) => {
    let id = req.params.id;
});

//recupère les infos de toutes les régions, médias compris
regions.get("/",(req,res,next) => {

});

//récupérer les info d'une région selon l'id
regions.get("/:id",(req,res,next) => {
    let id = req.params.id;
});


//modifier une régions
regions.put("/:id",(req,res,next) => {
    let id = req.params.id;
})


module.exports = regions;


