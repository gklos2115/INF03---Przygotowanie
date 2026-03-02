CREATE TABLE gracze (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nick VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    saldo DECIMAL(10,2) DEFAULT 0.00,
    data_rejestracji DATE,
    avatar VARCHAR(50)
);

CREATE TABLE gry_kasyno (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(40) NOT NULL,
    typ VARCHAR(20),
    opis TEXT,
    min_zaklad DECIMAL(10,2),
    max_zaklad DECIMAL(10,2),
    obrazek VARCHAR(50)
);

CREATE TABLE transakcje (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gracz_id INT,
    gra_id INT,
    kwota DECIMAL(10,2),
    wynik VARCHAR(10),
    data_gry DATETIME,
    FOREIGN KEY (gracz_id) REFERENCES gracze(id),
    FOREIGN KEY (gra_id) REFERENCES gry_kasyno(id)
);

INSERT INTO gracze (nick, email, saldo, data_rejestracji, avatar) VALUES
('LuckyJack', 'jack@casino.pl', 1250.50, '2024-01-15', 'jack.jpg'),
('QueenOfSpades', 'queen@casino.pl', 890.00, '2024-02-20', 'queen.jpg'),
('AceHigh', 'ace@casino.pl', 3200.75, '2024-03-10', 'ace.jpg'),
('BlackjackKing', 'king@casino.pl', 450.00, '2024-04-05', 'king.jpg'),
('SlotMaster', 'slot@casino.pl', 2100.00, '2024-05-12', 'slot.jpg'),
('RuletkaFan', 'ruletka@casino.pl', 675.25, '2024-06-01', 'ruletka_fan.jpg'),
('PokerFace', 'poker@casino.pl', 5400.00, '2024-06-15', 'poker.jpg'),
('DiamondDice', 'dice@casino.pl', 310.00, '2024-07-20', 'dice.jpg');

INSERT INTO gry_kasyno (nazwa, typ, opis, min_zaklad, max_zaklad, obrazek) VALUES
('Ruletka Europejska', 'ruletka', 'Klasyczna ruletka europejska z jednym zerem. Graj i stawiaj na swoje ulubione numery lub kolory.', 5.00, 10000.00, 'ruletka.jpg'),
('Blackjack VIP', 'karty', 'Ekskluzywny stol do blackjacka z wysokimi stawkami. Sprobuj pokonac krupiera i zdobadz 21 punktow.', 25.00, 50000.00, 'blackjack.jpg'),
('Mega Slot 777', 'automat', 'Automat z trzema bebnami i klasycznymi symbolami owocowymi. Traf trojke siodemek i wygraj jackpota!', 1.00, 500.00, 'slot777.jpg'),
('Poker Texas', 'karty', 'Popularny Texas Holdem Poker. Blefuj i wygrywaj z innymi graczami przy wirtualnym stole.', 10.00, 25000.00, 'poker_texas.jpg'),
('Lucky Dice', 'kosci', 'Prosta gra w kosci. Postaw zaklad i rzuc kostkami. Szczescie sprzyja odwaznym!', 2.00, 1000.00, 'lucky_dice.jpg'),
('Baccarat Gold', 'karty', 'Elegancka gra karciana baccarat w zlotej edycji. Postaw na gracza, bankiera lub remis.', 20.00, 100000.00, 'baccarat.jpg');

INSERT INTO transakcje (gracz_id, gra_id, kwota, wynik, data_gry) VALUES
(1, 1, 100.00, 'wygrana', '2025-06-01 10:30:00'),
(1, 2, 250.00, 'przegrana', '2025-06-01 11:00:00'),
(2, 3, 50.00, 'wygrana', '2025-06-02 14:15:00'),
(3, 1, 500.00, 'wygrana', '2025-06-03 09:45:00'),
(3, 4, 200.00, 'przegrana', '2025-06-03 10:20:00'),
(4, 5, 30.00, 'wygrana', '2025-06-04 16:00:00'),
(5, 3, 75.00, 'przegrana', '2025-06-05 12:30:00'),
(5, 1, 1000.00, 'wygrana', '2025-06-05 13:00:00'),
(6, 2, 150.00, 'przegrana', '2025-06-06 18:45:00'),
(7, 4, 400.00, 'wygrana', '2025-06-07 20:00:00'),
(7, 6, 800.00, 'wygrana', '2025-06-07 21:30:00'),
(8, 5, 25.00, 'przegrana', '2025-06-08 11:15:00');