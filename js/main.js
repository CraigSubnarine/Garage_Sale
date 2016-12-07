"use strict";
console.log("JS starting");

var base_url="../index.php";

$(document).ready(function(){
    console.log("All Elements in the Page was successfully loaded, we can begin our application logic");

    // getAllAvalibleItems();
    getItem(1);
});

function getAllAvalibleItems(){
	console.log("Attempting to retrieve all items from the database via AJAX");
    $.get(base_url+"/items", processAllItems, "json"); // When AJAX request is completed successfully, the proccessAllCountries function will be executed with the data as a parameter
}

function processAllItems(records){
    console.log(records);
    createTable(records)
}

function createTable(records){
    var key;
    var sec_id = "#row_sec";
    var htmlStr; //Includes all the table, thead and tbody declarations

    records.forEach(function(el){
        key = "http://localhost:8080/Garage_Sale/index.php/items/"+ el.itemid;
        htmlStr += "<div class='row'>";
        htmlStr +="<div class='col-md-6 panel panel-default text-center'> <div class='panel-heading'> <span class='fa-stack fa-5x'> <i class='fa fa-circle fa-stack-2x text-primary'></i> <i class='fa fa-tree fa-stack-1x fa-inverse'></i> </span> </div> </div>";
        htmlStr +="<div class='col-md-5 panel-body'>";
        htmlStr +="<h4>"+el.itemname+"</h4>";
        htmlStr +="<p>"+el.price+"</p>";
        htmlStr +="<p>"+el.type+"</p>";
        htmlStr +="<a href='"+key+"'><button type='button' class='btn btn-warning'><span class='glyphicon glyphicon-eye-open'></span> View Item</Button></a>";
        htmlStr +="</div>";
        htmlStr +="</div>";

    });

    //htmlStr += "</tbody></table>";
    $(sec_id).html(htmlStr);
}

function getItem(itemid){
    console.log("Attempting to retrieve single item from the database via AJAX");
    console.log($.get(base_url+"/item/"+itemid, processItem, "json"));
    //$.get("/item/"+itemid, processItem, "json");
}

function processItem(records){
    console.log("Hello");
    showItem(records);
}

function showItem(records){
    // var key;
    var sec_id = "#item_sec";
    var htmlStr;

    htmlStr +="<p><i class='fa fa-clock-o'></i>"+records.timestamp+"</p>";
    htmlStr +="<a ><button type='button' class='btn btn-primary btn-success'><span class='glyphicon glyphicon-eye-open'></span> View Owner</button></a>";
    htmlStr +="<a><button type='button' class='btn btn-primary btn-success'><span class='glyphicon glyphicon-unchecked'></span> Interested?</button></a>";
    htmlStr +="<hr>";
    htmlStr +="<img class='img-responsive' src='http://placehold.it/900x300' alt=''>";
    htmlStr +="<hr>";
    htmlStr +="<h3>"+records.itemname+"</h3>";
    htmlStr +="<h4>"+records.price+"</h4>";
    htmlStr +="<h4>"+records.type+"</h4>";
    htmlStr +="<h4>"+records.quantity+"</h4>";
    htmlStr +="<p class='lead'>"+records.description+"</p>";
    htmlStr +="</div></div>";
    $(sec_id).html(htmlStr);
}
