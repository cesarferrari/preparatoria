// Get the table element
var table = document.getElementById("data-table");

// Get the form and data input element
var form = document.getElementById("data-form");
var dataInput = document.getElementById("matr");

// Add a click event listener to the submit button
form.addEventListener("submit", function(event) {
  // Prevent the default form submission
  event.preventDefault();

  // Get the data from the table and set it as the value of the data input
  var rows = table.getElementsByTagName("tr");
  var data = [];
  for (var i = 0; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
    var row = [];
    for (var j = 0; j < cells.length; j++) {
      row.push(cells[j].innerText);
    }
    data.push(row.join(","));
  }
  dataInput.value = data.join("|");

  // Submit the form
  form.submit();
});
