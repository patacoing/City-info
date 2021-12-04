const express = require('express');

const articles = express.Router();


articles.use("/",(req,res,next) => {
    res.status(200).json({"message":"requête réussie vers les articles"});
})

//récupérer tous les articles
articles.get("/",(req,res,next) => {

})


//récupérer un articles
articles.get("/:id",(req,res,next) => {
    let id = req.params.id;
})

module.exports = articles;