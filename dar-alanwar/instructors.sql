create table instructors
(
    id                     bigint unsigned auto_increment
        primary key,
    uuid                   char(36)                 not null,
    user_id                bigint                   not null,
    country_id             bigint                   null,
    province_id            bigint                   null,
    state_id               bigint                   null,
    city_id                bigint unsigned          null,
    first_name             varchar(191)             not null,
    last_name              varchar(191)             not null,
    professional_title     varchar(191)             null,
    phone_number           varchar(191)             null,
    postal_code            varchar(100)             null,
    address                varchar(191)             null,
    about_me               mediumtext               null,
    gender                 varchar(50)              null,
    social_link            mediumtext               null,
    slug                   varchar(191)             null,
    is_private             varchar(10) default 'no' not null comment 'yes, no',
    remove_from_web_search varchar(10) default 'no' not null comment 'yes, no',
    status                 tinyint     default 0    not null comment '0=pending, 1=approved, 2=blocked',
    consultation_available tinyint     default 0    null comment '1=yes, 0=no',
    hourly_rate            int                      null,
    available_type         tinyint     default 3    null comment '1=In-person, 0=Online, 3=Both',
    cv_file                varchar(191)             null,
    cv_filename            varchar(191)             null,
    created_at             timestamp                null,
    updated_at             timestamp                null,
    email                  text                     not null,
    password               text                     not null,
    employee_id            varchar(250)             null,
    department_id          int                      null,
    constraint instructors_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

