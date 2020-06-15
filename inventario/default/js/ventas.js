




    function agregarProductoATablaAuxiliar(id){


       
//        var tbody = document.getElementById("tbodyAux");
        alert(id);

        var tbody = document.getElementById("tbodyAux");

        var tr = document.createElement("tr"); //Creo un elemento y le asigno un texto

        var td1 = document.createElement("td");
        td1.innerText = "producto1";

        var td2 = document.createElement("td");
        td2.innerText = "1512";

        var td3 = document.createElement("td");
        td3.innerText = "2";

        var td4 = document.createElement("td");
        td4.innerText = "3024";

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);

        tbody.appendChild(tr);

    }
