document.addEventListener('DOMContentLoaded', function() {

function selectButton()
{
    var form = document.getElementById("search-form");

    console.log("in select button");
    if (this.classList.contains("not-selected-btn"))
    {
      this.classList.remove("not-selected-btn");
      this.classList.add("selected-btn");
      this.value = "selected";
    }
    else {
      this.classList.remove("selected-btn");
      this.classList.add("not-selected-btn");
      this.value = "not_selected";
    }


    var action = form.getAttribute("action");
    // prob need to loop through session var to find what need and add to url
    action += "?category=";
    action += this.name;
    console.log(action);

    var xhr = new XMLHttpRequest();
    xhr.open('GET', action, true);
    // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
      if(xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        console.log('Result: ' + result);
        document.getElementById("items-list").innerHTML = result;
        // var json = JSON.parse(result);
        // if (json.hasOwnProperty('errors') && json.errors.length > 0)
        // {
        //   displayErrors(json.errors);
        // }
        // else {
        //   postResult(json.volume);
        // }
      }
    };
    xhr.send();
}

var buttons = document.getElementsByClassName("not-selected-btn");
for(i=0; i < buttons.length; i++) {
  console.log('hi');
  buttons.item(i).addEventListener("click", selectButton);
}

});
