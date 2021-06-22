$( document ).ready(function() {
    const input_search  = $("#inputSearch");
    const results_div   = $("#custom-results");
    let error_set       = false;
    let timeout         = null;

    const inputAdsid    = $('#inputAdsid');
    const inputAdsTitle = $('#inputAdsTitle');
    const inputCity     = $('#inputCity');
    const inputHood     = $('#inputHood');
    const inputStreet   = $('#inputStreet');
    const inputPrice    = $('#inputPrice');
    const inputSquare   = $('#inputSquare');
    const inputType     = $('#inputType');
    const inputEmail    = $('#inputEmail');
    const textComment   = $('#textComment');


    error_set = validation();
    if(error_set != true){
        $(".cl-div-error").css('display', 'none');
        
        // $(".custom-button").css('display', 'none');
    }else{
        // $(".cl-div-error").css('display', 'block');
        // $(".custom-button").css('display', 'block');
    }

    input_search.on('input', function() {
        const value = $(this).val();
        if (timeout) {
            clearTimeout(timeout);
            timeout = null;
        }
        if (value.length < 4) {
            results_div.empty();
            return;
        }
        timeout = setTimeout(() => {
            $.ajax({
                url		: `/search/${value}`,
                type	: 'GET',
                success	: (response) => {
                    {
                        let ads         = JSON.parse(response);
                        console.log(ads[0]);
                        results_div.append(ads.map((ad) => {
                            return `
                                <div class="row results_row" id= ${ad.id_ad}>
                                <div class="col-md-12 text-left">Naslov:        <span id="span_ad_title">${ad.ad_title}</span></div> 
                                <div class="col-md-6 text-left">Grad:           <span id="span_id_city">${ad.ad_city}</span></div> 
                                <div class="col-md-6 text-left">Naselje:        <span id="span_id_hood">${ad.ad_hood}</span></div> 
                                <div class="col-md-12 text-left">Ulica:         <span id="span_street">${ad.street}</span></div> 
                                <div class="col-md-4 text-left">Cena:           <span id="span_price">${ad.price}</span></div> 
                                <div class="col-md-4 text-left">Kvadratura      <span id="span_surface">${ad.surface}</span>m<sup>2</sup></div> 
                                <div class="col-md-4 text-left">Tip nekretnine  <span id="span_id_type">${ad.ad_type}</span></div> 
                                <hr>
                            </div>
                            `;
                        }).join(''));
                    }
                }
            });
        }, 400);
    });

    $('body').on("click", ".results_row", function (event) {

        let ad_id               = $(this).attr("id");
        let span_ad_title       = $(this).find('#span_ad_title').text()
        let span_id_city        = $(this).find('#span_id_city').text()
        let span_id_hood        = $(this).find('#span_id_hood').text()
        let span_street         = $(this).find('#span_street').text()
        let span_price          = $(this).find('#span_price').text()
        let span_surface        = $(this).find('#span_surface').text()
        let span_id_type        = $(this).find('#span_id_type').text()

        inputAdsid.val(ad_id);
        inputAdsTitle.val(span_ad_title);
        inputCity.val(span_id_city);
        inputHood.val(span_id_hood);
        inputStreet.val(span_street);
        inputPrice.val(span_price);
        inputSquare.val(span_surface);
        inputType.val(span_id_type);
    });

    $('.btn-reset').on("click", formReset);
    $('.btn-submit').on("click", function(event){
        let status = validation();
        if(status == false){
            $(".cl-div-error").css('display', 'block');
            event.preventDefault();
        }else{
            $(".cl-div-error").css('display', 'none');
        }
    });

    function formReset(){
        inputAdsid.val('');
        inputAdsTitle.val('');
        inputCity.val('');
        inputHood.val('');
        inputStreet.val('');
        inputPrice.val('');
        inputSquare.val('');
        inputType.val('');
    }

    function validation(){
        let controls = [inputAdsid,inputAdsTitle,inputCity,inputHood,inputStreet,inputPrice,inputSquare,inputType,inputEmail,textComment];
        for(i = 0; i < controls.length; i++){
            if(controls[i].length){
                let rulesArr = controls[i].data('rules').split("|");
                for(j = 0; j < rulesArr.length; j++){
                    switch(rulesArr[j]) {
                        case 'required':
                            if(controls[i].val() == ""){
                                $(".span-error").text("Sva polja moraju biti popunjena!");
                                return false
                            }
                            break;
                        case 'email':
                            if(!(/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(controls[i].val()))){
                                $(".span-error").text("Email mora bit validan!");

                                return false
                            }
                            break;
                        case 'number':
                            if(!(/^[0-9]*$/.test(controls[i].val()))){
                                $(".span-error").text("Cena mora biti validna!");

                                return false
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
        }
        return true;
    }
});

