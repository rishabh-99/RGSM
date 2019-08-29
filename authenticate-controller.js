var Cryptr = require('cryptr');
var axios = require('axios')
cryptr = new Cryptr('myTotalySecretKey');
 
var connection = require('./../config');
module.exports.authenticate=function(req,res){
    var mailId=req.body.mailId;
    var pass=req.body.pass;
   
   
    connection.query('SELECT * FROM userDet WHERE mailId = ?',[mailId], function (error, results, fields) {
      if (error) {
          res.json({
            status:false,
            message:'there are some error with query'
            })
      }else{
       
        if(results.length >0){
  decryptedString = cryptr.decrypt(results[0].pass);
            if(pass==decryptedString){
                axios.post('http://localhost:8080/loginEmail', { name: mailId });
                res.redirect("/");
            }else{
                res.json({
                  status:false,
                  message:"Email and password does not match"
                 });
            }
        }
        else{
          res.json({
              status:false,    
            message:"Email does not exits"
          });
        }
      }
    });
}