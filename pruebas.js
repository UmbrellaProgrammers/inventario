(function(){
    var input = document.getElementById('images'),
        formdata = false;
    
    function mostrarImagenSubida(source){
        var list = document.getElementById('lista-imagenes'),
            li   = document.createElement('li'),
            img  = document.createElement('img');
        
        img.src = source;
        li.appendChild(img);
        list.appendChild(li);
    }
    
    //Revisamos si el navegador soporta el objeto FormData
        formdata = new FormData();

    //Aplicamos la subida de imágenes al evento change del input file
    if(input.addEventListener){
        input.addEventListener('change', function(evt){
            var i = 0, len = this.files.length, img, reader, file;
            
            document.getElementById('response').innerHTML = 'Subiendo...';
            
            //Si hay varias imágenes, las obtenemos una a una
            for( ; i < len; i++){
                file = this.files[i];
                
                //Una pequeña validación para subir imágenes
                if(!!file.type.match(/image.*/)){
                    //Si el navegador soporta el objeto FileReader
                    if(window.FileReader){
                        reader = new FileReader();
                        //Llamamos a este evento cuando la lectura del archivo es completa
                        //Después agregamos la imagen en una lista
                        reader.onloadend = function(e){
                           // mostrarImagenSubida(e.target.result);
                        };
                        //Comienza a leer el archivo
                        //Cuando termina el evento onloadend es llamado
                        reader.readAsDataURL(file);
                    }
                    
                    //Si existe una instancia de FormData
                    if(formdata)
                        //Usamos el método append, cuyos parámetros son:
                            //name : El nombre del campo
                            //value: El valor del campo (puede ser de tipo Blob, File e incluso string)
                        formdata.append('images[]', file);
                }
            }
            
            //Por último hacemos uso del método proporcionado por jQuery para hacer la petición ajax
            //Como datos a enviar, el objeto FormData que contiene la información de las imágenes
            if(formdata){
                $.ajax({
                   url : 'item/upload.php',
                   type : 'POST',
                   data : formdata,
                   processData : false, 
                   contentType : false, 
                   success : function(res){
                       document.getElementById('response').innerHTML = res;
                   }                
                });
            }
        }, false);
    }
}());