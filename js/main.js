"use strict";
console.log("JS starting");

var base_url="../index.php";

$(document).ready(function(){
    console.log("All Elements in the Page was successfully loaded, we can begin our application logic");
    
    getAllAvalibleItems();
    
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
    var sec_id = "#table_sec";
    var htmlStr = $("#table_heading").html(); //Includes all the table, thead and tbody declarations

    records.forEach(function(el){
        htmlStr += "<tr>";
        htmlStr += "<td>" + el['itemname'] + "</td>";
        htmlStr += "<td>" + el['price'] + "</td>";
        htmlStr += "<td>"+ el['type'] +"</td>";
        htmlStr += "<td><button class='btn btn-primary' onclick=\"display("+el.itemid+")\"><i class='fa fa-eye' aria-hidden='true'></i></button> ";
        //htmlStr += "<button class='btn btn-success' onclick=\"addCart("+el.id+")\"><i class='fa fa-cart-plus' aria-hidden='true'></i></button> ";
        htmlStr += "<button class='btn btn-success' onclick=\"makeInterest("+el.itemid+")\"><i class='fa fa-check' aria-hidden='true'></i></button></td>";
        htmlStr +=" </tr>" ;
    });

    htmlStr += "</tbody></table>";
    $(sec_id).html(htmlStr);
}

function display(el){
    $.get(base_url+"/items/"+el, displayInfo, "json");
}

function displayInfo(rec){
     swal(rec.itemname);
}

function displayError(rec){
  swal("My Products", "Error Occurred", "error");
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