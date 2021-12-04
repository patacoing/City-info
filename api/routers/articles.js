const express = require('express');

const articles = express.Router();


articles.use("/",(req,res,next) => {
    res.status(200).json({"message":"requête réussie vers les articles"});
})


module.exports = articles;