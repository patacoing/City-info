const express = require('express');
var connection = require("../database/connection.js");

const medias = express.Router();


medias.use(express.json());       // to support JSON-encoded bodies
medias.use(express.urlencoded()); // to support URL-encoded bodies


//récupérer la liste des médias
medias.get("/",(req,res) => {
    connection.query("SELECT * FROM media",(err,resultat) => {
        if(err) {
            res.status(410).json({"message":"Data unrecheable"});
            throw err;
        }
        res.status(200).json({"medias":resultat});
    });
    
});

//récupérer un média selon l'id
medias.get("/:id",(req,res) => {
    let id = req.params.id;
    connection.query("SELECT * FROM media WHERE id=?",id,(err,resultat) => {
        if(err) throw err;
        if(resultat.length != 0) res.status(200).json({"medias":resultat[0]});
        else res.status(404).json({"message":"Media not found"});
    })
});


//modifier une région selon son id
medias.put("/:id",(req,res) => {
    let id = req.params.id;
});


//ajouter un média
medias.post("/",(req,res) => {
    let name = req.body.name;
    let link = req.body.link;
    let cssSelector = req.body.cssSelector;
    let idRegion = req.body.idRegion;
    connection.query("INSERT INTO media VALUES(0,?,?,?,?)",[name,link,cssSelector,idRegion],(err,resultat) => {
        if(err) {
            res.status(400).json({"message":"Bad request"});
            throw err;
        }
        res.status(200).json({"message":"sucess"});
    })
});

//supprimer un média selon un id
medias.delete("/:id",(req,res) => {
    let id = req.params.id;
    connection.query("DELETE FROM media WHERE id=?",id,(err,resultat) => {
        if(err) {
            res.status(404).json({"message":"Media not found"});
            throw err;
        }
        res.status(200).json({"message":"sucess"});
    })
});




module.exports = medias;