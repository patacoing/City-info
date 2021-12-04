const express = require('express');

const regions = express.Router();

regions.use("/",(req,res,next) => {
    res.status(200).json({"message":"requête réussie vers les régions"});
})



module.exports = regions;


