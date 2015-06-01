$(document).ready(function (){
    
    $('#nylista').click(function(){
        var length = getLength();
       // console.log(length);
        if($('#listnamn').val()==''){
           $('#listnamn').val('Inköpslista');
        }
        var list = createList(length);
        $('#box').append(list);
       // console.log($('#box'));
        $('#listnamn').val("");
        })
    
    $(document).on("click", '.addp', function(e){
    //    console.log($('#list1'));
      //  console.log($('#btn1'));
            
        var id = $(this).attr('id');
   //         console.log(id)
        var num = id.substr(id.length - 1);
    //        console.log(num);
        var produkt = $('input[name=prod'+num+']').val();
    //        console.log(produkt);
        $('#save'+num+'').before("<input type='text' class='prodclass' name='prodarray[]' value='" + produkt + "' readonly='readonly'><br>");
        $('#prod'+num+'').val("");

    })
    
    $(document).on("click", '.btnShow', function(e){
        
        var num = getId($(this));
        var location = $('div' + num +'');
        
        $('.p'+num+'').toggle('active');
        $('#btnEdit' + num + '').slideToggle('fast');
        $('#btnDeleteList' + num + '').slideToggle('fast');
        
        //$('#btnX' + id + '').toggleClass('show');
   /*         function(){
                $(this).removeClass('active');
                var num = getId($(this));
                $('#btnX' + num + '').hide();
            })
            
       */ 
    })
    $(document).on("click", '.btnDeleteList', function(e){
    //    alert("sääääker?");
    })
    
    $(document).on("click", '.btnEdit', function(e){
        
        var num = getId($(this));
    
        var location = $('#div' + num +'');
        
        $('#txtAdd' + num + '').toggle('slow');//prop("type", "text");
        console.log($('#txtAdd' + num + ''));
        $('#btnAdd' + num + '').toggle('fast');
        
        $('.p' + num + '').toggleClass('active');
        $('.btnX', location).fadeToggle('fast');
     
    })
    
    $(document).on("click", '.btnX', function(e){
        var num = getId($(this));
        
        var formnum = getId($(this).parent());
        var location = $('#div' + formnum + '');
        
        var value = $('#p' + num + '', location).text();
        console.log(value);
        $('#btnEdit').val('spara');
  //      alert(value);
        
        $('#form' + formnum + '').append("<input type='hidden' value='" + value + "' name='Delete[]'>");
        $('#p' + num + '', location).hide();
        $('#btnX' +  num + '', location).hide();
        console.log($('#btnEdit'+ num +''));
        $('#btnEdit' + formnum + '').prop('type', 'submit');
        $('#btnEdit' + formnum + '').val('spara');
        console.log("wtf");

    })
     $(document).on("click", '.btnAdd', function(e){
         
         var num = getId($(this));
         
         var formnum = getId($(this).parent());
         
         var produkt = $('input[id="txtAdd'+num+'"]').val();
         
         var newnum = $('.p' + num + '').length + 1;
         
         console.log($('#div' + formnum + ''));
         $('#form' + formnum + '').append("<input type='hidden' value='" + produkt + "' name='Add[]'>");
         $('#form' + formnum + '').before("<p class='p"+num+" active' id='p"+newnum+"' style='display: block;'>"+produkt+"</p>");
         $('#p'+newnum+'').after("<input type='button' class='btnX' value='x' id='btnX"+newnum+"'>");
         $('#txtAdd' + num + '').val("");
         
         $('#btnEdit' + formnum + '').prop('type', 'submit');
         $('#btnEdit' + formnum + '').val('spara');
         
     })
    
     $(document).on("click", '.showCom', function(e){
         var num = getId($(this));
         
         $('#listCom' + num + '').toggle('fast');
         $('#textarea').val("");
         
     })
     
     $(document).on("click", '.btnShare', function(e){
         var num = getId($(this));
         
         $('#shareform' + num + '').toggle('fast');
             
             //"<input type='text' name='sharedUser'><input type='submit' value='Dela'>");
         
         
     })
    function getId(obj){
        console.log(obj);
        var id = obj.attr('id');
        var num = id.substr(id.length - 1);
        return num;
    }
    function getLength(){
        return $('.listclass').length + 1;
    }
    function createList(length){
        return  "<div class='listclass' id='list" + length + "' name='list" + length + "'>"
                +      "<h2>" + $('#listnamn').val() + "</h1>"
                +      "<input type='text' placeholder='Ny produkt' id='prod" + length + "' name='prod" + length + "'>"
                +      "<input type='submit' value='+' class='addp' id='btn" + length + "'>" //med en sluttagg här så förstörs allt, WTF?!
                +      "<form action='../processes/processlist.php' method='POST'>"
                +          "<input type='hidden' value='" + $('#listnamn').val() + "' name='list'>"
         //       +           "<input type='file' name='image'>"
                +          "<input type='submit' value='spara lista' class='save' id='save" + length + "' name='save" + length + "'>"
                +   "</form>"
                +"</div>";    
    }
});

//okej, alla kommer ha ett id. När du trycker på en knapp, retrieva id: et från knappen. Kolla vad idt är. Hämta samma inputid. Ta texten därifrån och för in det i den diven som har samma id.

//dataaabaasen. Efter att man skrivit upp allt man vill ha köpt så finns det en knapp som heter spara. Vad den gör är att den då tar alla innehållet i alla inputs, skickar den till servern som där packar ihop den till en query och sen skickas till dbn. När man hämtar det så får php processa det och skriva ut det fint i html, när det uppdateras så uppdateras HELA listan, inte ett litet objektet. Den gamla listan raderas alltså och den nya förs in.

//listid    lista       användare

//listan skapas men tilldelas ett autoincrementat id av db, value för 'name' kommer istället att vara det namn som användaren döper
//listan till igenom ett input som i dbn = listName, listan Måste döpas annars, blir värdet 'inköpslista'.


//en lista raderas genom att det den ingår i ett form som innehåller en gömd input med listid'et. När man klickar på knappen 'radera lista' submitas den till servern som där tar hand om det.

//En lista redigeras igenom att inputen man klickar bort, addas till det gömda formet runt knappen ändra, om man redigerar det så kommer värdet läggas till och när man submitar postas det till servern.

//Man kan adda saker till en lista igenom att ett inputfield kommer fram när man klickar på ändra (hur?), som har en knapp som addar inputfieldet dels som en paragraf i listan, och dels som en hidden input i fieldet som ska submittas med name='add', det som ska raderas får ha name='delete';

//kommentarsfält. När listorna printas ut, så kommer möjligheten att kommentera dom, alla som har behörighet till listan. Det kommer finnas en knapp som är visa kommentarsfält, en div som redan är skapad men med display nonen som med vår vän jQuery kommer att visa den. Ett input-field och en knapp som är skriv kommentar.