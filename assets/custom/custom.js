$(document).ready(function () {
    $('#js-data-table').DataTable();

    $('.sidebar-menu').tree();

    $(document).on('click', '#select', function() {
            var item_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var name = $(this).data('name');
            var unit_name = $(this).data('unit');
            var stock = $(this).data('stock');
            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#item_name').val(name);
            $('#unit_name').val(unit_name);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');
    });

	var get_number_only = function ($text) {
		if (!$text) return;
		return $text.replace(/[^0-9]+/g, '');

	}

    var calculate = function($discount = null) {
      var grand_total = $('#grand_total');
      var input_sub_total = $('input#sub_total');
      var input_grand_total = $('input#grant_total');
      var listTotal = $('.js-total-cart');
      var total_product_price= 0;

      if (listTotal.length > 0) {
          listTotal.each(function() {
              var product_total = get_number_only($(this).text());
              total_product_price += parseInt(product_total);
          })

          input_sub_total.val(total_product_price);
          if ($discount != null) {
            var final_total = parseInt(total_product_price) - parseInt($discount);
            input_grand_total.val(final_total)
            grand_total.text(final_total);
          } else {
            input_grand_total.val(total_product_price)
            grand_total.text(total_product_price);
          }
      }
    }

    $(document).on('click', '#js-select-cart', function() {
      var _this = $(this);
      var item_template = $("#table-item").html();
      Mustache.parse(item_template);
      var body_table = $('#js-cart-table-body');
      var rowNoItem = $('#js-row-no-item');

      var row = Mustache.render(item_template, {
                  id: _this.data('id'),
                  barcode: _this.data('barcode'),
                  productName: _this.data('name'),
                  stock: _this.data('stock'),
                  price: "Rp " + _this.data('price'),
                  total: "Rp " + _this.data('price')
                });
      
      if (rowNoItem.length > 0) {
         rowNoItem.remove();
      }

      body_table.append(row);
      calculate();
      $('#modal-item').modal('hide');
    });

    var table_sale = $('.js-table-cart');
    table_sale.on('click', '.js-delete-cart', function() {
      var _this = $(this);
      var item_id = _this.data('item');
      if (item_id) {
        _this.closest('#' + item_id).remove();
        calculate();
      }
    });

	$('.js-apply-discount').on('click', function () {
		var discount = $('input#discount');
		calculate(discount.val());
		$(this).attr("disabled", "disabled");
		discount.attr("readonly", true);
	});

    var modal_process_payment = $('#modal-process-payment');
	var modal_success= $('#modal-success-payment');
    modal_process_payment.on('show.bs.modal', function() {
      var modal = $(this);
      var button_payment = modal.find('.js-process-payment');
      button_payment.on('click', function() {
        var customer = $('#customer_id').val();
        var date = $('#date').val();

        var sub_total = modal.find('input#sub_total').val();
        var discount = modal.find('input#discount').val();
        var total = modal.find('input#grant_total').val();
        var cash = modal.find('input#cash').val();
        var note = modal.find('textarea#notes').val();
        var remain = parseInt(cash) - parseInt(total);
		var url = $(this).data('url');

		var products = [];

		var list_product = $('#js-cart-table-body').find('tr');
		if (list_product.length > 0) {
			list_product.each(function () {
				var _this = $(this);
				var product = {
					"item_id": _this.data("id"),
					"qty": _this.find(".js-cart-qty").text(),
					"total": get_number_only(_this.find(".js-total-cart").text())
				}
				products.push(product);
			});
		}

        $.ajax({
          type: "POST",
          url: url,
          data: {
              'process_payment': true,
              'customer_id': customer ? customer : null,
              'sub_total': parseInt(sub_total),
              'discount': discount ? parseInt(discount) : 0,
              'grand_total': parseInt(total),
              'cash': parseInt(cash),
              'change': parseInt(remain),
              'note': note,
              'date': date,
			  'products': products
          },
          dataType: "json",
          success: function(result) {
              if (result.success === true) {
                  modal_process_payment.modal('hide');
				  modal_success.find('.js-success-total').text(result.total);
				  modal_success.find('.js-success-remain').text(result.remain);
				  modal_success.find('.js-success-print').attr("href",result.url);
				  modal_success.modal('show');
              } else {
                  alert('gagal melakukan transaksi');
              }
          }
      });
    });
	});
})