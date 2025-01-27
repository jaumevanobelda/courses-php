
function validate_texto(texto){

    if(texto.length > 0){
        let regex= /[a-z A-Z]*/;
        console.log(texto + " " + regex.test(texto));
        return regex.test(texto);
    }
    return false;
}
function validate_fecha(fecha){

    if(fecha.length > 0){
        let regex= /[0-9]{2}[/][0-9]{2}[/][0-9]{4}/;
        console.log(fecha + " " + regex.test(fecha));
        console.log("Otro metodo " + new Date(fecha));
        return regex.test(fecha);
    }
    return false;
}
function validate_checked(radio){
    Bool=false;
    if(radio.length > 0){
        radio.forEach(element => {
            console.log("checked element: " + element.value);
            console.log("Checked= " + element.checked);
            if(element.checked){
                Bool = true;
            }
        });
        return Bool;
    }
    return false;
}
function validate_array(array){
    Bool=false;
    if(array.length > 0){
        array.forEach(element => {
            console.log("LLenguatje: "+ element);
            if(element != null){
                Bool = true;
            }
        });
        return Bool;
    }
    return false;
}
function validate_Dates(s,e,b){
    let sa = s.split("/");
    let se = e.split("/");
    let sb = b.split("/");
    let start_str= sa[1] + "/" + sa[0]  + "/" +sa[2];
    let end_str= se[1] + "/" + se[0]  + "/" +se[2];
    let buydate_str= sb[1] + "/" + sb[0]  + "/" +sb[2];
    console.log("Test date: " + new Date(start_str));
    let start = new Date(start_str);
    let end = new Date(end_str);
    let buydate = new Date(buydate_str);
    console.log("Start: " + start.toLocaleString() + " End: " + end.toLocaleString() + " Buydate: " + buydate.toLocaleString()  );
    let bool = true;
    if(start >= end){
        bool = false;
        document.getElementById('error_start').innerHTML = "La fecha de inicio no puede ser mayor o igual a la de final" + document.getElementById('error_start').innerHTML;
        document.getElementById('error_end').innerHTML = "La fecha de final no puede ser menor o igual a la de inicio" + document.getElementById('error_end').innerHTML;
    }
    if(buydate >= start){
        bool = false;
        document.getElementById('error_buydate').innerHTML = "La fecha de compra tiene que ser anterior al curso" + document.getElementById('error_buydate').innerHTML; 
    }
    return bool;
}

function validate(type) {
    error = ["error_nombre","error_descripcion","error_categoria","error_nivel","error_precio","error_start","error_end","error_buydate","error_llenguatge"];
    error.forEach(element => {
        document.getElementById(element).innerHTML = "";
    });

    let validate = true;
    let nombre = document.getElementById('nombre').value;
    let descripcion = document.getElementById('descripcion').value;
    let categoria = document.getElementsByName('categoria');
    let llenguatge = document.getElementsByName('llenguatge[]');
    let nivel = document.getElementById('nivel').value;
    let precio = document.getElementById('precio').value;
    let start = document.getElementById('start').value;
    let end = document.getElementById('end').value;
    let buydate = document.getElementById('buydate').value;
    let v_nombre = validate_texto(nombre);
    let v_descripcion = validate_texto(descripcion);

    if(!v_nombre){
        document.getElementById('error_nombre').innerHTML = "El nombre introducido es incorrecto " + document.getElementById('error_nombre').innerHTML;
        validate = false;
    }
    
    if(!v_descripcion){
        document.getElementById('error_descripcion').innerHTML = "La descripcion introducida es incorrecta " + document.getElementById('error_descripcion').innerHTML;
        validate = false;
    }
    if(precio < 0){
        document.getElementById('error_precio').innerHTML = "El Precio no puede ser negativo" + document.getElementById('error_precio').innerHTML;
        validate = false;
    }
    if(!validate_checked(llenguatge)){
        console.log("validate llenguatge: " + false);
        document.getElementById('error_llenguatge').innerHTML = "Ningun llenguatge selecionat" + document.getElementById('error_categoria').innerHTML;
        validate = false;
    }
    if(!validate_Dates(start,end,buydate)){
        validate = false;
    }

    if(!validate_fecha(start)){
        document.getElementById('error_start').innerHTML = "Fecha incorrecta";
        validate = false;
    }
    if(!validate_fecha(end)){
        document.getElementById('error_end').innerHTML = "Fecha incorrecta";
        validate = false;
    }
    if(!validate_fecha(buydate)){
        document.getElementById('error_buydate').innerHTML = "Fecha incorrecta";
        validate = false;
    }
    console.log(categoria.length + " Categoria");

    if(!validate_checked(categoria)){
        console.log("validate categ: " + !validate_checked(categoria));
        document.getElementById('error_categoria').innerHTML = "Ninguna categoria selecionada" + document.getElementById('error_categoria').innerHTML;
        validate = false;
    }
    console.log(validate);
    if(validate === true){
        document.getElementById( type + "_course").submit();
            //document.getElementById("create_course").action = "index.php?page=controller_course&op=create";
    }

}

$(document).ready(function(){
    $('#navinicio').click(function(){
        $('#navinicio').attr('class','active');
    })
})
$(document).ready(function(){
    $('#navCurso').click(function(){
        $('#navCurso').attr('class','active');
    })
})


$(document).ready(function() {
    $('.read_course').click(function() {
        console.log("aaaaaaa");
        let id = this.getAttribute('id');
        ajaxPromise('module/course/controller_course.php?op=read_modal', 'POST',"JSON",{id:id}).then(function(data){
            console.log("aaaaaaaaaajaaaaaaaxxx");

            $('<div></div>').attr('id','readonediv','type','hidden').appendTo('#readone');
             $('#readonediv').html(function(){
                 let table='<table border="2px" id="table_read_one">';
                 console.log(data);
                 for(row in data){
                     table += '<tr> <td>'+ row + ':</td> <td> ' +data[row] + '</td> </tr>'
                 }
                 return table;
            });
            $("#readonediv").show();
            window_modal("#readone");            
        })

       

    }) 
   


}) 
    function window_modal(id){
            console.log(id);
            $(id).dialog({
                width:"auto",
                heigth:"auto",
                show:"scale",
                hide:"scale",
                resizable:"false",
                modal:"true",
                position:"fixed",
                buttons:{
                    Aceptar:function(){
                        $(this).dialog("close");
                    }
   
                },
                show: {
                    effect:"blind",
                    duration: 1000
                },
                hide:{
                    effect:"fold",
                    duration:1000
                }
   
               });
        }