# **TIENDA ECUESTRE**
“Un comercio electrónico dedicado a productos ecuestres con una imagen profesional”

## Color y estilos visual 

Nuestro color principal será el blanco ya que transmite limpieza, elegancia, pureza, perfección y confianza. Este color es ideal para una tienda hípica que quiera transmitir profesionalismo, tradición y calidad.

Nuestra empresa se caracterizará por tener un estilo visual con:

- Una interfaz minimalista, fondo blanco con detalles en gris perla y dorado (como acento).
- Fotografías de alta calidad de productos.
- Una tipografía *serif* para títulos (clásica y elegante), *sans-serif* para textos.

## Arquitectura de la base de datos basada en modelo UML 

Nuestras entidades principales serán el usuario (cliente o administrador), el producto, la categoría, el pedido, el detalle del pedido, el carrito, la dirección, el método de pago y la imagen del producto.  
Como relaciones claves tendremos:

- Un usuario podrá tener muchos pedidos, direcciones, métodos de pago y un carrito.
- Un pedido tiene muchos detalles de pedidos.
- Un producto pertenece a una categoría.
- Un producto puede tener varias imágenes.

Aquí podremos ver su UML:

<img width="761" alt="UML" src="https://github.com/user-attachments/assets/03065d65-bc0f-4b0f-9443-6ca5f09823ca" />

## Objetivo Principal y requisitos del proyecto

El objetivo principal es desarrollar una tienda online especializada en artículos ecuestres que permita a los usuarios navegar, agregar productos al carrito y realizar pedidos de forma sencilla y elegante.

Los requisitos funcionales serán: 

- Registro y login de usuarios.
- Listado de productos por categorías.
- Vista de detalle de producto.
- Carrito de compra persistente.
- Gestión de pedidos y pagos (simulado).
- Área de administración para CRUD de productos y gestión de pedidos.
- Responsive design con **Bootstrap 5**.

Los requisitos funcionales no funcionales serán: 

- Interfaz limpia y elegante (inspirada en el color blanco).
- Seguridad de contraseñas mediante *hashing*.
- Uso de control de versiones con **Git** y **GitHub**.
- Código documentado.
- Base de datos relacional bien estructurada.

  ## Casos de uso

El actor será el usuario registrado o el administrador.

El flujo básico sería (para el usuario registrado):

1. El usuario navega por los productos.
2. Selecciona un producto y lo añade al carrito.
3. Accede al carrito y modifica los productos si lo desea.
4. Procede al pago (dirección + método de pago).
5. Se genera el pedido.
6. El sistema envía una confirmación.

Otros casos podrían ser:

- Registrarse / Iniciar sesión.
- Editar perfil / direcciones.
- CRUD de productos *(Administrador)*.
- Gestión de stock *(Administrador)*.
- Ver historial de pedidos.

  ## Mockups
  
Aquí tendremos las páginas claves:

- Home (slider con productos destacados)
- Catálogo de productos (cards por categoría)
- Detalle de producto (con fotos, stock y descripción)
- Carrito
- Checkout
- Dashboard Admin (gestión de productos y pedidos)
