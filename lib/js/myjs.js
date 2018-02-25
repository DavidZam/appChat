// Nada mas cargar el documento solo mostramos la pagina principal y ocultamos las demas secciones del html
  $(document).ready(function() {
      $("#loginform").hide();
      $("#registerform").hide();
      $("#bajaform").hide();
      $("#errorsuccessmsgspage").hide();
      $("#chatpageupsection").hide();
      $("#chatpagecentersection").hide();
      $("#chatpagedownsection").hide();
      $("#errorlogin").hide();
      $("#loguedoutmsg").hide();
      $("#successregister").hide();
      $("#errorregister").hide();
      $("#loguearseButton").hide();
      $("#dropdowndest").hide();
      $("#ifUserDestiny").hide();
      // Creamos una variables mensajes para facilitar la comunicacion entre ficheros .php y nuestros documentos html
      var mensajes = getParameterByName("mensaje");
      if(mensajes != "") {
        if(mensajes == "registererror") {
          // Si el usuario se intenta registrar y ya existe le mostramos otra vez el formulario de registro y un mensaje de error, ademas de un boton para loguearse
          $("#mainpage").hide();
          $("#errorlogin").hide();
          $("#loguedoutmsg").hide();
          $("#successregister").hide();
          $("#registerform").hide();
          $("#dardebajaerror").hide();
          $("#dardebajasuccess").hide();
          $("#errorsuccessmsgspage").show();
          $("#errorregister").show();
          $("#registerform").show();
          $("#loguearseButton").show();
        } else if(mensajes == "registersuccess") {
          // Si el usuario se registra correctamente le informamos con un mensaje success y le mostramos el boton de login.
          $("#mainpage").hide();
          $("#errorlogin").hide();
          $("#loguedoutmsg").hide();
          $("#errorregister").hide();
          $("#registerform").hide();
          $("#dardebajaerror").hide();
          $("#dardebajasuccess").hide();
          $("#errorsuccessmsgspage").show();
          $("#successregister").show();
          $("#registerform").show();
          $("#loguearseButton").show();
        } else if(mensajes == "dardebajasuccess") {
          $("#mainpage").hide();
          $("#errorlogin").hide();
          $("#loguedoutmsg").hide();
          $("#errorregister").hide();
          $("#dardebajaerror").hide();
          $("#errorsuccessmsgspage").show();
          $("#dardebajasuccess").show();
          $("#bajaform").show();
        } else if (mensajes == "dardebajaerror") {
          $("#mainpage").hide();
          $("#errorlogin").hide();
          $("#loguedoutmsg").hide();
          $("#errorregister").hide();
          $("#dardebajasuccess").hide();
          $("#errorsuccessmsgspage").show();
          $("#dardebajaerror").show();
          $("#bajaform").show();
        } else if(mensajes == "loginerror") {
          // Si el usuario se intenta loguear y no existe se le muestra un mensaje de error y se le recomienda registrarse
          $("#mainpage").hide();
          $("#loguedoutmsg").hide();
          $("#errorregister").hide();
          $("#successregister").hide();
          $("#dardebajasuccess").hide();
          $("#dardebajaerror").hide();
          $("#errorsuccessmsgspage").show();
          $("#errorlogin").show();
          $("#loginform").show();
        } else if(mensajes == "loginsuccess") {
          // Si el usuario se loguea correctamente accede a la seccion del chat
          $("#mainpage").hide();
          $("#loginform").hide();
          $("#registerform").hide();
          $("#errorsuccessmsgspage").hide();
          $("#dardebajaerror").hide();
          $("#dardebajasuccess").hide();
          $("#chatpageupsection").show();
          $("#chatpagecentersection").show();
          $("#msgs").show();
          $("#chatpagedownsection").show();
          $("#dropdowndest").show();
        } else if(mensajes == "loguedout") {
          // Si el usuario cierra sesion le mostramos el formulario de login y un mensaje de despedida
          $("#mainpage").hide();
          $("#registerform").hide();
          $("#chatpagedownsection").hide();
          $("#chatpagecentersection").hide();
          $("#errorregister").hide();
          $("#errorlogin").hide();
          $("#successregister").hide();
          $("#dardebajasuccess").hide();
          $("#dardebajaerror").hide();
          $("#dropdowndest").hide();
          $("#loginform").show();
          $("#errorsuccessmsgspage").show();
          $("#loguedoutmsg").show();
        }
      }
  });
  // Con esta funcion conseguimos obtener parametros (mensajes) segun su nombre y ocultamos o mostramos las secciones pertinentes
  function getParameterByName(name) {
      name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
      var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
      results = regex.exec(location.search);
      return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }
  // Mostramos el formulario de login y ocultamos lo demás
  function loginButton() {
    $("#mainpage").hide();
    $("#errorsuccessmsgspage").hide();
    $("#registerform").hide();
    $("#errorregister").hide();
    $("#loguearseButton").hide();
    $("#successregister").hide();
    $("#loginform").show();
  }
  // Mostramos el formulario de registro y ocultamos lo demás
  function cuentaButton() {
    $("#mainpage").hide();
    $("#loginform").hide();
    $("#errorsuccessmsgspage").hide();
    $("#registerform").show();
  }
  // Mostramos el formulario de baja y ocultamos lo demás
  function bajaButton() {
    $("#mainpage").hide();
    $("#errorsuccessmsgspage").hide();
    $("#bajaform").show();
  }
  // Mostramos la pagina principal y ocultamos lo demás
  function indexButton() {
    $("#loginform").hide();
    $("#registerform").hide();
    $("#errorsuccessmsgspage").hide();
    $("#bajaform").hide();
    $("#mainpage").show();
  }
  // Si el usuario desea enviar un mensaje personal le mostramos la lista de selección
  function showUsersDestination(that) {
    if(that.value == "user") {
      $("#ifUserDestiny").show();
    } else {
      $("#ifUserDestiny").hide();
    }
  }
  // Usamos esta funcion para guardar con ayuda de un input oculto, el usuario al que se elija mandar el mensaje personal
  function saveSelectedListValue(that) {
    $("#usuariodestino").val(that.value);
  }

