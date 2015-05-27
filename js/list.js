$(document).ready(function (){
    

    $('#nylista').click(function(){
        var length = getLength();
       // console.log(length);
        if($('#listnamn').val()==''){
           $('#listnamn').val('Inköpslista #' + (length+1));
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
        $('#btnEdit' + num + '').toggle('slow');
        $('#btnDeleteList' + num + '').toggle('slow');
        
        //$('#btnX' + id + '').toggleClass('show');
   /*         function(){
                $(this).removeClass('active');
                var num = getId($(this));
                $('#btnX' + num + '').hide();
            })
            
       */ 
    })
    $('document').on("click", '.btnDeleteList', function(e){
        alert("sääääker?");
    })
    
    $(document).on("click", '.btnEdit', function(e){
        
        var num = getId($(this));
    
        var location = $('#div' + num +'');
        
        $('.p' + num + '').toggleClass('active');
        $('.btnX', location).fadeToggle('fast');
     
    })
    
    $('document').on("click", '.btnX', function(e){
        console.log("wtf");
        var num = getId($(this));
        console.log(num);
        $('#p' + num + '').hide();
    })
    
    function getId(obj){
        console.log(obj);
        var id = obj.attr('id');
        var num = id.substr(id.length - 1);
        return num;
    }
    function getLength(){
        return $('.listclass').length+1;
    }
    function createList(length){
        return  "<div class='listclass' id='list" + length + "' name='list" + length + "'>"
                +      "<h2>" + $('#listnamn').val() + "</h1>"
                +      "<input type='text' placeholder='Ny produkt' id='prod" + length + "' name='prod" + length + "'>"
                +      "<input type='submit' value='+' class='addp' id='btn" + length + "'>" //med en sluttagg här så förstörs allt, WTF?!
                +      "<form action='../processes/processlist.php' method='POST'>"
                +          "<input type='hidden' value='" + $('#listnamn').val() + "' name='list'>"
                +          "<input type='submit' value='sparalista' class='save' id='save" + length + "' name='save" + length + "'>"
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