create table certificates
(
    id                      bigint unsigned auto_increment
        primary key,
    uuid                    char(36)                  not null,
    certificate_number      varchar(50)               null,
    image                   varchar(191)              null,
    show_number             varchar(10) default 'yes' not null comment 'yes, no',
    number_x_position       int         default 0     not null,
    number_y_position       int         default 0     not null,
    number_font_size        int         default 18    not null,
    number_font_color       varchar(25)               null,
    title                   varchar(191)              null,
    title_x_position        int         default 0     not null,
    title_y_position        int         default 0     not null,
    title_font_size         int         default 20    not null,
    title_font_color        varchar(25)               null,
    show_date               varchar(10) default 'yes' not null comment 'yes, no',
    date_x_position         int         default 0     not null,
    date_y_position         int         default 16    not null,
    date_font_size          int         default 30    not null,
    date_font_color         varchar(25)               null,
    show_student_name       varchar(10) default 'yes' not null comment 'yes, no',
    student_name_x_position int         default 0     not null,
    student_name_y_position int         default 16    not null,
    student_name_font_size  int         default 32    not null,
    student_name_font_color varchar(25)               null,
    body                    mediumtext                null,
    body_max_length         int         default 80    not null,
    body_x_position         int         default 0     not null,
    body_y_position         int         default 16    not null,
    body_font_size          int         default 20    not null,
    body_font_color         varchar(25)               null,
    role_1_title            varchar(191)              null,
    role_1_signature        varchar(191)              null,
    role_1_x_position       int         default 16    not null,
    role_1_y_position       int         default 16    not null,
    role_1_font_size        int         default 18    not null,
    role_1_font_color       varchar(25)               null,
    role_2_title            varchar(191)              null,
    role_2_x_position       int         default 0     not null,
    role_2_y_position       int         default 0     not null,
    role_2_font_size        int         default 18    not null,
    role_2_font_color       varchar(25)               null,
    path                    varchar(191)              null,
    created_at              timestamp                 null,
    updated_at              timestamp                 null,
    constraint certificates_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;
