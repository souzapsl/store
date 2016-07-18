<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">Computer Store</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li role="presentation"><a href="#">Cart <span class="badge">{$cart_quantity}</span></a></li>
            {if $cart_quantity}
                <li>&raquo;</li>
                <li role="presentation"><a href="?clear_cart=yes">Clear cart</a></li>
            {/if}
        </ul>
      </div>
    </div>
</nav>
<p>&nbsp;</p><p>&nbsp;</p>