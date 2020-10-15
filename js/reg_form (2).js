var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/571e4cf765c4b2085de05435/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();

 function address() {
        if ($('#chkadd').prop('checked')) {
          
            $('#comAdr').val($('#permAdr').val());
              $('#comadrline2').val($('#adrline2').val());
                $('#comadrline3').val($('#adrline3').val());
                
            $('#pincode').val($('#permpincode').val());
 $('#state').val($('#permstate').val());
if($('#permstate').val()==2){
$('.otherPermdist').show();
                 $('.keralaPermdist').hide();
$('#districtname').val($('#permdistrictname').val());
}
            $('#district').val($('#permdistrict').val());
            //alert($('#district').val())
            // $("#permdistrict option[value='" + $('#district').val() + "']").attr("selected", "true");
           
        }
    }