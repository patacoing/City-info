const mysql = require('mysql');

var connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'admin',
    password : 'mysql',
    database : 'regInfo'
});

connection.connect();

module.exports = connection;





