const express = require('express');
const medias = express.Router();



medias.use("/",(req,res,next) => {
    res.status(200).json({"message":"requête réussie vers les medias"});
})





module.exports = medias;