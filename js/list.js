$(document).ready(function (){
    

    $('#nylista').click(function(){
        var length = getLength();
       // console.log(length);
        var list = createList(length);
        $('#box').append(list);
       // console.log($('#box'));
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
    
    $(document).on("click", '.sparalista', function(e){
        
        
    })
    
    function getLength(){
        return $('.listclass').length+1;
    }
    function createList(length){
        return  "<div class='listclass' id='list"+length+"' name='list"+length+"'>"
        //        +   "<form action='page.php'>"
                +       "<input type='text' placeholder='Ny produkt' id='prod"+length+"' name='prod"+length+"'>"
                +       "<input type='submit' value='+' class='addp' id='btn"+length+"'>" //med en sluttagg här så förstörs allt, WTF?!
       //         +   "</form><br>"
                +   "<form action='../processes/processlist.php' method='POST'>"
                +       "<input type='hidden' value='list"+length+"' name='list'>"
                +       "<input type='submit' value='sparalista' class='save' id='save"+length+"' name='save"+length+"'>"
                +   "</form>"
                +"</div>";    
    }
});

//okej, alla kommer ha ett id. När du trycker på en knapp, retrieva id: et från knappen. Kolla vad idt är. Hämta samma inputid. Ta texten därifrån och för in det i den diven som har samma id.

//dataaabaasen. Efter att man skrivit upp allt man vill ha köpt så finns det en knapp som heter spara. Vad den gör är att den då tar alla innehållet i alla inputs, skickar den till servern som där packar ihop den till en query och sen skickas till dbn. När man hämtar det så får php processa det och skriva ut det fint i html, när det uppdateras så uppdateras HELA listan, inte ett litet objektet. Den gamla listan raderas alltså och den nya förs in.

//listid    lista       användare