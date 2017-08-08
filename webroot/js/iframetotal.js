var total_listed = 0;
var listed_mult = 1;
var total_sold = 0;
var sold_mult = 1;

$(document).ready(function () {
    
    $("#btnTotal").click(function(){

    var $dataRows = $("#fees tr:not('.totalColumn, .titlerow')");
        
        $val1=$('#val1').val();
         $('#kgs1').html($val1);
         $val2=$('#val2').val();
         $('#kgs2').html($val2);
         $val3=$('#val3').val();
         $('#kgs3').html($val3);
         $val4=$('#val4').val();
         $('#kgs4').html($val4);
         $val5=$('#val5').val();
         $('#kgs5').html($val5);
         


         $sum1=$('#sum1').val();
         $('#output1').html($sum1);
         $sum2=$('#sum2').val();
         $('#output2').html($sum2);
         $sum3=$('#sum3').val();
         $('#output3').html($sum3);
         $sum4=$('#sum4').val();
         $('#output4').html($sum4);
         $sum5=$('#sum5').val();
         $('#output5').html($sum5);
        

        $("span.zero1").text(function (_, text) {
    if ("0" === text) {
        this.style.display = "none";
        $('#tr1').hide();
          }
        });

        $("span.zero2").text(function (_, text) {
    if ("0" === text) {
        this.style.display = "none";
        $('#tr2').hide();
          }
        });

        $("span.zero3").text(function (_, text) {
    if ("0" === text) {
        this.style.display = "none";
        $('#tr3').hide();
          }
        });

        $("span.zero4").text(function (_, text) {
    if ("0" === text) {
        this.style.display = "none";
        $('#tr4').hide();
          }
        });

        $("span.zero5").text(function (_, text) {
    if ("0" === text) {
        this.style.display = "none";
        $('#tr5').hide();
          }
        });

            
    $dataRows.each(function () {
        $(this).find('span.DataListed').each(function () {
            total_listed += parseFloat($(this).html());
        });
        $(this).find('span.DataSold').each(function () {
            total_sold += parseFloat($(this).html());
        });
    });
    $("#fees span.totalColListed").text(total_listed * listed_mult);
    $("#fees span.totalColSold").text(total_sold * sold_mult);
   
    $('.total').text(total_listed*listed_mult - total_sold*sold_mult);

    });


});
