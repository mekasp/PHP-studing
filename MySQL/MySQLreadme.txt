MySQL - реляционная система управления базами данных.

Реляционные(Relations) базы данных - базы данных,таблицы которых,имеют между собой отношения.

MySQL использует SQL в качестве языка построения запросов,но слегка его изменяет.

MySQL устроен по модели клиент-сервер. После установки соединения с MySQL сервером клиент может отправлять запросы и получать ответы.

SQL - язык структурирования запросов.

Как подключаться к базе данных через php:

$db = mysqli_connect('localhost','root','','testn1'); функция принимает 4е аргумента:
                                                            1. хост,к которому мы стучимся.
                                                            2. имя пользователя.
                                                            3. пароль
                                                            4. названия базы данных.

Как достать данные из базы данных в php:

$query = mysqli_query($db,"SELECT * FROM users;"); функия принимает 2 аргумента:
                                                            1. поделючение базы данных.
                                                            2. текст запроса.

$users = $query->fetch_all(MYSQLI_ASSOC); фетчим данные с запроса и собираем в переменную.

Команды формирования базы данных MySQl:
    CRATE DATABASE database_name - создать базу данных
    DROP DATABASE database_name - удалить базу данных
    USE database_name - использовать базу данных
    CREATE TABLE table_name (       - создать таблицу
        `id` INT,
        `name` VARCHAR(255)
    );
    DROP TABLE table_name - удалить таблицу
    ALTER TABLE table_name - изменить таблицу

Типы данных MySQL:
    Целые числа: INT,TINYINT,BIT,BOOL,SMALLINT,BIGINT
    Числа с плавающей точкой: DECIMAL
    Дата и вермя: DATE,DATETIME,TIME,YEAR
    Символьные типы: CHAR,VARCHAR,TEXT,MEDIUMTEXT,LARGETEXT
    Составные типы: ENUM,SET

Запросы к таблицам MySQL:
    INSERT INTO table_name SET column_name = 1;
    INSERT INTO table_name (column_name,column_name) VALUES ('hello',1),('hi',2);
    UPDATE table_name SET column_name = 1
    UPDATE table_name SET column_name = 1 WHERE column_name = 2
    DELETE FROM table_name SET column_name = 1
    DELETE FROM table_name SET column_name = 1 WHERE column_name = 2

    Запросы на выборку данных:
        SELECT * FROM table_name
        SELECT column_name FROM table_name
        SELECT * FROM table_name WHERE column_name = 1

        Назначение кличек:
            SELECT column_name AS alias_name FROM table_name alias_name
        Группировка строк:
            SELECT * FROM table_name GROUP BY column_name
        Сортировка строк:
            SELECT * FROM table_name ORDER BY column_name ASC(от 1 до 10)/DESC(от 10 до 1 )
        Лимит строк:
            SELECT * FROM table_name LIMIT 10
            SELECT * FROM table_name LIMIT 10(пропускаются 10 строк сначчала),10(и выбираются 10 спрок после пропущенных)
        Условиия выборки:
            SELECT * FROM table_name WHERE column_name1 = 1 AND column_name2 = 2
            SELECT * FROM table_name WHERE column_name1 = 1 OR column_name2 = 2
            SELECT * FROM table_name WHERE (column_name1 = 1 OR column_name2 = 2) AND column_name3 = 3
            SELECT * FROM table_name WHERE column_name IN (1,2,3)
            SELECT * FROM table_name WHERE column_name NOT IN (1,2,3)
            SELECT * FROM table_name WHERE column_name LIKE '% key_word %'
            SELECT * FROM table_name WHERE column_name LIKE 'key_word %' - должно начинаться этим словом
            SELECT * FROM table_name WHERE column_name LIKE '% key_word' - должно заканчиваться этим словом
            SELECT * FROM table_name WHERE column_name IS NULL
            SELECT * FROM table_name WHERE column_name IS NOT NULL
            SELECT * FROM table_name WHERE column1 BETWEEN 10 AND 500000;
            SELECT * FROM table_name WHERE ProductName REGEXP 'Phone|Galaxy';
        Обьединение таблиц:
            SELECT * FROM table_name1 LEFT JOIN table_name2 ON table_name1.id = table_name2.table_name1_id - к левой таблице присоединяется правая таблица и отображаются совпадения по левой таблице то,что не подходит к левой таблице, отображатсья не будет
            SELECT * FROM table_name1 RIGHT JOIN table_name2 ON table_name1.id = table_name2.table_name1_id - к правой таблице присоединяется левая таблица и отображаются совпадения по правой таблице,то,что не подходит к правой таблице, отображатсья не будет
            SELECT * FROM table_name1 INNER JOIN table_name2 ON table_name1.id = table_name2.table_name1_id - отображаются только полные совпадения из обеих таблиц
        Оббединение запросов:
            SELECT column_name FROM table_name1
            UNION
            SELECT column_name FROM table_name2
        Подзапросы:
            SELECT * FROM (SELECT * FROM table_name) alias_name
            SELECT column_name,(SELECT column_name FROM table_name WHERE id = 1) FROM table_name
            SELECT * FROM table_name LEFT JOIN (SELECT * FROM table_name) alias_name ON table_name.id = alias_name.id
            SELECT * FROM table_name WHERE column_name = (SELECT column_name FROM table_name WHERE id = 1)

Индексы:
    SHOW INDEXES FROM table_name
    CREATE INDEX index_name ON table_name (column_name)
    CREATE INDEX index_name ON table_name (column_name,column_name)
    Первичный ключ:
        ALTER TABLE Persons ADD CONSTRAINT PK_Person PRIMARY KEY (ID,LastName);
        CREATE TABLE Persons (
            ID int NOT NULL,
            LastName varchar(255) NOT NULL,
            FirstName varchar(255),
            Age int,
            PRIMARY KEY (ID)
        );
    Уникально поле:
        CREATE TABLE table_name(
            column_name INT UNIQUE
        )
    Внешний ключ:
        CREATE TABLE Customers
        (
            Id INT PRIMARY KEY AUTO_INCREMENT,
            Age INT,
            FirstName VARCHAR(20) NOT NULL,
            LastName VARCHAR(20) NOT NULL,
            Phone VARCHAR(20) NOT NULL UNIQUE
        );

        CREATE TABLE Orders
        (
            Id INT PRIMARY KEY AUTO_INCREMENT,
            CustomerId INT,
            CreatedAt Date,
            FOREIGN KEY (CustomerId)  REFERENCES Customers (Id)
        );











































































