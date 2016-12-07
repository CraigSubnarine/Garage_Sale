"use strict";
console.log("Login.js starting");

var base_url="../index.php";


function login(){
    $.post(base_url+"/",checkLogin, "json");
}

function check(records){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    //if(records=true)
    if(rec)
        console.log("login successfully");
    console.log(records);
}