"use strict";
console.log("JS starting");

var base_url="../index.php";
var pAuthor;


$(document).ready(function(){
    console.log("All Elements in the Page was successfully loaded");

    getAllAvalibleItems();
    var i=getParameterByName('i');
    console.log("i= "+i);
    getItem(i);
    getUserItems();
});




function getParameterByName(name, url) {//function to extract variables from url
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}



function getAllAvalibleItems(){
	console.log("Attempting to retrieve all items from the database via AJAX");
    $.get(base_url+"/items", processAllItems, "json"); // When AJAX request is completed successfully, the proccessAllCountries function will be executed with the data as a parameter
}

function processAllItems(records){//calls function with results from db
    console.log(records);
    createTable(records);
}

function createTable(records){//List all available items in database
    var sec_id = "#row_sec";
    var htmlStr = "";

    records.forEach(function(el){
        var key='http://localhost:8080/garage_sale/templates/item.php?i='+el.itemid;
        //key = "http://localhost:8080/Garage_Sale/index.php/items/"+ el.itemid;
        htmlStr += "<div class='row'>";
        htmlStr +="<div class='col-md-6 panel panel-default text-center'> <div class='panel-heading'> <span class='fa-stack fa-5x'> <i class='fa fa-circle fa-stack-2x text-primary'></i> <i class='fa fa-tree fa-stack-1x fa-inverse'></i> </span> </div> </div>";
        htmlStr +="<div class='col-md-5 panel-body'>";
        htmlStr +="<h4>"+el.itemname+"</h4>";
        htmlStr +="<p>"+el.price+"</p>";
        htmlStr +="<p>"+el.type+"</p>";
        htmlStr +="<a href='"+key+"'><button type='button' class='btn btn-warning'><span class='glyphicon glyphicon-eye-open'></span> View Item</Button></a>";
        htmlStr +="</div>";
        htmlStr +="</div>" ;


    });

    //htmlStr += "</tbody></table>";
    $(sec_id).html(htmlStr);
}





function getUserItems(){
    console.log("Attempting to retrieve user's items from the database via AJAX");
    $.get(base_url+"/useritems", processUserItems, "json");
}

function processUserItems(records){//calls function with results from db
    console.log(records);
    createTable2(records);
}

function createTable2(records){//List all available items in database
    var sec_id = "#row2_sec";
    var htmlStr="";

    records.forEach(function(el){
        //var key='http://localhost:8080/garage_sale/templates/item.php?i='+el.itemid;
        //key = "http://localhost:8080/Garage_Sale/index.php/items/"+ el.itemid;
        htmlStr += "<div class='row'>";
        htmlStr +="<div class='col-md-6 panel panel-default text-center'> <div class='panel-heading'> <span class='fa-stack fa-5x'> <i class='fa fa-circle fa-stack-2x text-primary'></i> <i class='fa fa-tree fa-stack-1x fa-inverse'></i> </span> </div> </div>";
        htmlStr +="<div class='col-md-5 panel-body'>";
        htmlStr +="<h4>"+el.itemname+"</h4>";
        htmlStr +="<p>"+el.price+"</p>";
        htmlStr +="<p>"+el.type+"</p>";
        htmlStr +="<p>"+el.quantity+"</p>";
        htmlStr +="<button type='button' class='btn btn-primary btn-primary' href='#'><span class='glyphicon glyphicon-edit'></span> Edit Item</i></Button>";
        htmlStr +="<button type='button' class='btn btn-danger btn-primary' href='#'><span class='glyphicon glyphicon-trash'></span> Delete Item</i></Button>";
        //htmlStr +="<a href='"+key+"'><button type='button' class='btn btn-warning'><span class='glyphicon glyphicon-eye-open'></span> View Item</Button></a>";
        htmlStr +="</div>";
        htmlStr +="</div>" ;


    });

    //htmlStr += "</tbody></table>";
    $(sec_id).html(htmlStr);
}






function getItem(itemid){
  console.log("Attempting to retrieve single item from the database via AJAX");
  $.get(base_url+"/items/"+itemid, processItem, "json");
}

function processItem(records){
    console.log(records);
    showItem(records);
}

function showItem(records){
    var link="http://localhost:8080/Garage_Sale/index.php/usrIntr/"+ records.itemid;
    var sec_id = "#item_sec";
    var htmlStr="";
    //console.log("itemname= ");
    var htmlStr;

    htmlStr +="<p><i class='fa fa-clock-o'></i>"+records.timestamp+"</p>";
    htmlStr +="<a ><button type='button' class='btn btn-primary btn-success'><span class='glyphicon glyphicon-eye-open'></span> View Owner</button></a>";
    htmlStr +="<button type='button' class='btn btn-primary btn-success' onclick=\"makeInterest("+records.itemid+")\"><span class='glyphicon glyphicon-unchecked'></span> Interested?</button>";
    htmlStr +="<hr>";
    htmlStr +="<img class='img-responsive' src='http://placehold.it/900x300' alt=''>";
    htmlStr +="<hr>";
    htmlStr +="<h3>Item Name: "+records.itemname+"</h3>";
    htmlStr +="<h4>Price: $"+records.price+"</h4>";
    htmlStr +="<h4>Type: "+records.type+"</h4>";
    htmlStr +="<h4>Quantity Avalible: "+records.quantity+"</h4>";
    htmlStr +="<p class='lead'>"+records.description+"</p>";
    htmlStr +="</div></div>";
    $(sec_id).html(htmlStr);
}















function display(el){
    $.get(base_url+"/items/"+el, displayInfo, "json");
}

function displayInfo(rec){
    getAuthor(rec.userid);
    alert(rec.itemname+": \n"+rec.description+"\nPosted by: "+pAuthor);
}

function displayError(rec){
  //swal("My Products", "Error Occurred", "error");
}



function getAuthor(userid){
    console.log("Attempting to retrieve single user from the database via AJAX");
    console.log("here "+userid);
    return $.get(base_url+"/user/"+userid, processUser, "json")['username'];
}




function processUser(records){
    pAuthor=records.username;
    console.log(records['username']);
    return records.username;
}




function fetchUser(records){

	//$.get(base_url+"/user", getUser, "json");
	console.log(records.userid+" "+records.username);
}




function makeInterest(productId){
    console.log("Declaring Interest in "+productId+"...");
	$.get(base_url+"/usrIntr/"+productId, intResponse, "json");
}

function intResponse(){
    console.log("Interest Made.");
    return;
}



function logout(){
	$.get(base_url+"/logout", function(){

	},"json");

	return false;
}
