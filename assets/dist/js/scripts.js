$('a.toggle-modal').bind('click',function(e) {
	e.preventDefault();
	var url = $(this).attr('href');
	if (url.indexOf('#') == 0) {
		$('#modal_content').modal('open');
        $('.editor').wysihtml5();
	} else {
		$.get(url, function(data) {
			$('#modal_content').modal();
			$('#modal_content').html(data);
		}).success(function(data) {
			if(data == 'activate' || data== 'deactivate'){
				$('#modal_content').modal('hide');
				var url      = window.location.href;     // Returns full URL
				window.location.replace(url);
			}
			$('input:text:visible:first').focus();
		});
	}
});



/** 
 * Instantiate select2 dan datatable
 * 
 * --------------------------------------------------------------
 */ 
$(document).ready(function() {
  	$('.uang').mask("#.##0", {reverse: true});
	$('.select2').select2({ width: 'element' });


	$(document).on('click', '#purchaseItems .add', function () {

        var row = $(this).closest('tr');
        var clone = row.clone();

        // clear the values
        var tr = clone.closest('tr');
        tr.find('input[type=text]').val('');
        tr.find('textarea').val('');
        //tr.find('select').val('');

        $(this).closest('tr').after(clone);

    });

    $(document).on('keypress', '#purchaseItems .next', function (e) {
        if (e.which == 13) {
            var v = $(this).index('input:text');
            var v = $(this).index('textarea');
            //var v = $(this).index('select');
            var n = v + 1;
            $('input:text').eq(n).focus();
            $('textarea').eq(n).focus();
            //$('select').eq(n).focus();
            //$(this).next().focus();
        }
    });

    $(document).on('keypress', '#purchaseItems .nextRow', function (e) {
        if (e.which == 13) {
            $(this).closest('tr').find('.add').trigger('click');
            $(this).closest('tr').next().find('input:first').focus();
        }
    });

	$(document).on('click', '#purchaseItems .removeRow', function () {
        if ($('#purchaseItems .add').length > 1) {
            $(this).closest('tr').remove();
        }
    });

});


$('#datepicker').datepicker({
    format: 'dd-mm-yyyy'
});
$('#datepicker1').datepicker({
    format: 'dd-mm-yyyy'
});


/** table **/
/** ----------------------------------------------------------------- **/

            $(document).on('click', ".item-select", function(e) {

                e.preventDefault;

                var product = $(this);
                $('#insert').modal({ backdrop: 'static', keyboard: false }).one('click', '#selected', function(e) {

                    var itemText = $('#insert').find("option:selected").text();
                    var itemValue = $('#insert').find("option:selected").val();

                    $(product).closest('tr').find('.invoice_product').val(itemText);
                    $(product).closest('tr').find('.invoice_product_price').val(itemValue);

                    updateTotals('.calculate');
                    calculateTotal();

                });

                return false;

            });


			$('#invoice_table').on('click', ".delete-row", function(e) {
			    e.preventDefault();
			    $(this).closest('tr').remove();
			    calculateTotal();
			});

			var cloned = $('#invoice_table tr:last').clone();
			$(".add-row").click(function(e) {
			    e.preventDefault();
			    cloned.clone().appendTo('#invoice_table'); 
			});
            
            calculateTotal();
            
            $('#invoice_table').on('input', '.calculate', function () {
                updateTotals(this);
                calculateTotal();
            });

            $('#invoice_totals').on('input', '.calculate', function () {
                calculateTotal();
            });

            $('#invoice_product').on('input', '.calculate', function () {
                calculateTotal();
            });

            $('.remove_vat').on('change', function() {
                calculateTotal();
            });

            //update total
            function updateTotals(elem) {

                var tr = $(elem).closest('tr'),
                    quantity = $('[name="invoice_product_qty[]"]', tr).val(),
                    price = $('[name="invoice_product_price[]"]', tr).val(),
                    isPercent = $('[name="invoice_product_discount[]"]', tr).val().indexOf('%') > -1,
                    percent = $.trim($('[name="invoice_product_discount[]"]', tr).val().replace('%', '')),
                    subtotal = parseInt(quantity) * parseFloat(price);

                if(percent && $.isNumeric(percent) && percent !== 0) {
                    if(isPercent){
                        subtotal = subtotal - ((parseFloat(percent) / 100) * subtotal);
                    } else {
                        subtotal = subtotal - parseFloat(percent);
                    }
                } else {
                    $('[name="invoice_product_discount[]"]', tr).val('');
                }

                $('.calculate-sub', tr).val(subtotal.toFixed(2));
            }

            //kalkulasi total
            function calculateTotal() {
        
                var grandTotal = 0,
                    disc = 0,
                    c_ship = parseInt($('.calculate.shipping').val()) || 0;

                $('#invoice_table tbody tr').each(function() {
                    var c_sbt = $('.calculate-sub', this).val(),
                        quantity = $('[name="invoice_product_qty[]"]', this).val(),
                        price = $('[name="invoice_product_price[]"]', this).val() || 0,
                        subtotal = parseInt(quantity) * parseFloat(price);
                    
                    grandTotal += parseFloat(c_sbt);
                    disc += subtotal - parseFloat(c_sbt);
                });

                // VAT, DISCOUNT, SHIPPING, TOTAL, SUBTOTAL:
                var subT = parseFloat(grandTotal),
                    finalTotal = parseFloat(grandTotal + c_ship),
                    vat = parseInt($('.invoice-vat').attr('data-vat-rate'));

                $('.invoice-sub-total').text(subT.toFixed(2));
                $('#invoice_subtotal').val(subT.toFixed(2));
                $('.invoice-discount').text(disc.toFixed(2));
                $('#invoice_discount').val(disc.toFixed(2));

                if($('.invoice-vat').attr('data-enable-vat') === '1') {

                    if($('.invoice-vat').attr('data-vat-method') === '1') {
                        $('.invoice-vat').text(((vat / 100) * finalTotal).toFixed(2));
                        $('#invoice_vat').val(((vat / 100) * finalTotal).toFixed(2));
                        $('.invoice-total').text((finalTotal).toFixed(2));
                        $('#invoice_total').val((finalTotal).toFixed(2));
                    } else {
                        $('.invoice-vat').text(((vat / 100) * finalTotal).toFixed(2));
                        $('#invoice_vat').val(((vat / 100) * finalTotal).toFixed(2));
                        $('.invoice-total').text((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
                        $('#invoice_total').val((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
                    }
                } else {
                    $('.invoice-total').text((finalTotal).toFixed(2));
                    $('#invoice_total').val((finalTotal).toFixed(2));
                }

                // remove vat
                if($('input.remove_vat').is(':checked')) {
                    $('.invoice-vat').text("0.00");
                    $('#invoice_vat').val("0.00");
                    $('.invoice-total').text((finalTotal).toFixed(2));
                    $('#invoice_total').val((finalTotal).toFixed(2));
                }

            }