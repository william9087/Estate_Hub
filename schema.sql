CREATE TABLE user_info(
    first_name VARCHAR(20),
    last_name VARCHAR(20),
    email VARCHAR(50),
    user_name VARCHAR(20),
    password VARCHAR(200),
    user_type VARCHAR(20)
);

CREATE TABLE property(
    price DECIMAL(10, 2),
    rooms INT,
    floors INT,
    location VARCHAR(50),
    user_name VARCHAR(20),
    FOREIGN KEY (user_name) REFERENCES user_info(user_name)
)