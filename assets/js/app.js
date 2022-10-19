const productType = $('#productType');
const attributes = $('#attributes');
const save = $('#save-btn');
//Check url for errors to trigger notifications
$(window).on('load', function() {
    const params = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop),
    });
    let value = params.error;
    if (value == 'emptyinput') {
        alert('Please, submit required data');
        var url = (window.location.href);
        url = url.split('?')[0];
    }else if (value == 'emptyType') {
        alert('Please, provide the data of indicated type');
    }else if (value == 'skuExists') {
        alert('Not possible to save product, SKU already exist');
    }
    if (productType.val() !== "") {
        myFunction();
    }
});
// Change attributes form on type switch
function myFunction() {
    attributes.empty();
    switch (productType.val()){
        case'dvd':
            attributes.append('<div class="pb-4">'+
                '<label class="col-4" for="size">Size (MB)</label>'+
                '<input class="col-4" type="number" step="0.01" name="size" id="size" >'+
                '<p class="fw-semibold pt-4">"Please provide size in MB"</p>'+
                '</div>');
            break
        case'book':
            attributes.append('<div class="pb-4">'+
              '<label class="col-4" for="weight">Weight (KG)</label>'+
              '<input class="col-4" type="number" step="0.01" name="weight" id="weight" >'+
              '<p class="fw-semibold pt-4">"Please provide weight in KG"</p>'+
              '</div>');
            break
        case'furniture':
            attributes.append('<div class=" mb-4">'+
              '<label class="col-4" for="height">Height (CM)</label>'+
              '<input class="col-4" type="number" step="0.01" name="height" id="height" >'+
              '</div>'+
              '<div class="mb-4">'+
              '<label class="col-4" for="width">Width (CM)</label>'+
              '<input class="col-4" type="number" step="0.01" name="width" id="width" >'+
              '</div>'+
              '<div class="mb-4">'+
              '<label class="col-4" for="length">Length (CM)</label>'+
              '<input class="col-4" type="number" step="0.01" name="length" id="length">'+
              '<p class="fw-semibold pt-4">"Please provide dimensions in HxWxL format"</p>'+
              '</div>');
            break
    }
}
