


-- =========================
-- ========= NOTAS =========
-- =========================

-- - "UNSIGNED": para evitar números negativos;+
-- - "AUTO_INCREMENT": para que los números se vayan creando automáticamente, y evitar ponerlo manualmente;
-- - "ENGINE=InnoDB": se necesita para claves foráneas e integridad referencial;





-- ==============================
-- ====== CONFIGURACIÓN DB ======
-- ==============================

-- - Creamos base de datos:
CREATE DATABASE IF NOT EXISTS db_frutalia
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- - Seleccionamos base de datos:
USE db_frutalia;

-- - Desactivamos comprobación de FK (para evitar errores de orden):
SET FOREIGN_KEY_CHECKS = 0;




-- ==========================
-- ========= TABLAS =========
-- ==========================

-- - Tabla roles:
CREATE TABLE roles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
) ENGINE=InnoDB;



-- - Tabla usuarios:
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    role_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255),
    email VARCHAR(255) NOT NULL UNIQUE,
    telefono VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,

    CONSTRAINT fk_users_roles
        FOREIGN KEY (role_id) REFERENCES roles(id)
) ENGINE=InnoDB;



-- - Tabla categorías:
CREATE TABLE categories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
) ENGINE=InnoDB;



-- - Tabla zonas:
CREATE TABLE zonas (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
) ENGINE=InnoDB;



-- - Tabla localizaciones:
CREATE TABLE locations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    zona_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255),

    CONSTRAINT fk_locations_zonas
        FOREIGN KEY (zona_id) REFERENCES zonas(id)
) ENGINE=InnoDB;



-- - Tabla productos:
CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    category_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,

    CONSTRAINT fk_products_users
        FOREIGN KEY (user_id) REFERENCES users(id),

    CONSTRAINT fk_products_categories
        FOREIGN KEY (category_id) REFERENCES categories(id)
) ENGINE=InnoDB;



-- - Tabla pedidos
CREATE TABLE pedidos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    location_id BIGINT UNSIGNED NOT NULL,
    total DECIMAL(10,2),
    status ENUM('pendiente', 'confirmado', 'entregado') NOT NULL DEFAULT 'pendiente',
    created_at TIMESTAMP NULL,

    CONSTRAINT fk_pedidos_users
        FOREIGN KEY (user_id) REFERENCES users(id),

    CONSTRAINT fk_pedidos_locations
        FOREIGN KEY (location_id) REFERENCES locations(id)
) ENGINE=InnoDB;


-- - Tabla Items de pedido:
CREATE TABLE pedido_items (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pedido_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,

    CONSTRAINT fk_items_pedido
        FOREIGN KEY (pedido_id) REFERENCES pedidos(id),

    CONSTRAINT fk_items_product
        FOREIGN KEY (product_id) REFERENCES products(id)
) ENGINE=InnoDB;



-- - Tabla Valoraciones de producto:
CREATE TABLE product_ratings (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT UNSIGNED NOT NULL,
    user_id BIGINT UNSIGNED NOT NULL,
    rating INT NOT NULL,
    comment TEXT,

    CONSTRAINT fk_pr_product
        FOREIGN KEY (product_id) REFERENCES products(id),
        
    CONSTRAINT fk_pr_user
        FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE=InnoDB;



-- - Tabla Valoracionesd de usuario (está el que emite y el que recibe...):
CREATE TABLE user_ratings (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    rater_user_id BIGINT UNSIGNED NOT NULL,
    rated_user_id BIGINT UNSIGNED NOT NULL,
    rating INT NOT NULL,
    comment TEXT,

    CONSTRAINT fk_ur_rater
        FOREIGN KEY (rater_user_id) REFERENCES users(id),

    CONSTRAINT fk_ur_rated
        FOREIGN KEY (rated_user_id) REFERENCES users(id)
) ENGINE=InnoDB;




-- ==================================
-- ========= TABLAS LARAVEL =========
-- ==================================

-- - Tabala Reseteo de contraseña (tabla Laravel):
CREATE TABLE password_reset_tokens (
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    PRIMARY KEY (email)
) ENGINE=InnoDB;



-- - Tabla Migraciones (tabla Laravel)
CREATE TABLE migrations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    migration VARCHAR(255) NOT NULL,
    batch INT NOT NULL
) ENGINE=InnoDB;




-- - Reactivamos comprobación de FK (una vez creadas todas las tablas):
SET FOREIGN_KEY_CHECKS = 1;