// TODO 3: SETUP CONFIG DATABASE
const mysql = require("mysql");
require("dotenv").config();

const db = mysql.createConnection({
    host : process.env.DB_HOST,
    user : process.env.DB_USER,
    password : process.env.DB_PASSWORD,
    database : process.env.DB_NAME
});

db.connect((err)=>{
    if (err){
        console.log(`error connecting : ${err.stack}`);
    }
    console.log(`Connected as id : ${db.threadId}`);
});

module.exports = db;