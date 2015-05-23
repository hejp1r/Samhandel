$(document).ready(function(){
alert("joo");
console.log("whyy");
$('.addprodukt').click(function(){
            alert("ja");
            var produkt = $('input[name=produkt]').val();
            console.log(produkt);
            $('.list').append("<p>" + produkt + "</p>");
            
        })
});