var express = require('express');
var cors = require('cors');
var app = express();

app.use(cors());

var port = 3000;

var regions = require('./routers/regions.js');
var medias = require('./routers/medias.js');


app.use("/regions",regions);
app.use("/medias",medias);


app.listen(port,()=>console.log('listening on port 3000'));