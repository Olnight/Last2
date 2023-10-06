-- Вставка категорий
INSERT INTO Category (name, code) VALUES
  ('Доски и лыжи', 'boards'),
  ('Крепления', 'attachment'),
  ('Ботинки', 'boots'),
  ('Одежда', 'clothing'),
  ('Инструменты', 'tools'),
  ('Разное', 'other');

-- Вставка пользователей
INSERT INTO User (reg_date, email, name, password, contacts) VALUES
  ('2023-09-14 10:00:00', 'user1@example.com', 'Пользователь 1', 'password1', 'Контакты пользователя 1'),
  ('2023-09-14 11:00:00', 'user2@example.com', 'Пользователь 2', 'password2', 'Контакты пользователя 2'),
  ('2023-09-14 12:00:00', 'user3@example.com', 'Пользователь 3', 'password3', 'Контакты пользователя 3');

-- Вставка объявлений
INSERT INTO Lot (creation_date, name, description, image, start_price, end_date, bidding_step, author_id, category_id) VALUES
  ('2023-09-14 12:00:00', '2014 Rossignol District Snowboard', 'Новый сноуборд в идеальном состоянии', 'img/lot-1.jpg', 10999, '2023-09-20', 50, 1, 1),
  ('2023-09-14 13:00:00', 'DC Ply Mens 2016/2017 Snowboard', 'Красный сноуборд', 'img/lot-2.jpg', 159999, '2023-09-13', 10, 2, 1),
  ('2023-09-14 14:00:00', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепления в идеальном состоянии', 'img/lot-3.jpg', 8000, '2023-09-14', 50, 3, 2),
  ('2023-09-14 15:00:00', 'Ботинки для сноуборда DC Mutiny Charocal', 'Новые ботинки', 'img/lot-4.jpg', 10999, '2023-09-15', 50, 3, 3),
  ('2023-09-14 16:00:00', 'Куртка для сноуборда DC Mutiny Charocal', 'Новая куртка', 'img/lot-5.jpg', 7500, '2023-09-16', 50, 3, 4),
  ('2023-09-14 17:00:00', 'Маска Oakley Canopy', 'Маска в идеальном состоянии', 'img/lot-6.jpg', 5400, '2023-09-27', 50, 3, 5);
-- Вставка ставок
INSERT INTO Bid (bid_date, sum, user_id, lot_id) VALUES
    ('2023-09-15 14:00:00', 11049, 2, 1),
    ('2023-09-25 14:00:00', 11099, 1, 1),
    ('2023-09-16 11:00:00', 160009, 1, 2);

-- Получить список всех категорий
SELECT * FROM Category;

-- Получить список лотов, которые еще не истекли, отсортированных по дате публикации (новые к старым)
SELECT
    l.name,
    l.start_price,
    l.image,
    c.name,
    l.end_date
FROM Lot AS l
    INNER JOIN Category AS c ON l.category_id = c.id
WHERE l.end_date > CURRENT_DATE
ORDER BY l.creation_date DESC;

-- Показать информацию о лоте по его ID
SELECT
    l.name,
    l.description,
    l.start_price,
    l.image,
    c.name
FROM Lot AS l
         INNER JOIN Category AS c ON l.category_id = c.id
WHERE l.id = 1;

-- Обновить название лота по его идентификатору
UPDATE Lot
SET name = 'Лыжи'
WHERE id = 1; -- Замените на нужный ID лота

-- Получить список ставок для лота по его идентификатору с сортировкой по дате
SELECT
    b.bid_date,
    b.sum,
    l.name,
    u.name
FROM Bid AS b
     INNER JOIN Lot AS l ON b.lot_id = l.id
     INNER JOIN User AS u ON b.user_id = u.id
WHERE b.lot_id = 1
ORDER BY b.bid_date DESC;