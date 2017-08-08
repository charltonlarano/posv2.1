$(".input").keyup(function() {
            var inputs = $(this).parents('tr').find(".input",".td");
              inputs[2].value=(parseFloat(inputs[0].value).toFixed(2)*parseFloat(inputs[1].value)).toFixed(2);
               var sum='';
        $('.input2').each(function () {
            debugger;
               if ($(this).val().trim()!= '') {
                  sum+=parseInt($(this).val().trim()).toFixed(2);
                    }
                });  
                $('#sum').html(sum);
                
            });