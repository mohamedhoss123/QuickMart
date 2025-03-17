CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    phone_number VARCHAR(255),
    created_date VARCHAR(255),
    role VARCHAR(255)
);


CREATE TABLE IF NOT EXISTS sessions(
    sid VARCHAR(255) PRIMARY KEY,
    data JSON
);


CREATE TABLE IF NOT EXISTS categories(  
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);


CREATE TABLE IF NOT EXISTS products(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    category_id INT,
    price DECIMAL(10, 2),
    stock_quantity INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE IF NOT EXISTS product_images(
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT REFERENCES products(id),
    image_url VARCHAR(255),
    is_main BOOLEAN
)

CREATE TABLE IF NOT EXISTS favourite(
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT REFERENCES products(id),
    user_id INT REFERENCES users(id)
)