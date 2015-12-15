var counter = 1;
var limit = 3;
function addInput(dynamicInput){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Core Value " + (counter + 1) + " <br><input type='text' name='myInputs[]'>";
          document.getElementById(dynamicInput).appendChild(newdiv);
          counter++;
     }
}