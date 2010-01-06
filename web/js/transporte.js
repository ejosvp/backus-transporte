/* 
 * transporte javascript functions
 */

function reloj()
{
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

//CRONOMETRO
//Autor: Iván Nieto Pérez
//Este script y otros muchos los puedes
//encontrar en
//MundoJavascript.com
var CronoID = null
var CronoEjecutandose = false
var decimas, segundos, minutos, horas

function DetenerCrono (){
  if(CronoEjecutandose)
  clearTimeout(CronoID)
  CronoEjecutandose = false
}

function InicializarCrono (lugar) {
//inicializa contadores globales
decimas = 0
segundos = 0
minutos = 0
horas = 0

//pone a cero los marcadores
lugar.html('00:00:00:0');
}

function MostrarCrono (lugar) {

  //incrementa el crono
decimas++
  if ( decimas > 9 ){
    decimas = 0
    segundos++
    if ( segundos > 59 ) {
      segundos = 0
      minutos++
      if ( minutos > 59 ) {
        minutos = 0
        horas++
        if ( horas > 4 ) {
          alert('wowwww, este camion esta cargando mas de 5 horas, era un tren!!!!!!!')
          DetenerCrono()
          return true
        }
      }
    }
  }

//configura la salida
var ValorCrono = ""
ValorCrono = (horas < 10) ? "0" + horas : horas
ValorCrono += (minutos < 10) ? ":0" + minutos : ":" + minutos
ValorCrono += (segundos < 10) ? ":0" + segundos : ":" + segundos
ValorCrono += ":" + decimas

  lugar.html(ValorCrono);

  CronoID = setTimeout("MostrarCrono()", 100)
CronoEjecutandose = true
return true
}

function IniciarCrono (lugar) {
  if(!CronoEjecutandose) {
    DetenerCrono()
    InicializarCrono(lugar)
    MostrarCrono(lugar)
  }
}