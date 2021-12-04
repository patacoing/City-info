var express = require('express');
var app = express();

var port = 3000;

var regions = require('./routers/regions.js');
var medias = require('./routers/medias.js');
var articles = require('./routers/articles.js');


app.use("/regions",regions);
app.use("/medias",medias);
app.use("/articles",articles);


app.listen(port,()=>console.log('listening on port 3000'));