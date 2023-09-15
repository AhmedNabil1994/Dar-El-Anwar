create table balances
(
    id              bigint unsigned auto_increment
        primary key,
    date            date           not null,
    opening_balance decimal(10, 2) not null,
    closing_balance decimal(10, 2) not null,
    created_at      timestamp      null,
    updated_at      timestamp      null
)
    collate = utf8mb4_unicode_ci;

