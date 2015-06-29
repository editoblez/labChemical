            var nomb = "";
            var can = "";
            var nom_formula = "";
            
            var nomb_op = "";
            var can_op = "";
            var num_op = "";
            var fec_op = "";
            
            var nomb_opr = "";
            var can_opr = "";
            var for_opr = "";
            var cos_opr = "";
            var num_opr = "";
            var fec_opr = "";
            var res_opr = "";  
            
            var nomb_ov = "";
            var can_ov = "";
            var cos_ov = "";
            var num_ov = "";
            var fec_ov = "";            
            
            var i = 1;
            function formula(){                
                
                var mat_prima = document.getElementById('idMat_prima').value;
                var cantidad = document.getElementById('idCantidad').value;
                var materias_nombre = [];
                materias_nombre = nomb.split("|");
                for (i=0; i < materias_nombre.length; i++){
                        if (mat_prima === materias_nombre [i]){
                        alert ("No debe repetir las materias primas");
                        return FALSE;
                    }
                }
                if (!mat_prima || 0 === mat_prima.length){
                    alert ("La materia prima no debe estar vacia");
                    return FALSE;
                }
                if (!cantidad || 0 === cantidad.length){
                    alert ("La cantidad no debe estar vacia");
                    return FALSE;
                }
                    
                if (! (cantidad == parseInt(cantidad, 10))){
                    alert ("La cantidad debe ser un entero " +parseInt(cantidad, 10) + " " + cantidad );
                    return FALSE;
                }

                var table = document.getElementById("ingredientes");

// Create an empty <tr> element and add it to the 1st position of the table:                
                var fila = table.insertRow(i);
// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                var celda1 = fila.insertCell(0);
                var celda2 = fila.insertCell(1);

// Add some text to the new cells:
                celda1.innerHTML = mat_prima;
                celda2.innerHTML = cantidad;
                leer_tabla_formula();
            }

            function leer_tabla_formula()
            {
                nomb += document.getElementById("ingredientes").rows[i].cells[0].innerHTML + "|";
                can += document.getElementById("ingredientes").rows[i].cells[1].innerHTML + "|";
                nom_formula = document.getElementById("nom_formula").value;
                i++;
            }

            function enviar_formula()
            {
                var mat_prima = document.getElementById("idMat_prima");
                mat_prima.value = nomb;

                var cantidad = document.getElementById("idCantidad");
                cantidad.value = can;

                var myForm = document.getElementById("idFormula");

                myForm.submit();
            }

            /**
             * @description Setea los valores para ser enviados por post desde el javascript en forma de lista
             * @returns {false en caso de algun error}
             */
            function ordenPedido()
            {
                var mat_prima = document.getElementById('mat_prima').value;
                var cantidad = document.getElementById('cantidad_op').value;              
                //num_op = document.getElementById('idnumero').value;
                fec_op = document.getElementById('idfecha').value;
                
                if (!mat_prima || 0 === mat_prima.length){
                    alert ("La materia prima no debe estar vacia");
                    return FALSE;
                }
                if (!cantidad || 0 === cantidad.length){
                    alert ("La cantidad no debe estar vacia");
                    return FALSE;
                }
                    
                if (! (cantidad == parseInt(cantidad, 10))){
                    alert ("La cantidad debe ser un numero entero ");
                    return FALSE;
                }
                
                var table = document.getElementById("ingredientes_orden_pedido");

// Create an empty <tr> element and add it to the 1st position of the table:                
                var fila = table.insertRow(i);
// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                var celda1 = fila.insertCell(0);
                var celda2 = fila.insertCell(1);

// Add some text to the new cells:
                celda1.innerHTML = mat_prima;
                celda2.innerHTML = cantidad;
                leer_tabla_ordenPedido();
            }

            function leer_tabla_ordenPedido()
            {
                nomb_op += document.getElementById("ingredientes_orden_pedido").rows[i].cells[0].innerHTML + "|";
                can_op += document.getElementById("ingredientes_orden_pedido").rows[i].cells[1].innerHTML + "|";                  
                i++;
            }

            /**
             * @description Funcion para llenar los campos hidden del forumalario
             * @returns {undefined}
             */
            function enviar_ordenPedido()
            {                  
                var nom = document.getElementById("id_nombre");
                nom.value = nomb_op;
                
                

                var cant = document.getElementById("id_cantidad");
                cant.value = can_op;

                var numero = document.getElementById("id_numero");
                numero.value = document.getElementById('idnumero').value;
                
                //alert ("Valor del numero de la solicitud: " + document.getElementById('idnumero').value);
                var fecha = document.getElementById("id_fecha");
                fecha.value = document.getElementById('idfecha').value;

                var myForm = document.getElementById("id_orden_pedido");

                //alert ("name: "+myform.name);
                myForm.submit();
            }

             function ordenProduccion()
            {
                var producto = document.getElementById('idproducto').value;
                var cantidad = document.getElementById('idcantidad').value; 
                var costo = document.getElementById('idcosto').value;                
                var formula = document.getElementById('idformula').value;          
                
                if (!cantidad || 0 === cantidad.length){
                    alert ("La cantidad no debe estar vacia");
                    return FALSE;
                }
                
                 if (! (cantidad == parseInt(cantidad, 10))){
                    alert ("La cantidad debe ser un numero entero ");
                    return FALSE;
                }
                var table = document.getElementById("ingredientes_orden_produccion");

// Create an empty <tr> element and add it to the 1st position of the table:                
                var fila = table.insertRow(i);
// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                var celda1 = fila.insertCell(0);
                var celda2 = fila.insertCell(1);
                var celda3 = fila.insertCell(2);
                var celda4 = fila.insertCell(3);

// Add some text to the new cells:
                celda1.innerHTML = producto;
                celda2.innerHTML = cantidad;
                celda3.innerHTML = costo;
                celda4.innerHTML = formula;
                leer_tabla_ordenProduccion();
            }

            function leer_tabla_ordenProduccion()
            {
                nomb_opr += document.getElementById("ingredientes_orden_produccion").rows[i].cells[0].innerHTML + "|";
                can_opr += document.getElementById("ingredientes_orden_produccion").rows[i].cells[1].innerHTML + "|";          
                cos_opr += document.getElementById("ingredientes_orden_produccion").rows[i].cells[2].innerHTML + "|";                  
                for_opr += document.getElementById("ingredientes_orden_produccion").rows[i].cells[3].innerHTML + "|";                
                
                i++;
            }

            function enviar_ordenProduccion()
            {              
                var producto = document.getElementById("id_producto");
                producto.value = nomb_opr;

                var cant = document.getElementById("id_cantidad");
                cant.value = can_opr;
                
                var cant = document.getElementById("id_costo");
                cant.value = cos_opr;
                
                var formula = document.getElementById("id_formula");
                formula.value = for_opr;
                var numero = document.getElementById("id_numero");
                numero.value = document.getElementById("idnumero").value;
                var fecha = document.getElementById("id_fecha");
                fecha.value = document.getElementById("idfecha").value;
                var responsable = document.getElementById("id_responsable");
                responsable.value = document.getElementById("idresponsable").value;           
                var myForm = document.getElementById("id_orden_produccion");

                //alert ("name: "+myform.name);
                myForm.submit();
            }
            
             function ordenVenta()
            {
                var producto = document.getElementById('idproducto').value;                
                var cantidad = document.getElementById('idcantidad').value;                
                var costo = document.getElementById('idcosto').value;          
                
                
                var table = document.getElementById("ingredientes_orden_venta");

// Create an empty <tr> element and add it to the 1st position of the table:                
                var fila = table.insertRow(i);
// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                var celda1 = fila.insertCell(0);
                var celda2 = fila.insertCell(1);
                var celda3 = fila.insertCell(2);
                

// Add some text to the new cells:
                celda1.innerHTML = producto;
                celda2.innerHTML = cantidad;                
                celda3.innerHTML = costo;
                leer_tabla_ordenProduccion();
            }

            function leer_tabla_ordenVenta()
            {
                nomb_ov += document.getElementById("ingredientes_orden_venta").rows[i].cells[0].innerHTML + "|";
                can_ov += document.getElementById("ingredientes_orden_venta").rows[i].cells[1].innerHTML + "|";                  
                cos_ov += document.getElementById("ingredientes_orden_venta").rows[i].cells[2].innerHTML + "|";                
                
                num_ov = document.getElementById('idnumero').value;                
                fec_ov = document.getElementById('idfecha').value;                
                
                i++;
            }

            function enviar_ordenVenta()
            {                       
                var producto = document.getElementById("id_producto");
                producto.value = nomb_ov;

                var cant = document.getElementById("id_cantidad");
                cant.value = can_ov;
                
                var formula = document.getElementById("id_formula");
                formula.value = cos_ov;

                var numero = document.getElementById("id_numero");
                numero.value = num_ov;
         
                var fecha = document.getElementById("id_fecha");
                fecha.value = fec_ov;             

                var myForm = document.getElementById("id_orden_venta");

                //alert ("name: "+myform.name);
                myForm.submit();
            }
            
            function completar_orden_venta()
            {
                var productos = document.getElementById("idproducto");
                var costos = document.getElementById("idcosto");
                
                var index = productos.selectedIndex;
                costos.selectedIndex = index;
            }
             
            function completar_orden_produccion(selectedID)
            {
                var productos = document.getElementById("idproducto");
                var costos = document.getElementById("idcosto");
                var formula = document.getElementById("idformula");
                
                var index = selectedID.selectedIndex;
                costos.selectedIndex = index;
                formula.selectedIndex = index;
                productos.selectedIndex = index;
            } 