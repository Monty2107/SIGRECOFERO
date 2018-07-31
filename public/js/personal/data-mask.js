jQuery(function($){
           // $("#NLocal").mask("a-999");

            // Definimos las mascaras para cada input
            $("#date").mask("99/99/9999");
            $("#facturacion").mask("2099");
            $("#anoPago").mask("2099");
            $("#telefonoMovil").mask("+(999) 9999-9999");
            $("#telefonoFijo").mask("+(999) 9999-9999");
            //$("#letras").mask("aaa");
            // $("#comodines").mask("?");
        });


        // OTRA FORMA DE RELLENAR CON NUMEROS SIN USAR jQuery


        // function validate_int(myEvento) {
        //   if ((myEvento.charCode >= 48 && myEvento.charCode <= 57) || myEvento.keyCode == 9 || myEvento.keyCode == 10 || myEvento.keyCode == 13 || myEvento.keyCode == 8 || myEvento.keyCode == 116 || myEvento.keyCode == 46 || (myEvento.keyCode <= 40 && myEvento.keyCode >= 37)) {
        //     dato = true;
        //   } else {
        //     dato = false;
        //   }
        //   return dato;
        // }
        //
        // function phone_number_mask() {
        //   var myMask = "(___) ____-____";
        //   var myCaja = document.getElementById("telefonoFijo");
        //   var myText = "";
        //   var myNumbers = [];
        //   var myOutPut = ""
        //   var theLastPos = 1;
        //   myText = myCaja.value;
        //   //get numbers
        //   for (var i = 0; i < myText.length; i++) {
        //     if (!isNaN(myText.charAt(i)) && myText.charAt(i) != " ") {
        //       myNumbers.push(myText.charAt(i));
        //     }
        //   }
        //   //write over mask
        //   for (var j = 0; j < myMask.length; j++) {
        //     if (myMask.charAt(j) == "_") { //replace "_" by a number
        //       if (myNumbers.length == 0)
        //         myOutPut = myOutPut + myMask.charAt(j);
        //       else {
        //         myOutPut = myOutPut + myNumbers.shift();
        //         theLastPos = j + 1; //set caret position
        //       }
        //     } else {
        //       myOutPut = myOutPut + myMask.charAt(j);
        //     }
        //   }
        //   document.getElementById("telefonoFijo").value = myOutPut;
        //   document.getElementById("telefonoFijo").setSelectionRange(theLastPos, theLastPos);
        // }
        //
        // document.getElementById("telefonoFijo").onkeypress = validate_int;
        // document.getElementById("telefonoFijo").onkeyup = phone_number_mask;
        //
        // function validate_int(myEvento) {
        //   if ((myEvento.charCode >= 48 && myEvento.charCode <= 57) || myEvento.keyCode == 9 || myEvento.keyCode == 10 || myEvento.keyCode == 13 || myEvento.keyCode == 8 || myEvento.keyCode == 116 || myEvento.keyCode == 46 || (myEvento.keyCode <= 40 && myEvento.keyCode >= 37)) {
        //     dato = true;
        //   } else {
        //     dato = false;
        //   }
        //   return dato;
        // }
