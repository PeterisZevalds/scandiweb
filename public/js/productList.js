/**
  * ------------------------------------------------------------------------
  * Script that dynamically changes form based on type selected.
  * views/products/add.php
  * ------------------------------------------------------------------------
  */
 window.onload = changeProductCard;
 function changeProductCard() {
     var product_type = document.getElementById("product_type").value;
     switch (product_type) {
         case "dvd":
             $("#productCard").addClass("d-none");
             $("#dvdCard").removeClass("d-none");
             $("#furnitureCard").addClass("d-none");
             $("#bookCard").addClass("d-none");
             break;
         case "book":
             $("#productCard").addClass("d-none");
             $("#dvdCard").addClass("d-none");
             $("#furnitureCard").addClass("d-none");
             $("#bookCard").removeClass("d-none");
             break;
         case "furniture":
             $("#productCard").addClass("d-none");
             $("#dvdCard").addClass("d-none");
             $("#furnitureCard").removeClass("d-none");
             $("#bookCard").addClass("d-none");
             break;
     }
 }