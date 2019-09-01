{include file="header.tpl" title=Header}

{include file="nav.tpl" title=Nav}
      
    <div class="container">
        <div class="row">
             
            {foreach $products as $product}
                
                <form method="post" name="add_cart" action="">
                    <input type="hidden" name="product_sku" value="{$product.sku}">
                    <div class="col-sm-5 col-md-3">
                      <div class="thumbnail">
                        <img src="https://placeimg.com/242/200/tech?&time={$product.sku}" alt="{$product.sku}">
                        <div class="caption">
                          <h3>{$product.name}</h3>
                          <h4>US$ {number_format($product.price, 2, '.', '')}</h4>
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Quantity</span>
                            <select name="quantity" class="form-control">
                                {foreach $quantity_list as $quantity}
                                    <option {if isset($cart_list[$product.sku]) && $cart_list[$product.sku] == $quantity} selected {/if} value="{$quantity}">{$quantity}</option>
                                {/foreach}
                            </select>
                          </div>
                          <br>
                          <p><button type="submit" class="btn btn-primary" role="button">Add to cart</button></p>

                        </div>
                      </div>
                    </div>
                </form>
                
            {/foreach}
          
        </div>
        <div class="row">
            {if $cart_quantity}
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Cart</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            {foreach $cart as $sku => $product}    
                                <tr>
                                    <td>
                                        {$product['name']}
                                        {if $sku == 'mbp'}
                                            <br>
                                            <i> &raquo + {$product['quantity']} free {$products['vga']['name']} US$ 0.00</i>
                                        {/if}
                                    </td>
                                    <td>{$product['quantity']}</td>
                                    <td>{number_format($product['price'], 2, '.', '')}</td>
                                    <td>{number_format($product['price_total'], 2, '.', '')}</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                </div>
            {/if}
                        
            <h3><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Total cart: <span class="badge">US$ {number_format($total, 2, '.', '')}</span></h3>
            
            <h3><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Total cart with discount: <span class="badge">US$ {number_format($total_discount, 2, '.', '')}</span></h3>
            
        </div>
            
    </div>
    
{include file="footer.tpl" title=Footer}