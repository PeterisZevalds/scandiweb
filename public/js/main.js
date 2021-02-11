/**
  * ------------------------------------------------------------------------
  * Script that changes product list forms action URL based on selected option.
  * views/products/list.php
  * ------------------------------------------------------------------------
  */

function actionOnSubmit() {

    //Get the select select list and store in a variable
    var selectedOption = document.getElementById("productListOptions");

    //Get the selected value of the select list
    var formAction = selectedOption.options[selectedOption.selectedIndex].value;

    //Update the form action
    document.productListForm.action = formAction;

}


