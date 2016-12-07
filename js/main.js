"use strict";
console.log("JS starting");

var base_url="../index.php";
var pAuthor;


$(document).ready(function(){
    console.log("All Elements in the Page was successfully loaded");

    getAllAvalibleItems();

});  


var urlParam = function(name, w){
    w = w || window;
    var rx = new RegExp('[\&|\?]'+name+'=([^\&\#]+)'),
        val = w.location.search.match(rx);
    return !val ? '':val[1];
}

function getAllAvalibleItems(){
	console.log("Attempting to retrieve all items from the database via AJAX");
    $.get(base_url+"/items", processAllItems, "json"); // When AJAX request is completed successfully, the proccessAllCountries function will be executed with the data as a parameter
}



function processAllItems(records){//calls function with results from db
    console.log(records);
    createTable(records)
}

function createTable(records){//List all available items in database
    var key;
    var link='http://localhost:8080/garage_sale/templates/item.php';
    var sec_id = "#row_sec";
    var htmlStr;

    records.forEach(function(el){
        htmlStr += "<div class='row'>";
        htmlStr +="<div class='col-md-6 panel panel-default text-center'> <div class='panel-heading'> <span class='fa-stack fa-5x'> <i class='fa fa-circle fa-stack-2x text-primary'></i> <i class='fa fa-tree fa-stack-1x fa-inverse'></i> </span> </div> </div>";
        htmlStr +="<div class='col-md-5 panel-body'>";
        htmlStr +="<h4>"+el.itemname+"</h4>";
        htmlStr +="<p>"+el.price+"</p>";
        htmlStr +="<p>"+el.type+"</p>";
        htmlStr += "<td><button class='btn btn-primary' onclick=\"display("+el.itemid+")\"><i class='fa fa-eye' aria-hidden='true'></i></button> ";
        //htmlStr +="<button type='button' class='btn btn-warning' href=\"http://localhost:8080/garage_sale/templates/item.php\"'><span class='glyphicon glyphicon-eye-open'></span> View Product</i></Button>";
        // htmlStr +="<form action='http://localhost:8080/garage_sale/templates/item.php?Use_Id='"+el.itemid+">"+"<input type='submit' class='btn btn-warning' value='Veiw Item' />"+"</form>";
        htmlStr +="</div>";
        htmlStr +="</div>" ;


    });

    //htmlStr += "</tbody></table>";
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


function getItem(itemid){
    console.log("Attempting to retrieve single item from the database via AJAX");
    $.get(base_url+"/items/"+itemid, processItem, "json");
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

function processItem(records){
    console.log(records);
    showItem(records);
}

function showItem(records){
    var key;
    var sec_id = "#item_sec";
    var htmlStr = $("#table_heading").html();

    htmlStr +="<p><i class='fa fa-clock-o'></i> Posted on August 24, 2013 at 9:00 PM</p>";
    htmlStr +="<button type='button' class='btn btn-primary btn-success' href='#''><span class='glyphicon glyphicon-eye-open'></span> View Owner</i></Button>";
    htmlStr +="<button type='button' class='btn btn-primary btn-success' href='#''><span class='glyphicon glyphicon-unchecked'></span> Interested?</i></Button>";
    htmlStr +="<hr>";
    htmlStr +="<img class='img-responsive' src='http://placehold.it/900x300' alt=''>";
    htmlStr +="<hr>";
    htmlStr +="<h3>"+records.itemname+"</h3>";
    htmlStr +="<h4>Price</h4>";
    htmlStr +="<h4>Type</h4>";
    htmlStr +="<h4>Quantity Avalible</h4>";
    htmlStr +="<p class='lead'></p>";
}

function fetchUser(records){

	//$.get(base_url+"/user", getUser, "json");
	console.log(records.userid+" "+records.username);
}




function makeInterest(productId){
	/*
    $("#cart_form").show("slow");
    $.get(base_url + "/products/"+productId, function(product){
        $("#productId").val(product.id);
        $("#productPrice").val(product.price);
        $("#productName").val(product.name);
    }, "json");
*/
	//var usr=fetchUser();
	$.get(base_url+"/user", fetchUser, "json");

	$.get(base_url+"/usrIntr");

}

function logout(){
	$.get(base_url+"/logout", function(){

	},"json");

	return false;
}