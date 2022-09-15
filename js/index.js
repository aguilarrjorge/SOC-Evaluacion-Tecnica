$(document).ready(function()
{

    $(document).on('click','#button_agregar',function(){

        //alert("has presionado agregar")
       $("#list_solicitante").hide();  // hide
       $("#agrega_solicitante").show();  // hide
    });

    $(document).on('click','#button_cancelar', function(){
        $("#list_solicitante").show();  // hide
       $("#agrega_solicitante").hide();  // hide
    })

    /**$(document).on('click','#button_guardar',function(){
        let nombre = document.getElementById('nombre').value;
        let apellidos = document.getElementById('apellidos').value;
        let edad = document.getElementById('edad').value;
        let fecha_nacimiento = document.getElementById('fecha_nacimiento').value;   
        let sexo = document.getElementById('sexo').value;   
        let curp = document.getElementById('curp').value;   
        let correo = document.getElementById('correo').value;  
        
        if(nombre != "" && apellidos != "" && edad != "" && fecha_nacimiento != "" &&
            sexo != "" && curp != "" && correo != "")
        {
          //  alert("nombre"+nombre+" Apellidos: "+apellidos+" edad: "+edad+" Fecha Nac:"+fecha_nacimiento
           // +" Sexo: "+sexo+" Curp:"+curp+" correo: "+correo);  
            $.ajax({
                url:'agrega_solicitante.php',
                type:'POST', 
                data:{'nombre':nombre,'apellidos':apellidos,'edad':edad, 'fecha_nacimiento':fecha_nacimiento,'sexo':sexo
                    ,'curp':curp,'correo':correo},
                
                beforeSend:function(){
                $('#resetPw').hide();  
                $('#resetSuccess').hide();             
            
                },
                success:function(data){ 
                    //$('#loaderGiffff').hide(); 

                    //$('#resetPw').html(data);
                    if (data=='success'){                                                                
                        $('#agrega_solicitante').hide();
                        $('#list_solicitante').show();
                        $("#res").html("<br> * Se guardo con exito. ");
                        
                    }           
                    if(data=='error'){                                                 
                        $('#agrega_solicitante').hide();
                        $('#list_solicitante').show();
                        $("#res").html("<br> * ERROR ");

                    }            
                
                },
                
               
                error:function(){
                    alert("ERROR AJAX");
                    
                },

                
                complete: function(){
                }   
            });
        }
        
        
    })*/
});