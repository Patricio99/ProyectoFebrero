<?php
include './masterpage.php';

function render() {
  ?>

  <script>

    getCategoryList().then((category) => {
      var dropDownCat = document.getElementById("dropDownCat");

      for (let i = 0; i < category.length; i++) {

        var anchor = document.createElement("a");
        var t = document.createTextNode(category[i].Nombre);
        anchor.classList.add('dropdown-item');
        anchor.onclick = () => {
          loadData(category[i].id);
        };
        anchor.appendChild(t);
        dropDownCat.appendChild(anchor);
      }
    });
  </script>
<div class="p-3">
  <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Categorias
  </a>
  <div class="dropdown-menu" id="dropDownCat">
    <a class="dropdown-item" href="javascript:loadData(0)">ALL</a>
  </div>
</div>
</div>


  <div id="cardDeck" class="card-deck">
  </div>
  <div class="card-generic" id="genericItemCardDeck">
    <div class="product-image">
      <img class="card-img-top" src="" alt="Card image cap">
    </div>
    <div class="card-block">
      <h4 class="card-title"></h4>
      <p class="card-text"></p>
    </div>
    <div class="card-footer">
      <small class="text-muted precio"></small>
      <a class="view-detail">Ver</a>
    </div>
  </div>
  <script>

    function loadData(category) {

      getProductList(category).then((products) => {

        let container = $('#cardDeck');
        let genericItem = $('#genericItemCardDeck');

        container[0].innerHTML = '';
        for (var i = 0; i < products.length; i++) {

          let newContainer = genericItem.clone();
          newContainer.find('.card-title').text(products[i].Nombre);
          newContainer.find('.card-text').text(products[i].Descripcion);
          newContainer.find('.text-muted.precio').text('$' + products[i].Precio);

          newContainer.find('.card-img-top')[0].setAttribute('src', 'images/' + products[i].Imagen);

          newContainer.find('.view-detail')[0].setAttribute('href', '/productos-detalle.php?idproducto=' + products[i].id);

          newContainer.appendTo(container);
        }
      });
    }
    loadData(0);
  </script>

  <?php

}

?>
