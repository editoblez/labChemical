function prueba()
{
    var mat_prima = document.getElementById('mat_prima').value;
    var cantidad = document.getElementById('cantidad').value;
    
    var tabla = document.getElementById('ingredientes');
    
    var fila = docment.createElement("tr");
    var celda_mat_prima = document.createElement("td");
    var celda_cantidad = document.createElement("td");
    var textoCelda_mat_prima = document.createTextNode(mat_prima);
    var textoCelda_cantidad = document.createTextNode(cantidad);
    
      celda_mat_prima.appendChild(textoCelda_mat_prima);
      celda_cantidad.appendChild(textoCelda_cantidad);
      
      fila.appendChild(celda_mat_prima);
      fila.appendChild(celda_cantidad);
      
      tabla.appendChild(fila);
      
}
 




