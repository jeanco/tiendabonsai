(() => {

    //Main Accordion for categories
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (var i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            let current = document.getElementsByClassName("active");
            if (current.length != 0) {
                current[0].className = current[0].className.replace(" active", "");
            }

            this.className += " active";
      });
    }


    //SubAccordion for subcategories
    var subAcc = document.getElementsByClassName("subaccordion");
    var u;

    for (var u = 0; u < subAcc.length; u++) {
        subAcc[u].addEventListener("click", function() {
            let current = document.getElementsByClassName("active");
            if (current.length != 0) {
                current[0].className = current[0].className.replace(" active", "");
            }

            this.className += " active";
      });
    }

})()