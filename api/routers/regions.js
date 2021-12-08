const express = require('express');
var connection = require("../database/connection.js");

const regions = express.Router();

regions.use(express.json());       // to support JSON-encoded bodies
regions.use(express.urlencoded()); // to support URL-encoded bodies


//ajouter une régions
regions.post("/",(req,res,next) => {
    let code = req.body.code;
    let name = req.body.name;
    let path = req.body.path;
    connection.query('INSERT INTO region VALUES(0,?,?,?)',[code,name,path],(err, resultat) => {
        if(err) {
            res.status(400).json({"message":"Bad request"});
            throw err;
        }
        res.status(200).json({"message":"success"});
    });
});

//supprimer une région selon un id
regions.delete("/:id",(req,res,next) => {
    let id = req.params.id;
    connection.query("DELETE FROM media WHERE idRegion = ?",id,(err, resultat) => {
        if(err) {
            res.status(404).json({"message":"Region not fund"});
            throw err;
        }
        else {
            connection.query("DELETE FROM region WHERE id=?",id,(err,result)=>{
                res.status(200).json({"message":"success"});
            })
        }
    });
});

//recupère les infos de toutes les régions, médias compris
regions.get("/",(req,res) => {
    connection.query("SELECT * FROM region",(err, resultat) => {
        if(err) {
            res.status(406).json({"message":"Data unreacheable"});
            throw err;
        }
        for(let i = 0; i < resultat.length; i++) {
            connection.query("SELECT * FROM media WHERE idRegion = ?",resultat[i].id,(err,result) =>{
                resultat[i].medias = result;
                //wait until reaching the end / make a promise function 
                if(i == resultat.length - 1) res.status(200).json({"regions":resultat});
            });
        }        
    });
});

//récupérer les info d'une région selon son code
regions.get("/:code",(req,res,next) => {
    let code = req.params.code;
    connection.query("SELECT * FROM region WHERE code = ?",code,(err,resultat) => {
        if(err) throw err;
        if(resultat.length == 0)res.status(404).json({"message":"Region not found"});
        else{
            resultat = resultat[0];
            connection.query("SELECT * FROM media WHERE idRegion = ?",resultat.id,(err,result)=>{
                resultat.medias = result;
                res.status(200).json({"regions":resultat});
            })
        }   
    });
});


//modifier une régions
regions.put("/:id",(req,res,next) => {
    let id = req.params.id;
})


module.exports = regions;


