create table salaries
(
    id          bigint unsigned auto_increment
        primary key,
    employee_id varchar(191) null,
    salary      varchar(191) null,
    date        varchar(191) null,
    description varchar(191) null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    collate = utf8mb4_unicode_ci;

