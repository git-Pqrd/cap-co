import swal from 'sweetalert';

function add_remove(el) {
  let ajaxurl = el.getAttribute('data-url');
  let spec_action = el.getAttribute('data-action');
  let theid = el.getAttribute('data-id');
  if (window.localStorage.getItem('var_chosen_' + theid) != undefined ) {
    theid = window.localStorage.getItem('var_chosen_' + theid);
  }
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
  }).catch(err => {
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
      let id_c = el.getAttribute('data-id');
      let panier_c = el.getAttribute('data-cart');

      let variant = "" ;
      if (window.localStorage.getItem('var_chosen_txt_' + id_c) != undefined ) {
        variant = " " + window.localStorage.getItem('var_chosen_txt_' + id_c) ;
        id_c = window.localStorage.getItem('var_chosen_' + id_c);
      }

      swal({
        title: 'Nice ! ',
        text:
          title_c +  variant +
          ' has been added to the cart.\n When to go there?',
        buttons: ['Stay', 'To the cart!'],
      })
        .then(add_remove(el))
        .then(willGo => {
          if (willGo) {
            window.location.href = panier_c;
          } else {
            setTimeout(
              function() {
                location.reload();
              }.bind(this),
              300,
            );
          }
        });
    });
  });
  //
  //this is for the active variant
  let all_var_r = document.getElementsByClassName('variants-btn');
  let all_var = Array.from(all_var_r);
  if (all_var.length > 0) {
    let id_pdt = all_var[0].getAttribute('data-pdt');
    let first_id_var = all_var[0].getAttribute('data-id');
    let first_txt_var = all_var[0].textContent.trim()

    if (window.localStorage.getItem('var_chosen_' + id_pdt) == undefined ) {
      window.localStorage.setItem('var_chosen_' + id_pdt, first_id_var);
      window.localStorage.setItem('var_chosen_txt_' + id_pdt, first_txt_var);
    }

    //initial style 
    all_var
      .filter(t_var => t_var.getAttribute('data-id') == window.localStorage.getItem('var_chosen_' + id_pdt))
      .map(a_var => a_var.classList.add('active'))


    //changing style and local when clicked
    all_var.map(a_var =>
      a_var.addEventListener('click', function() {
        all_var.map(t_var => t_var.classList.remove('active'));
        //getting the text 
        localStorage.setItem(
          'var_chosen_txt_' + id_pdt,
          a_var.textContent.trim());

        //getting the id 
        localStorage.setItem(
          'var_chosen_' + id_pdt,
          a_var.getAttribute('data-id'),
        );
        a_var.classList.add('active');
      }),
    );
  }
});
