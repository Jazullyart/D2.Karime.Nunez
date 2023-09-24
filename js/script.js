var regex1 = /^[a-zA-Z]*$/;
var regex2 = /<[^>]*>|javascript:/gi;

// Habilitar botón de inicio / Registrarse
const uscamp = document.getElementById("usuario");
const contracamp = document.getElementById("contra");
const btncamp = document.getElementById("btnIniciar");

uscamp.addEventListener("input", habilitarBotonI);
contracamp.addEventListener("input", habilitarBotonI);

function habilitarBotonI() {
  if (uscamp.value.trim() !== "" && contracamp.value.trim() !== "") {
    btncamp.removeAttribute("disabled");
  } else {
    btncamp.setAttribute("disabled", "disabled");
  }
}

const usrcamp = document.getElementById("usuarior");
const correocamp = document.getElementById("correo");
const contrarcamp = document.getElementById("contrar");
const btnrcamp = document.getElementById("btnRegistrar");

usrcamp.addEventListener("input", habilitarBotonR);
correocamp.addEventListener("input", habilitarBotonR);
contrarcamp.addEventListener("input", habilitarBotonR);

function habilitarBotonR() {
  if (usrcamp.value.trim() !== "" && correocamp.value.trim() !== "" && contrarcamp.value.trim() !== "") {
    btnrcamp.removeAttribute("disabled");
  } else {
    btnrcamp.setAttribute("disabled", "disabled");
  }
}

// Limpieza de código

function sanitizarCodigo(input) {
  return input.replace(/</g, "&lt;").replace(/>/g, "&gt;");
}

function soloLetras(e) {
  e.preventDefault();
  var input = e.target;

  if (!regex1.test(input.value)) {
      input.value = input.value.replace(/[^a-zA-Z]/g, '');
  }
}

// //Iniciar sesión

// function IniciarSesion(event) {
//   event.preventDefault();

//   var usuario = sanitizarCodigo(uscamp.value);
//   var contraseña = sanitizarCodigo(contracamp.value);

//   if (regex2.test(usuario) || regex2.test(contraseña)) {
//       window.location.href = "error.html";
//       return;
//   }

//   if (usuario === usuarioC && contraseña === contraseñaC) {
//       window.location.href = "exito.html";
//   } else {
//       intentosFallidos++;
//       document.getElementById("msgerror").innerHTML = "Nombre de usuario o contraseña incorrectos.";

//       if (intentosFallidos >= 5) {
//         window.location.href = "error.html";
//       }
//   }

//   console.log("Iniciar sesión!");
// }


// btncamp.addEventListener("click", IniciarSesion);

// //Registro

// function Registrarse(event) {
//   var usuarior = sanitizarCodigo(usrcamp.value); // Cambio de uscamp a usrcamp
//   var correo = sanitizarCodigo(correocamp.value); // Cambio de contracamp a correocamp
//   var contraseñar = sanitizarCodigo(contrarcamp.value); // Cambio de contracamp a contrarcamp

//   if (regex2.test(usuarior) || regex2.test(correo) || regex2.test(contraseñar)) {
//     window.location.href = "error.html";
//     return;
//   } else {
//     if (usuarior === "" || correo === "" || contraseñar === "") {
//       document.getElementById("msgerrorR").innerHTML = "Campos no válidos o vacíos.";
//     } else {
//       var correoValido = validarCorreo(correo);
//       if (correoValido) {
//         window.location.href = "exito.html";
//       } else {
//         document.getElementById("msgerrorR").innerHTML = "El formato del correo electrónico no es válido.";
//       }
//       event.preventDefault();
//     }
//   }
// }

// function validarCorreo(correo) {
//   var regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
//   return regexCorreo.test(correo);
// }
