var Cryptr = require('cryptr');
var express=require("express");
var connection = require('./../config');
// cryptr = new Cryptr('myTotalySecretKey');
 
module.exports.register=function(req,res){
    var today = new Date();
  var encryptedString = cryptr.encrypt(req.body.pass);
    var users={
        "name":req.body.name,
        "lname":req.body.lname,
        "mailId":req.body.mailId,
        "pass":encryptedString
    }
    connection.query('INSERT INTO userDet SET ?',users, function (error, results, fields) {
      if (error) {
        res.json({
            status:false,
            message:'there are some error with query'
        })
      }else{
          res.redirect("http://localhost:8080/login.html");
      }
    });
}