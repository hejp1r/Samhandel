$(document).ready(function (){
    

    $('#nylista').click(function(){
        var length = getLength()
       // console.log(length);
        var list = createList(length);
        $('#box').append(list);
       // console.log($('#box'));
        
   /*     $('.addp').click(function(){
            var id = $(this).attr('id');
            console.log(id)
            var num = id.substr(id.length - 1);
            console.log(num);
            var produkt = $('input[name=prod'+num+']').val();
            console.log(produkt);
            var $lista = $('#list'+num+'').selector;
             $('.list').append("<p>" + produkt + "</p>");
            console.log($('#list'+num+''));

  /*          console.log($(this).attr('id'));
            var produkt = $('input[name=prod'+length+']').val();
            console.log(produkt);
            $('.list').append("<p>" + produkt + "</p>");*/
            
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
        $('#list'+num+'').append("<p>" + produkt + "</p>");

    })
    
    $(document).on("click", '.sparalista', function(e){
        
        
    })
    
    function getLength(){
        return $('.list').length+1;
    }
    function createList(length){
        return  "<div class='list' id='list"+length+"' name='list"+length+"'>"
                +   "<form action='page.php'>"
                +       "<input type='text' placeholder='Ny produkt' id='prod"+length+"' name='prod"+length+"'>"
                +       "<input type='submit' value='+' class='addp' id='btn"+length+"'" //med en sluttagg här så förstörs allt, WTF?!
                +   "</form><br>"
                +"<input type='submit' value='sparalista' class='save' id='save"+length+"' name='save"+length+"'>"
                +"</div>";    
    }
});

//okej, alla kommer ha ett id. När du trycker på en knapp, retrieva id: et från knappen. Kolla vad idt är. Hämta samma inputid. Ta texten därifrån och för in det i den diven som har samma id.

//dataaabaasen. Efter att man skrivit upp allt man vill ha köpt så finns det en knapp som heter spara. Vad den gör är att den då tar alla innehållet i alla paragrafer, skickar den till servern som där packar ihop den till en query och sen skickas till dbn. Alla produkter "ägg", "korv", "kaffe" å skit kommer inte ha en egen plats i dbn, utan alla kommer va en del av samma sträng, "ägg, korv, kaffe". När man hämtar det så får php processa det och skriva ut det fint i html, när det uppdateras så uppdateras HELA listan, inte ett litet objektet. Den gamla listan raderas alltså och den nya förs in.

//listid    lista       användare