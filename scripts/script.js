//Search results page
function resultsPageReady()
{
    selectResultCategory(1);
}

function selectResultCategory(category)
{
    let phones = document.getElementById("phones-result-holder");
    let tablets = document.getElementById("tablets-results-holder");
    let laptops = document.getElementById("laptops-results-holder");
    let accessories = document.getElementById("accessories-results-holder");

    phones.style.display = "none";
    tablets.style.display = "none";
    laptops.style.display = "none";
    accessories.style.display = "none";

    switch (category)
    {
        case 1:
            phones.style.display = "block";
            break;
        case 2:
            tablets.style.display = "block";
            break;
        case 3:
            laptops.style.display = "block";
            break;  
        case 4:
            accessories.style.display = "block";
            break;
    }
}