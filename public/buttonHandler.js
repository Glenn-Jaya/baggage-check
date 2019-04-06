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


    console.log("above action set");
    var action = form.getAttribute("action");
    // prob need to loop through session var to find what need and add to url
    // might not even need sessions var anymore, lets loop through the buttons and find what their value is use lynda notes
    action += "?category=";
    // action += gatherFormData(form);
    console.log("new action: " + action);
    action += this.name;
    console.log(document.getElementById("search-text").value);
    console.log(action);

    var xhr = new XMLHttpRequest();
    xhr.open('GET', action, true);
    // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
      if(xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        // console.log('Result: ' + result);
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

function gatherFormData(form)
{
  // note search icon is also a button so might want to change below later
  var buttons = form.getElementsByTagName('button');
  var array = [];
  for (i=0; i<buttons.length; i++)
  {
    // we could change this so that only buttons with value Yes or something gets chosen
    var buttonNameValue = buttons[i].name + '=' + buttons[i].value;
    // console.log(inputs[i].name + '=' + inputs[i].value);
    array.push(buttonNameValue);
  }
  return array.join('&');
}

var buttons = document.getElementsByClassName("not-selected-btn");
for(i=0; i < buttons.length; i++) {
  console.log('hi');
  buttons.item(i).addEventListener("click", selectButton);
}

});
