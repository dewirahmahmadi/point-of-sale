<script id="table-item" type="x-tmpl-mustache">
	<tr id="{{id}}" data-id={{id}}>
		<td>
		{{#image}}
			<img src="<?=base_url()."uploads/products/"?>{{image}}" style="width: 100px;"/>
		{{/image}}
		</td>
		<td>{{productName}}</td>
		<td>{{stock}}</td>
		<td class="js-cart-price">{{price}}</td>
		<td><input type="number" id="qty" min="1" value="1" class="form-control js-input-qty" data-item={{id}}></td>
		<td align="center">
			<button class="btn btn-xs btn-danger js-delete-cart" data-item="{{id}}">
				Delete
			</button>
		</td>
		<td class="js-total-cart" width="15%">{{total}}</td>
	</tr>
</script>
