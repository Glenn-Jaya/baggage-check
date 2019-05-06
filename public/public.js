document.addEventListener('DOMContentLoaded', function() {
  var search = document.getElementById("search");

  function showSuggestions(json)
  {
    suggestions.style.display = 'block';
  }

  function getSuggestions()
  {
    var q = search.value;

    console.log('getSuggestions');
    return;
  }
  search.addEventListener("input", getSuggestions);
});
