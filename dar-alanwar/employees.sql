create table employees
(
    id              bigint unsigned auto_increment
        primary key,
    name            varchar(191) not null,
    address         varchar(191) not null,
    qualification   varchar(191) not null,
    university      varchar(191) not null,
    graduation_date date         not null,
    national_id     varchar(191) not null,
    email           varchar(191) not null,
    phone           varchar(191) not null,
    birthdate       date         not null,
    job_title       varchar(191) not null,
    department      varchar(191) not null,
    salary_cycle    varchar(191) not null,
    hiring_date     date         not null,
    work_days       int          not null,
    branch          varchar(191) not null,
    password        varchar(191) null,
    created_at      timestamp    null,
    updated_at      timestamp    null,
    management      text         not null,
    departure_time  text         not null,
    attendance_time text         not null,
    image           text         not null,
    type            varchar(250) null,
    status          int          null comment '0 = pending,
1 = active,
2 = archive',
    level           varchar(250) null,
    constraint employees_email_unique
        unique (email),
    constraint employees_national_id_unique
        unique (national_id)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

