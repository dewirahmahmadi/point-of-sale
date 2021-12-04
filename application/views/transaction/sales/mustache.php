<script id="table-item" type="x-tmpl-mustache">
	<tr id="{{id}}">
		<td>{{barcode}}</td>
		<td>{{productName}}</td>
		<td>{{stock}}</td>
		<td>{{price}}</td>
		<td class="js-cart-qty">1</td>
		<td align="center">
			<button class="btn btn-xs btn-danger js-delete-cart" data-item="{{id}}">
				Delete
			</button>
		</td>
		<td class="js-total-cart" width="15%">{{total}}</td>
	</tr>
</script>