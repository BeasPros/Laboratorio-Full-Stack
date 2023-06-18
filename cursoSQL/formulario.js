window.onload = function() {
  console.log('hola')
  var form = document.querySelector("form");
  form.addEventListener("submit", function(event) {
      var nombre = document.querySelector("input[name='nombre']");
      var primerapellido = document.querySelector("input[name='primerapellido']");
      var segundoapellido = document.querySelector("input[name='segundoapellido']");
      var email = document.querySelector("input[name='email']");
      var password = document.querySelector("input[name='password']");
      var nombreApellidoRegex = /^[a-zA-Z0-9]+$/;
      var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

      if (!nombreApellidoRegex.test(nombre.value)) {
        event.preventDefault();
        alert("El nombre solo puede contener letras y números.");
        return;
      }

      if (!nombreApellidoRegex.test(primerapellido.value)) {
        event.preventDefault();
        alert("El primer apellido solo puede contener letras y números.");
        return;
      }

      if (!nombreApellidoRegex.test(segundoapellido.value)) {
        event.preventDefault();
        alert("El segundo apellido solo puede contener letras y números.");
        return;
      }

      if (!emailRegex.test(email.value)) {
          event.preventDefault();
          alert("Por favor, introduce un correo electrónico válido.");
          return;
      }

      if (password.value.length < 4 || password.value.length > 8) {
        event.preventDefault();
        alert("La contraseña debe tener entre 4 y 8 carácteres.");
        return;
      }

  });
}
