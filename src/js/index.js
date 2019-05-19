import swal from 'sweetalert';
function add_remove(el) {
  console.log('hello');
  let ajaxurl = el.getAttribute('data-url');
  let spec_action = el.getAttribute('data-action');
  let theid = el.getAttribute('data-item');
  let restUrl =
    'action=add_remove&spec_action=' + spec_action + '&theid=' + theid;
  fetch(ajaxurl, {
    method: 'POST', // *GET, POST, PUT, DELETE, etc.
    mode: 'cors', // no-cors, cors, *same-origin
    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
    credentials: 'same-origin', // include, *same-origin, omit
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    redirect: 'follow', // manual, *follow, error
    referrer: 'no-referrer', // no-referrer, *client
    body: restUrl,
  })
    .catch(err => {
      console.log(err);
    });
}

document.addEventListener('DOMContentLoaded', function() {
  //this is for the swal
  let cartBtn_r = document.getElementsByClassName('cartBtn');
  let cartBtn = Array.from(cartBtn_r);
  cartBtn.map(btn => {
    btn.addEventListener('click', function() {
      let el = btn.getElementsByTagName('a')[0];
      let title_c = el.getAttribute('data-title');
      let panier_c = el.getAttribute('data-cart');
      swal({
        title: 'Nice ! ',
        text:
          title_c +
          ' a été ajouté au panier.\n Allez au panier ou rester sur cette page ?',
        buttons: ['Rester', 'Au panier'],
      })
        .then(add_remove(el))
        .then(willGo => {
          if (willGo) {
            window.location.href = panier_c;
          } else {
            setTimeout(function() {
              location.reload();
            }.bind(this), 100);
          }
        });
    });
  });
});
