<div id="cardDeck" class="card-deck">
  
</div>
<div class="card-generic" id="genericItemCardDeck">
  <img class="card-img-top" src="pages/mayonesa.jpg" alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title">Card title</h4>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
  </div>
  <div class="card-footer">
    <small class="text-muted">Last updated 3 mins ago</small>
  </div>
</div>
<script>

  getProductList().then((products) => {
    let container = $('#cardDeck');
    let genericItem = $('#genericItemCardDeck');
    for (var i = 0; i < products.length; i++) {
//      products[i]
  console.log('cloning...');
      genericItem.clone().appendTo(container);
    }
  });
</script>
