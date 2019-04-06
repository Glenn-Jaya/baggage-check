document.addEventListener('DOMContentLoaded', function() {

function selectButton()
{
    if (this.classList.contains("not-selected-btn"))
    {
      this.classList.remove("not-selected-btn");
      this.classList.add("selected-btn");
      // this.value = "selected";
      // this.value += <?php $categories?>; // producered error
      
    }
    else {
      this.classList.remove("selected-btn");
      this.classList.add("not-selected-btn");
      // this.value = "not_selected";
    }
}

var buttons = document.getElementsByClassName("not-selected-btn");
for(i=0; i < buttons.length; i++) {
  buttons.item(i).addEventListener("click", selectButton);
}

});
