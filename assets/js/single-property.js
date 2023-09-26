const templateUrl = object_name.templateUrl;
$(document).ready(function() {
    $("select[name='currency']").niceSelect();
    $("div.currency-select").append('<img src ="' + templateUrl + '/assets/svg/eg.svg" alt="eg" class = "active-flag">');
    $("div.currency-select li[data-value='EGP']").append('<img src ="' + templateUrl + '/assets/svg/eg.svg" alt="eg" class = "eg-flag">');
    $("div.currency-select li[data-value='USD']").append('<img src ="' + templateUrl + '/assets/svg/us.svg" alt="us" class = "us-flag">');
    // $("div.currency-select").attr('style', 'width:49%;');
    $("div.currency-select img").attr('style', 'max-height:25px;margin-left: 5px;');
    $("div.currency-select ul.list").attr('style', 'width:100%;');
    $("div.currency-select ul.list li").attr('style', 'display:block;');
    // if ($("div.currency-select span.current").html() === 'EGP') {

    // }

});
const EGPprice = $("h2.price").html();
const EGPdownpayment = $("h2.price.mt-2").html();

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
const a2e = s => s.replace(/[٠-٩]/g, d => '٠١٢٣٤٥٦٧٨٩'.indexOf(d));
$(function() {
    var dollarToLE = $("input[name='currency']").val();
    $("div.currency-select ul.list li").on(
        "click",
        function() {
            // var prev = $("div.currency-select span.current").html();
            // prev = prev.slice(0, -1);
            // prev = prev.slice(1);
            var prev;
            $("div.currency-select ul.list li").each(function(i) {
                if ($(this).hasClass('selected'))
                    prev = $(this).attr('data-value');
            });
            // console.log('prev : ' +
            // prev);
            var current = $(this).attr('data-value');
            // console.log('current : ' + current);
            if ($("h2.price").length) {
                var price = $("h2.price").html();
                price = price.replaceAll(',', '');

                let regExp = /^[a-z]+$/i;
                let isMatch = regExp.test(price)
                if (!isMatch)
                    price = a2e(price);

                // console.log('price : ' + price);
            }
            if ($("h2.price.mt-2").length) {
                var downpayment = $("h2.price.mt-2").html();
                downpayment = downpayment.replaceAll(',', '');
                let regExp = /^[a-z]+$/i;
                let isMatch = regExp.test(downpayment)
                if (!isMatch)
                    downpayment = a2e(downpayment);
            }
            // console.log('downpaymen : ' + downpayment);
            if (prev === "EGP" && current === "USD") {
                if ($("h2.price").length) {
                    var amt = price / dollarToLE;
                    // console.log('dollartoLE' + dollarToLE);
                    // console.log('amount : ' + amt);
                    amt = parseFloat(amt);
                    // amt = amt.toFixed(2);
                    amt = amt.toFixed(0);
                    amt = numberWithCommas(amt);
                    $("h2.price").html(amt);
                }
                if ($("h2.price.mt-2").length) {
                    amt = downpayment / dollarToLE;
                    amt = parseFloat(amt);
                    // amt = amt.toFixed(2);
                    amt = amt.toFixed(0);
                    amt = numberWithCommas(amt);
                    $("h2.price.mt-2").html(amt);
                }

                var currency_tag = $("div.price-container span.current_currency").html();
                if (currency_tag === 'جنيه مصري') {
                    $("div.price-container span.current_currency").html("دولار")
                } else { $("div.price-container span.current_currency").html("USD") }
                $("div.currency-select").find('img.active-flag').replaceWith('<img src ="' + templateUrl + '/assets/svg/us.svg" alt="eg" class = "active-flag">');
                $("div.currency-select img.active-flag").attr('style', 'max-height:25px;margin-left: 5px;');

            }
            if (prev === "USD" && current === "EGP") {
                // var amt = price * dollarToLE;
                // amt = parseFloat(amt);
                // amt = amt.toFixed(2);
                // $("h2.price").html(amt);
                // amt = downpayment * dollarToLE;
                // amt = parseFloat(amt);
                // amt = amt.toFixed(2);
                // $("h2.price.mt-2").html(amt);

                $("h2.price").html(EGPprice);
                $("h2.price.mt-2").html(EGPdownpayment);
                var currency_tag = $("div.price-container span.current_currency").html();
                if (currency_tag === 'دولار') {
                    $("div.price-container span.current_currency").html("جنيه مصري")
                } else { $("div.price-container span.current_currency").html("EGP") }
                $("div.currency-select ").find('img.active-flag').replaceWith('<img src ="' + templateUrl + '/assets/svg/eg.svg" alt="eg" class = "active-flag">');
                $("div.currency-select img.active-flag").attr('style', 'max-height:25px;margin-left: 5px;');
            }
        }
    );

    // $('select[name="currency"]').on('click', function() {
    //     $(this).data('val', $(this).val());
    // });
    // $('select[name="currency"]').on('change', function() {
    //     var prev = $(this).data('val');
    //     var current = $(this).val();
    //     var price = $("h2.price").html();
    //     var downpayment = $("h2.price.mt-2").html();
    //     if (prev === "LE" && current === "USD") {
    //         var amt = price / dollarToLE;
    //         amt = parseFloat(amt);
    //         amt = amt.toFixed(2);
    //         $("h2.price").html(amt);
    //         amt = downpayment / dollarToLE;
    //         amt = parseFloat(amt);
    //         amt = amt.toFixed(2);
    //         $("h2.price.mt-2").html(amt);

    //         var currency_tag = $("div.price-container span.current_currency").html();
    //         if (currency_tag === 'جنيه مصري') {
    //             $("div.price-container span.current_currency").html("دولار")
    //         } else { $("div.price-container span.current_currency").html("USD") }
    //     }
    //     if (prev === "USD" && current === "LE") {
    //         // var amt = price * dollarToLE;
    //         // amt = parseFloat(amt);
    //         // amt = amt.toFixed(2);
    //         // $("h2.price").html(amt);
    //         // amt = downpayment * dollarToLE;
    //         // amt = parseFloat(amt);
    //         // amt = amt.toFixed(2);
    //         // $("h2.price.mt-2").html(amt);

    //         $("h2.price").html(EGPprice);
    //         $("h2.price.mt-2").html(EGPdownpayment);
    //         var currency_tag = $("div.price-container span.current_currency").html();
    //         if (currency_tag === 'دولار') {
    //             $("div.price-container span.current_currency").html("جنيه مصري")
    //         } else { $("div.price-container span.current_currency").html("EGP") }
    //     }
    // });
});