/* 
 * transporte javascript functions
 */

function reloj()
{
  var strcount
  var refresh=1000;
  var x = new Date()
  var y = x.getHours() + ":" + x.getMinutes() + ":" + x.getSeconds();
  document.getElementById('hora').innerHTML = y;
  mytime=setTimeout('reloj()',refresh);
}
function filtro(url, campo, obj, origen, id)
{
  $(origen).change(function () {
    $(campo).load(url, {'objeto':obj,'inicio_id':this.value,'id':id} );
  });
}
function clickIngreso()
{
  $("tr").click(function () {
      //$(this).slideUp();
      alert('loxo');
    });
}