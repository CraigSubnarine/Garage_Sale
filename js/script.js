var app = angular.module("Project",["ngRoute"]).config(function($routeProvider){
    $routeProvider
      .when("/home",{
        templateUrl: "Templates/home.html",
        controller: "homeController"
      })
      .when("/about",{
        templateUrl: "Templates/about.html",
        controller: "aboutController"
      })
      .when("/cart",{
        templateUrl: "Templates/cart.html",
        controller: "cartController"
      })
      .when("/contact",{
        templateUrl: "Templates/contact.html",
        controller: "contactController"
      })
      .when("/map",{
        templateUrl: "Templates/map.html",
        controller: "mapController"
      })
      .when("/sale",{
        templateUrl: "Templates/sale.html",
        controller: "saleController"
      })
    })
//method chaining for controllers
      .controller("homeController", function($scope){
        $scope.message="Home Page";
      })
      .controller("aboutController", function($scope){
        $scope.message="About Page";
      })
      .controller("cartController", function($scope){
        $scope.message="Cart Items";
      })
      .controller("contactController", function($scope){
        $scope.message="Contact"
      })
      .controller("mapController", function($scope){
        $scope.message="Map";
      })
      .controller("saleController", function($scope){
        $scope.items=["Blender", "Samsung 32inch Television", "Black & Decker cordless drill"];
      });
