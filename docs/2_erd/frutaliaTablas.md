
- **`users`**: Representa a los usuarios que va haber en el sistema.
	- id (*llave primaria*)
	- -role_id (*llave foránea*)
	- name
	- surname
	- email (*único*)
	- telefono (*úbnico*)
	- password (*se debe guardar como hash*)
	- created_at 
	- updated_at 


- **`roles`**: Representa los roles que van a tener los usuarios (admin, customer, seller.).
	- id (*llave primaria*)
	- name (*único*)
	- created_at 
	- updated_at 


- **`role_user`**: Tabla pivote entre users y roles por la relación de muchos a muchos.
	- id (*llave primaria*)
	- id_role (*llave foránea*)
	- id_user (*llave foránea*)



- **`categories`**: Representa las categorías a las que pueden pertenecer los productos. 
	- id (*llave primaria*)
	- name (*único*)
	- created_at 
	- updated_at 

- **`products`**: Representa los diferentes productos que puede haber (tomates, manzanas, etc.):
	- id (*llave primaria*)
	- user_id (*llave foránea de vendedor*)
	- category_id (*llave foránea de categorias*)
	- name
	- description
	- price
	- stock (opcional)
	- created_at 
	- updated_at 

- **`category_product`**: Tabla pivote entre prdocutos y categorías roles por la relación de muchos a muchos.
	- id (*llave primaria*)
	- id_category (*llave foránea*)
	- id_product (*llave foránea*)

- **`zones`**: Representa de momento solo las CCAA de España, más adelante se pueden añadir los atributos type, parent_id, o también columnas para usar una API externa. De momento lo dejaré sencillo pero funcional y escalable.
	- id (*llave primaria*)
	- name
	- created_at 
	- updated_at 

- **`locations`**: Representa los puntos de encuentro que va haber.
	- id (*llave primaria*)
	- zona_id (*llave foránea*)
	- name (ej: “Plaza Mayor”, “Mercado local”)
	- address
	- city
	- cp
	- created_at 
	- updated_at 

- **`orders`**: Representa los pedidos, de manera que se puedan comprar varios productos a la vez.
	- id (*llave primaria*)
	- user_id ( (*llave foránea* del comprador)
	- location_id  (*llave foránea*)
	- total_price
	- status (`pendiente`, `confirmado`, `entregado`)
	- created_at 
	- updated_at 


- **`order_product`**: Tabla pivote con atributos para representar los productos metidos en los pedidos.
	- id (*llave primaria*)
	- pedido_id (*llave foránea*)
	- producto_id (*llave foránea*)
	- quantity
	- price

- **`product_ratings`**: Tabla pivote con atributos para representar las valoraciones (del 1 al 5) de usuarios a productos.
	- id (*llave primaria*)
	- user_id  (*llave foránea*)
	- product_id  (*llave foránea*)
	- rating (1–5)
	- comment
	- created_at 
	- updated_at 


- (NOTA: Las tablas "migrations" y "password_reset_tokens" son las propias de Laravel)
