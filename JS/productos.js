function add(accion,id){
  
  switch(accion){
    case 'formUpdate':
      $.confirm({
        title: ' ',
        content: 'url:../class/classBaseDatos.php?accion='+accion+' '+id+'',
        columnClass: 'large',
        type: 'green',
        buttons: {
            aceptar: {
                text: 'Actualizar',
                action: function () {add("update");}
            },
            cancelar: function () {}
        }});
      break;    
        case 'update':
            datos=$("#formEncuesta").serialize();
            $.ajax(
                {
                    url:"../class/classBaseDatos.php?accion="+accion+" "+id+"",
                    data: datos,
                    type: "POST",                    
                    success: function (result){                        
                        $.alert({title:"",content:"Se Actualizo el regisrtro", type:"green"});
                        location.reload();                        
                    }
                    
                }
            );
        break;        
  }
}