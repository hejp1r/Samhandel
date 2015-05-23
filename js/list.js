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
    
    function getLength(){
        return $('.list').length+1;
    }
    function createList(length){
        return  "<div class='list' id='list"+length+"' name='list"+length+"'>"
                +   "<form action='page.php'>"
                +       "<input type='text' placeholder='Ny produkt' id='prod"+length+"' name='prod"+length+"'>"
                +       "<input type='submit' value='+' class='addp' id='btn"+length+"'"
                +   "</form>"
                +"</div>";    
    }
});

//okej, alla kommer ha ett id. När du trycker på en knapp, retrieva id: et från knappen. Kolla vad idt är. Hämta samma inputid. Ta texten därifrån och för in det i den diven som har samma id.